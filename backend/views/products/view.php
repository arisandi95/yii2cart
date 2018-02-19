<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'product_title',
            'product_description:ntext',
            'product_price',
            // 'product_image:image',
            'product_status',
            'product_entered_data',
            'category_id',
            [
                'label' => 'Product Image',
                'attribute' => 'product_image',
                'format' => 'html',
                'value' => function($model){
                    return yii\bootstrap\Html::img($model->product_image, ['width' => '240']);
                }
            ],
        ],
    ]) ?>

</div>
