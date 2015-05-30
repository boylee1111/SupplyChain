<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Station;
use app\models\Depot;

interface IStationService
{
	public function deleteStation($id);
}

class StationService extends Object implements IStationService
{
	function deleteStation($id)
	{
		if (($model = Station::findOne($id)) !== null) {
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