<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use frontend\helpers\RestfulHelper;
use frontend\services\IRoadSectionService;
use app\models\RoadSection;

class RoadSectionController extends ActiveController
{
	public $modelClass = '\app\models\RoadSection';

	protected $roadSectionService;

	public function __construct($id, $module, IRoadSectionService $roadSectionService, $config = [])
	{
		$this->roadSectionService = $roadSectionService;
		parent::__construct($id, $module, $config);
	}

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
	    return $behaviors;
	}

	public function actionList($serial_number = null)
	{
		if ($serial_number != null) {
			if (($model = $this->roadSectionService->findBySerialNumber($serial_number)) !== null) {
				return array_merge(
					RestfulHelper::successfulStatusEnvolop(),
					['road_section' => RestfulHelper::roadSectionToJsonFormat($model)]);
			} else {
				throw new NotFoundHttpException();
			}
		}
		return array_merge(
			RestfulHelper::successfulStatusEnvolop(),
			['road_section' => RestfulHelper::roadSectionsToJsonFormat(RoadSection::find()->all())]);
	}

	public function actionSync()
	{
		
	}
}