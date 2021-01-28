<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\pay_slip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Slip', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-slip-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Pay Slip No:'.' '. Html::encode($this->title).' => '.'Details' ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'emp_id',
        'pay_mongth',
        'basic',
        'ot_hours',
        'ot_rate',
        'ot_payment',
        'total_payment',
        'deduction_advance',
        'deduction_other',
        'net_pay',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
