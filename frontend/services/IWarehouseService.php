<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Warehouse;
use app\models\Depot;

interface IWarehouseService
{
	public function deleteWarehouse($id);
}

class WarehouseService extends Object implements IWarehouseService
{
	function deleteWarehouse($id)
	{
		if (($model = Warehouse::findOne($id)) !== null) {
			$model->delete();
			$depot = Depot::findOne($id);
            foreach ($depot->getRoadSections()->all() as $roadSection) {
            	$roadSection->delete();
            }
        	foreach ($depot->getRoadSections0()->all() as $roadSection) {
            	$roadSection->delete();
        	}
        	$depot->delete();
        } else {
        	throw new NotFoundHttpException('The requested page does not exist.');
        }
	}
}