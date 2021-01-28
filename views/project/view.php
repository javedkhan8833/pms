<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Project;
use app\models\Assignee;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project :'.' '. Html::encode($this->title).' => '.'Details' ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'description',
        'start_time',
        'end_time',
        'completion_time',
        'assign_to',
        'budget',
        'cost',
        'status'=>[
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        if($model->status=='Due')
                        {
                        return '<span class="label label-success">Due</span>';
                        }
                        elseif($model->status=='New'){
                        return '<span class="label label-danger">OverDue</span>';
                        }
                        else
                        {
                            return '<span class="label label-info">New</span>';
                        }
                    },
                    ],
        'completed',
        'created_at',
        'updated_at',
        'duration',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>

   


<!-- new code of other views  -->
<div class="">


       <!--  <p>
        <?= Html::a('Assign Project', ['/pajunction/create'], ['class' => 'btn btn-success']) ?> 
        </p> -->

        <!-- form start -->

        <div class="row">
            <?php $form = ActiveForm::begin(['action'=>'pa-junction/create']); ?>
            <div class="col-md-6">
                <!-- <label> Project Name</label> -->
                <?= $form->field($model, 'id')->dropDownlist(ArrayHelper::map(Project::find()->all(),'id','name'),['prompt'=>'Select Project']) ?>
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
            <div class="col-md-6">
                <!-- <label> Assignee Name</label> -->
                <?= $form->field($model, 'id')->dropDownlist(ArrayHelper::map(Assignee::find()->all(),'id','name'),['prompt'=>'Select Assignee of the Project']) ?>
                <div class="form-group">
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        

        

        

        <!-- form end -->
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $assignees,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id'=>[
                    'attribute'=>'id',
                    'label'=>'Project Assignment Id',
                ],
                'pid'=>[
                    'attribute' => 'pid',
                    'label'=> 'Project Name',
                    'value'=>'p.name',
                ],
                'aid'=>[
                    'attribute' => 'aid',
                    'label' =>'Assignee Name',
                    'value'=>'a.name',
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <!-- time log -->
    <div class="container-fluid">
        <?php 
        $this->title = 'TIME LOG';
        $this->params['breadcrumbs'][] = $this->title;
        ?>

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Timelog', ['/timelog/create'], ['class' => 'btn btn-success']) ?>
        </p>

        
        <!-- timelog -->
        <?= GridView::widget([
            'dataProvider' => $logs,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                
                'task', 
                'aid'=>[
                    'attribute' => 'aid',
                    'label'=> 'Assignee Name',
                    'value'=>'assignees.name',  
                ],
                'timespent',
                'cost',
                

            // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>  

    </div>

