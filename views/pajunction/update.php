<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaJunction */

$this->title = 'Update Project Assignment: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pa Junction', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
