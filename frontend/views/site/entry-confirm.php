<?php 
use yii\helpers\Html;
 ?>

 <p>You have entered the following information</p>

 <ul>
 	<li><label>Product Name</label> : <?= Html::encode($model->product_name) ?></li>
 	<li><label>Product Category</label> : <?= Html::encode($model->product_category) ?></li>
 	<li><label>Product Description</label> : <?= Html::encode($model->product_description) ?></li>
 </ul>

 <p>We will try to add this product to our system. Thank you for ur feedback</p>