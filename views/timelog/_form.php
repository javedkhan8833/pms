<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Project;
use app\models\Assignee;  
use yii\helpers\ArrayHelper;  

/* @var $this yii\web\View */
/* @var $model app\models\Timelog */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Create Project Timelog</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'pid')->dropDownlist(ArrayHelper::map(Project::find()->all(),'id','name'),['prompt'=>'Select Project Name']) ?>
     

            <?= $form->field($model, 'task')->textInput(['maxlength' => true, 'placeholder' => 'Task']) ?>

            <?= $form->field($model, 'timespent')->textInput(['placeholder' => 'Timespent']) ?>

            <?= $form->field($model, 'cost')->textInput(['placeholder' => 'Cost']) ?>
<?= $form->field($model, 'aid')->dropDownlist(ArrayHelper::map(Assignee::find()->all(),'id','name'),['prompt'=>'Select Assignee Name']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
