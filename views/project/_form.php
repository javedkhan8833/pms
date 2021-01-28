<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Assignee;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="container">
<div class="row">
<div class="panel panel-primary">
  <div class="panel-heading">Create Project</div>
  <div class="panel-body">

    <div class="col-md-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'rows'=>5, 'placeholder' => 'Description']) ?>

    <?= $form->field($model, 'start_time')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Start Time',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'end_time')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose End Time',
                'autoclose' => true
            ]
        ],
    ]); ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'completion_time')->textInput(['placeholder' => 'Completion Time']) ?>

     <?= $form->field($model, 'assign_to')->dropDownlist(ArrayHelper::map(Assignee::find()->all(),'id','name'),['prompt'=>'Select Assignee']) ?>

    <?= $form->field($model, 'budget')->textInput(['placeholder' => 'Budget']) ?>

    <?= $form->field($model, 'cost')->textInput(['placeholder' => 'Cost']) ?>
    <?php 
    if (!$model->isNewRecord) {?>

        <?= $form->field($model, 'completed')->dropDownlist(['1'=>'Yes','0'=>'No'],['prompt'=>'Select Status']) ?>
    <?php  }?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    </div>
</div>
</div>
</div>
