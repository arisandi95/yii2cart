<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Categories;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'product_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_image')->fileInput() ?>

    <?= $form->field($model, 'product_status')->dropDownList([ 'in stock' => 'In stock', 'out of stock' => 'Out of stock', ], ['prompt' => 'Select a Status']) ?>

    <?= $form->field($model,'sale_start_date')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2018-01-01 12:30:30']]) ?>

    <?= $form->field($model,'sale_end_date')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2018-01-01 12:30:30']]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::
            map(Categories::
                find()->all(), 'category_id', 'category_title'
            ), ['prompt' => 'Select a Category']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
