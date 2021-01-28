<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Assignee */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="container">

<div class="row">
    <div class="panel panel-primary">
  <div class="panel-heading">Create Assignee</div>
  <div class="panel-body">
      
    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
        

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone']) ?>

     <?php $gender = ['male'=>'Male','female'=>'Female']; ?>
    <?= $form->field($model, 'gender')->dropDownlist($gender,['prompt'=>'Select Gender']) ?>
    </div>

    
    <div class="col-md-6">
    <?= $form->field($model, 'hourly')->textInput(['placeholder' => 'Hourly','class'=>'hourlyid form-control']) ?>

    <?= $form->field($model, 'basic_pay')->textInput(['placeholder' => 'Basic Pay','class'=>'basicid form-control']) ?>

    <?= $form->field($model, 'completed_project')->textInput(['placeholder' => 'Completed Project']) ?>

  </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
  </div>

</div>
</div>

<!-- javaScript code -->

<?php 
$script = <<< JS

$(document).ready(function() {
  $( ".hourlyid" ).keyup(function(){
   var value=$(this).val();
       value = value*8*24;
    $(".basicid").val(value);
    // console.log(value)
    });
});

JS;
$this->registerJs($script,\yii\web\view::POS_END);
?>
