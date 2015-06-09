<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use frontend\helpers\RestfulHelper;
use frontend\services\IRequirementService;
use app\models\Requirement;

class RequirementRequestController extends ActiveController
{
	public $modelClass = '\app\models\Requirement';

	protected $requirementService;

	public function __construct($id, $module, IRequirementService $requirementService, $config = [])
	{
		$this->requirementService = $requirementService;
		parent::__construct($id, $module, $config);
	}

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
	    return $behaviors;
	}

	public function actionList($requirement_id = null)
	{
		if ($requirement_id != null) {
			if (($model = ($this->requirementService->findByRequirementId($requirement_id))) != null) {
				return array_merge(
					RestfulHelper::successfulStatusEnvolop(),
					['requirement' => RestfulHelper::requirementToJsonFormat($model)]);
			} else {
				throw new NotFoundHttpException();
			}
		} else {
			return array_merge(
				RestfulHelper::successfulStatusEnvolop(),
				['requirement' => RestfulHelper::requirementsToJsonFormat(Requirement::find()->all())]);
		}
	}

	public function actionCal()
	{
		$params = $_REQUEST;

		if (!array_key_exists('time_limit', $params) || 
			!array_key_exists('start_depot_serial_number', $params) ||
			!array_key_exists('end_depot_serial_number', $params)) {
			return RestfulHelper::parameterRequireStatusEnvolop(['time_limit', 'start_depot_serial_number', 'end_depot_serial_number']);
		}

		$model = new Requirement();
		$model->requirement_time_limit = $params['time_limit'];
		$model->start_depot_id = $this->depotService->findBySerialNumber($roadSection['start_depot_serial_number'])->depot_id;
		$model->end_depot_id = $this->depotService->findBySerialNumber($roadSection['end_depot_serial_number'])->depot_id;

		$model->save();

		$passDepotsSerialNumbers = $roadSection['pass_depots_serial_number'];

		foreach ($passDepotsSerialNumbers as $passDepotSerialNumber) {
			$this->requirementService->savePassDepot($model->requirement_id, passDepotSerialNumber);
		}

		$this->requirementService->calculatePath($model->requirement_id);

		return array_merge(
			RestfulHelper::successfulStatusEnvolop(),
			[
				'requirement_id' => $model->requirement_id,
				'requirement_path' => $model->requirement_path
			]);
	}
}