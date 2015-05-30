<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Factory;
use app\models\Depot;

interface IFactoryService
{
	public function deleteFactory($id);
}

class FactoryService extends Object implements IFactoryService
{
	function deleteFactory($id)
	{
		if (($model = Factory::findOne($id)) !== null) {
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