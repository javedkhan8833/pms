<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\pay_slip */

$this->params['breadcrumbs'][] = ['label' => 'Pay Slip', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<?php $this->title = 'Create Pay Slip'; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
