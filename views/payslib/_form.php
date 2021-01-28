<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Assignee;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\pay_slip */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
  .font-size{
    font-size:20px;
    font-weight: bold;
    color: black;   
  }
</style>
<div class="pay-slip-form">
  <div class="panel panel-primary">
    <div class="panel-heading">Pay Slip</div>
    <div class="panel-body">
      <div class="row">

        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">

          <?= $form->errorSummary($model); ?>
          <div class="panel panel-primary">
            <div class="panel-heading">Employee Basic Info</div>
            <div class="panel-body">

              <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

              <?= $form->field($model, 'emp_id')->dropDownlist(ArrayHelper::map(Assignee::find()->all(),'id','name'),['prompt'=>'Select Employee Name']) ?>

              <?php $month = [
                'jan'=>'January',
                'feb'=>'February',
                'march'=>'March',
                'april'=>'April',
                'may'=>'May',
                'jun'=>'June',
                'july'=>'July',
                'august'=>'August',
                'sep'=>'September',
                'oct'=>'Octuber',
                'nov'=>'November',
                'dec'=>'December',
              ]; ?>
              <?= $form->field($model,'pay_mongth')->dropDownlist($month,['prompt'=>'Select Pay Month'])?>

              <?= $form->field($model, 'basic')->textInput(['placeholder' => 'Basic','class'=>'basicpay form-control']) ?>
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Payement Process</div>
            <div class="panel-body">
              <?= $form->field($model, 'deduction_advance')->textInput(['placeholder' => 'Deduction Advance','class'=>'deductionadvance form-control']) ?>

              <?= $form->field($model, 'deduction_other')->textInput(['placeholder' => 'Deduction Other','class'=>'deductionother form-control']) ?>
              <?= $form->field($model, 'total_payment')->textInput(['placeholder' => 'Total Payment','class'=>'totalpay form-control','readonly'=>true]) ?>
            </div>
          </div>
          
          
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
        </div>

        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">Over Time Counting</div>
            <div class="panel-body">
              <?= $form->field($model, 'ot_hours')->textInput(['placeholder' => 'Overtime Hours','class'=>'othours form-control']) ?>

              <?= $form->field($model, 'ot_rate')->textInput(['placeholder' => 'Overtime Rate','class'=>'otrate form-control']) ?>
              <div class="form-group">
                <?= $form->field($model, 'ot_payment')->textInput(['placeholder' => 'Overtime Payment','class'=>'otpayment form-control']) ?>

                <?= $form->field($model, 'net_pay')->textInput(['placeholder' => 'Net Pay','class'=>'netpay form-control','readonly'=>true]) ?>
              </div>

            </div>
          </div>
        </div>

        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>

  <?php
$script = <<< JS
$(document).on("keyup",".basicpay,.deductionadvance, .deductionother",function(){

var v1=Number($(".basicpay").val());
var v2=Number($(".deductionadvance").val());
var v3=Number($(".deductionother").val());
totalDeduction = v2+v3;
total_value = v1 - totalDeduction; 
console.log(total_value);
if(total_value>0){
$(".totalpay").val(total_value);
}

});

$(document).on("keyup",".othours,.otrate,.otpayment,.netpay",function(){

var othr = Number($(".othours").val())
var otrt = Number($(".otrate").val())
var otpt = Number($(".otpayment").val())
var otnp = Number($(".netpay").val())

otpt = othr*otrt;
$(".otpayment").val(otpt);

var netpay = total_value + otpt

$(".netpay").val(netpay)

$(".netpay").addClass('font-size');

});

JS;
$this->registerJs($script,\yii\web\view::POS_END);
?>