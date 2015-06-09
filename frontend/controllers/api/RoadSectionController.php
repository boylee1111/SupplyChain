<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use frontend\helpers\RestfulHelper;
use frontend\services\IDepotService;
use frontend\services\IRoadSectionService;
use frontend\services\ITransportationService;
use app\models\RoadSection;

class RoadSectionController extends ActiveController
{
	public $modelClass = '\app\models\RoadSection';

	protected $depotService;
	protected $roadSectionService;
	protected $transportationService;

	public function __construct($id,
								$module,
								IDepotService $depotService,
								IRoadSectionService $roadSectionService,
								ITransportationService $transportationService,
								$config = [])
	{
		$this->depotService = $depotService;
		$this->roadSectionService = $roadSectionService;
		$this->transportationService = $transportationService;
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
		$params = $_REQUEST;

		if (!array_key_exists('replace', $params) || !array_key_exists('road_section', $params)) {
			return RestfulHelper::parameterRequireStatusEnvolop(['replace', 'road_section']);
		}
		$isReplace = $params['replace'];
		$roadSections = $params['road_section'];

		$updatedCount = 0;
		$updatedResult = array();
		foreach ($roadSections as $roadSection) {
			$model = $this->roadSectionService->findBySerialNumber($roadSection['serial_number']);
			if ($model == null) {
				$model = new RoadSection();
				$model->serial_number = $roadSection['serial_number'];
			}

			$model->country = $roadSection['country'];
			$model->road_section_name = $roadSection['road_section_name'];

			// If start depot and end depot are not exist, not save
			if ($this->depotService->findBySerialNumber($roadSection['start_depot_serial_number']) == null ||
				$this->depotService->findBySerialNumber($roadSection['end_depot_serial_number']) == null)
				continue;

			$model->start_depot_id = $this->depotService->findBySerialNumber($roadSection['start_depot_serial_number'])->depot_id;
			$model->end_depot_id = $this->depotService->findBySerialNumber($roadSection['end_depot_serial_number'])->depot_id;

			// Save first, then update transportation
			if ($model->save()) {
				$transportations = $roadSections['transportation'];
				foreach ($transportations as $transportation) {
					$transModel = $this->transportationService->findByNameInRoadSection($model->road_section_id, $transportation['transportation_name'])
					if ($transModel == null) {
						$transModel = new Transportation();
					}
					$transModel->transportation_cost = $transportation['transportation_cost'];
					$transModel->transportation_time = $transportation['transportation_time'];
					$transModel->road_section_id = $model->road_section_id;
					$transModel->save();
				}

				$model->refresh();
				$updatedCount++;
				$updatedResult = array_merge($updatedResult, RestfulHelper::depotToJsonFormat($model));
			}
		}

		return array_merge(
			RestfulHelper::successfulStatusEnvolop(), 
			['depots' => $updatedResult]);
	}
}