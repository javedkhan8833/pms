<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Assignee */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employee details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignee-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Employee :'.' '. Html::encode($this->title).' => '.'Details' ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'email:email',
        'phone',
        'gender',
        'hourly:url',
        'basic_pay',
        'completed_project',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
