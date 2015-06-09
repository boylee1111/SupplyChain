<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use frontend\helpers\RestfulHelper;
use frontend\services\IDepotService;
use app\models\Depot;

class DepotController extends ActiveController
{
	public $modelClass = '\app\models\Depot';

	protected $depotService;

	public function __construct($id, $module, IDepotService $depotService, $config = [])
	{
		$this->depotService = $depotService;
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
			if (($model = $this->depotService->findBySerialNumber($serial_number)) !== null) {
				return array_merge(
					RestfulHelper::successfulStatusEnvolop(),
					['depots' => RestfulHelper::depotToJsonFormat($model)]);
			} else {
				throw new NotFoundHttpException();
			}
		}
		return array_merge(
			RestfulHelper::successfulStatusEnvolop(),
			['depots' => RestfulHelper::depotsToJsonFormat(Depot::find()->all())]);
	}

	public function actionSync()
	{
		$params = $_REQUEST;

		if (!array_key_exists('replace', $params) || !array_key_exists('depots', $params)) {
			return RestfulHelper::parameterRequireStatusEnvolop(['replace', 'depots']);
		}
		$isReplace = $params['replace'];
		$depots = $params['depots'];

		$updatedCount = 0;
		$updatedResult = array();
		foreach ($depots as $depot) {
			$model = $this->depotService->findBySerialNumber($depot['serial_number']);
			if ($model == null) {
				$model = new Depot();
				$model->serial_number = $depot['serial_number'];
			}

			$model->country = $depot['country'];
			$model->name = $depot['name'];
			$model->short_name = $depot['short_name'];
			$model->longitude = $depot['longitude'];
			$model->altitude = $depot['altitude'];

			if ($model->save()) {
				$updatedCount++;
				$updatedResult = array_merge($updatedResult, RestfulHelper::depotToJsonFormat($model));
			}
		}

		return array_merge(
			RestfulHelper::successfulStatusEnvolop(), 
			['depots' => $updatedResult]);
	}
}