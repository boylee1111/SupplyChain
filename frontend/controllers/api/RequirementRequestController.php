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
}