<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project :'.' '. Html::encode($this->title).' => '.'Details' ?></h2>
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
        'status',
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
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Project Assignees</h3>
            </div>
            <div class="panel-body">
                <?php 
            $aAttribute = [
                'id',
                'aid'=>[
                    'attribute' => 'aid',
                    'label'=> 'Assignee Name',
                    'value'=>'a.name',  
                ],
            ];
            $tAttribute = [
                'id',
                'task', 
                'aid'=>[
                    'attribute' => 'aid',
                    'label'=> 'Assignee Name',
                    'value'=>'a.name',  
                ],
                'timespent',
                'cost',
            ];
                $dataProvider = new ArrayDataProvider([
                    'allModels' => $assigneeModel,
                    'key' => 'id'
                ]);
                $dataProviderT = new ArrayDataProvider([
                    'allModels' => $logModel,
                    'key' => 'id'
                ]);
         ?>

            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => $aAttribute,
            ]); ?>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Project Timelogs</h3>
            </div>
            <div class="panel-body">
            <?= GridView::widget([
            'dataProvider' => $dataProviderT,
            'columns' => $tAttribute,
            ]); ?>
            </div>
        </div>
        
    </div>
</div>
