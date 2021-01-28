<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaJunction */


$this->params['breadcrumbs'][] = ['label' => 'Pa Junction', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<?php $this->title = 'Assign Project'; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
