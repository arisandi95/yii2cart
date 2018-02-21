<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_title',
            // 'product_description:ntext',
            [
                'label' => 'Product Description',
                'headerOptions' => array('style' => 'width : 30px'),
                'filterHtmlOptions' => array('style' => 'width : 30px'),
                'attribute' => 'product_description',
                'value' => function ($model) {
                    return StringHelper::truncate($model->product_description, 100, '...');
                },
            ],
            'product_price',
            // 'product_image:image',
            [
                'label' => 'Product Image',
                'attribute' => 'product_image',
                'format' => 'html',
                'value' => function($model){
                    return yii\bootstrap\Html::img($model->product_image, ['width' => '150']);
                }
            ],
            // 'product_status',
            // 'product_entered_data',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
