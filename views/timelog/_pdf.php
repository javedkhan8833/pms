<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Timelog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Timelog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timelog-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Timelog :'.' '. Html::encode($this->title).' => '.'Details' ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'pid',
        'task',
        'timespent:datetime',
        'cost',
        'aid',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
