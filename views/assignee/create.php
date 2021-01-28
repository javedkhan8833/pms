<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Assignee */


$this->params['breadcrumbs'][] = ['label' => 'Assignee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
 <?php $this->title = 'Create Assignee'; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
