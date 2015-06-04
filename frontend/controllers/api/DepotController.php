<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use app\models\Depot;

class DepotController extends ActiveController
{
	public $modelClass = '\app\models\Depot';

	// public $serializer = [
 //        'class' => 'yii\rest\Serializer',
 //        'collectionEnvelope' => 'items',
 //    ];

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
	    return $behaviors;
	}

	public function actionAll()
	{
		return array_merge(['status' => 0], ['message' => 'success'], ['depot' => Depot::find()->all()]);
	}

	public function actionDetail($id)
	{
		return array_merge(['status' => 0], ['message' => 'success'], ['depot' => Depot::findOne($id)]);	
	}
}