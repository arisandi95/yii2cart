<?php  
namespace frontend\models;

use Yii;
use yii\base\Model;

class ProductRequest extends Model
{
	public $product_name;
	public $product_category;
	public $product_description;

	public function rules() 
	{
		return [
			[['product_name', 'product_category', 'product_description'], 'required'],
			[['product_name', 'product_category', 'product_description'], 'string'],
		];
	}
}

?>