<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Categories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_status')->dropDownList([ 'in stock' => 'In stock', 'out of stock' => 'Out of stock', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'product_entered_data')->textInput() ?>

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
