<?php

namespace frontend\controllers\api;

use yii\rest\ActiveController;
use yii\web\Response;
use app\models\Requirement;

class RequirementResultController extends ActiveController
{
	public $modelClass = '\app\models\Requirement';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
	    return $behaviors;
	}
}