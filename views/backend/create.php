<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tblproducts */

$this->title = 'Add Product';
$this->params['breadcrumbs'][] = ['label' => 'Product List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproducts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_images' => $model_images,
    ]) ?>

</div>

<?php
$this->registerJs("
	$('#w3-success-0').delay(3000).fadeOut();

", \yii\web\View::POS_END);
