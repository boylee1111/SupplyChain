<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use app\models\Depot;

class DepotController extends ActiveController
{
	public $modelClass = '\app\models\Depot';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
	    return $behaviors;
	}

	public function actionList()
	{
		return array_merge(
			['status' => 0],
			['message' => 'success'],
			['depots' => ArrayHelper::toArray(Depot::find()->all())]);
	}

	public function actionDetail($id)
	{
		return array_merge(['status' => 0], ['message' => 'success'], ['depot' => Depot::findOne($id)]);	
	}
}