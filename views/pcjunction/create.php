<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PcJunction */


$this->params['breadcrumbs'][] = ['label' => 'Pc Junction', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<?php $this->title = 'Assign Category to a Project'; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
