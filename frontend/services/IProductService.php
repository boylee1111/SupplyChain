<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Product;

interface IProductService
{
	public function calculateVolume($id);
}

class ProductService extends Object implements IProductService
{
	function calculateVolume($id)
	{
		if (($model = Product::findOne($id)) !== null) {
			$model->volume = $model->length * $model->width * $model->height;
            $model->save();
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}