<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Timelog */


$this->params['breadcrumbs'][] = ['label' => 'Timelog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<?php $this->title = 'Create project Timelog'; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
