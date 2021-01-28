<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PaJunction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pa Junction', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pa-junction-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project Assigned To:'.' '. Html::encode($this->title).' => '.'Details' ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'p.name',
                'label' => 'Project Name'
            ],
        [
                'attribute' => 'a.name',
                'label' => 'Assignee Name'
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
