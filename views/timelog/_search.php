<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TimelogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-timelog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'pid')->textInput(['placeholder' => 'Pid']) ?>

    <?= $form->field($model, 'task')->textInput(['maxlength' => true, 'placeholder' => 'Task']) ?>

    <?= $form->field($model, 'timespent')->textInput(['placeholder' => 'Timespent']) ?>

    <?= $form->field($model, 'cost')->textInput(['placeholder' => 'Cost']) ?>

    <?php /* echo $form->field($model, 'aid')->textInput(['placeholder' => 'Aid']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
