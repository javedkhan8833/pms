<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PcJunction */

$this->title = 'Project Category Assignment: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pc Junction', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
