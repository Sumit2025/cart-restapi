<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TblproductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproducts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'product_name',
            'product_price',
            // 'insert_date',
            // 'insert_by',
            //'update_date',
            //'update_by',
            //'status',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
