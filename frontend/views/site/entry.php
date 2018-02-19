<?php  
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
	<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'product_name') ?>
	<?= $form->field($model, 'product_category')->dropDownList([
		'computers' => 'Computers',
		'laptop' => 'Laptop',
		]) ?>
	<?= $form->field($model, 'product_description')->textArea() ?>

	<div class="form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
	</div>

<?php ActiveForm::end(); ?>