<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssigneeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-assignee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone']) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true, 'placeholder' => 'Gender']) ?>

    <?php /* echo $form->field($model, 'hourly')->textInput(['placeholder' => 'Hourly']) */ ?>

    <?php /* echo $form->field($model, 'basic_pay')->textInput(['placeholder' => 'Basic Pay']) */ ?>

    <?php /* echo $form->field($model, 'completed_project')->textInput(['placeholder' => 'Completed Project']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
