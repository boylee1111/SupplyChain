<?php

namespace frontend\services;

use Yii;
use yii\base\Object;
use common\models\User;
use app\models\ReturningOrder;
use app\models\PurchasingOrder;

interface IReturningOrderService
{
	public function applyNewReturningOrder($id);
	public function approveReturningOrder($id);
	public function rejectReturningOrder($id);
	public function confirmReturningOrder($id);
}

class ReturningOrderService extends Object implements IReturningOrderService
{
	function applyNewReturningOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 0;
		$model->save();

		// Save related PurchasingOrder status
		$purchasingModel = $this->findPurchasingModel($model->purchasing_order_id);
		$purchasingModel->status = 10;
		$purchasingModel->save();
	}

	function approveReturningOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 1;
		$model->approval_user_id = Yii::$app->user->getId();
		$model->save();
	}

	function rejectReturningOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 8;
		$model->approval_user_id = Yii::$app->user->getId();
		$model->save();

		$appliedUser = $model->applyUser;
		$rejectUser = $model->approvalUser;
		Yii::$app->mailer->compose()
			->setFrom(Yii::$app->params['systemEmail'])
			->setTo($appliedUser->email)
			->setSubject('Your application for returning is rejected by'.$rejectUser->username)
			->setTextBody('This is auto sending, do not replay this email!')
			->send();
	}

	function confirmReturningOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 2;
		$model->save();
	}

	function findModel($id)
    {
        if (($model = ReturningOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function findPurchasingModel($id)
    {
    	if (($model = PurchasingOrder::findOne($id)) !== null) {
    		return $model;
    	} else {
    		throw new NotFoundHttpException('The requested page does not exist.');
    	}
    }
}