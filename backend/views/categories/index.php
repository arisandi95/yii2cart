<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_id',
            'category_title',
            // 'category_description:ntext',
            [
                'label' => 'Category Description',
                'attribute' => 'category_description',
                'value' => function($model){
                    return StringHelper::truncate($model->category_description, 15, "...", false, true);
                }
            ],
            'category_status',
            'category_entered_data',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
