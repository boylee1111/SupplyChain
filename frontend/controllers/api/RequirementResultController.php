<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use app\models\Requirement;

class RequirementResultController extends ActiveController
{
	public $modelClass = '\app\models\Requirement';

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
}