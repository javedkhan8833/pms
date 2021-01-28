<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PcJunction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pc-junction-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project Assigned To:'.' '. Html::encode($this->title) ?></h2>
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
                'attribute' => 'c.name',
                'label' => 'Category Name'
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
