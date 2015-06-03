<?php

namespace frontend\services;

use yii\base\Object;
use app\models\TransitPoint;
use app\models\Depot;

interface ITransitPointService
{
	public function deleteTransitPoint($id);
}

class TransitPointService extends Object implements ITransitPointService
{
	function deleteTransitPoint($id)
	{
		if (($model = TransitPoint::findOne($id)) !== null) {
			// $model->delete();
			$depot = Depot::findOne($id);
            foreach ($depot->getRoadSections()->all() as $roadSection) {
            	$roadSection->delete();
            }
        	foreach ($depot->getRoadSections0()->all() as $roadSection) {
            	$roadSection->delete();
        	}
        	// $depot->delete();
            $depot->active = false;
            $depot->save();
        } else {
        	throw new NotFoundHttpException('The requested page does not exist.');
        }
	}
}