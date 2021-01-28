<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\pay_slipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-pay-slip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'emp_id')->textInput(['placeholder' => 'Emp']) ?>

    <?= $form->field($model, 'pay_mongth')->textInput(['maxlength' => true, 'placeholder' => 'Pay Mongth']) ?>

    <?= $form->field($model, 'basic')->textInput(['placeholder' => 'Basic']) ?>

    <?= $form->field($model, 'ot_hours')->textInput(['placeholder' => 'Ot Hours']) ?>

    <?php /* echo $form->field($model, 'ot_rate')->textInput(['placeholder' => 'Ot Rate']) */ ?>

    <?php /* echo $form->field($model, 'ot_payment')->textInput(['placeholder' => 'Ot Payment']) */ ?>

    <?php /* echo $form->field($model, 'total_payment')->textInput(['placeholder' => 'Total Payment']) */ ?>

    <?php /* echo $form->field($model, 'deduction_advance')->textInput(['placeholder' => 'Deduction Advance']) */ ?>

    <?php /* echo $form->field($model, 'deduction_other')->textInput(['placeholder' => 'Deduction Other']) */ ?>

    <?php /* echo $form->field($model, 'net_pay')->textInput(['placeholder' => 'Net Pay']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
