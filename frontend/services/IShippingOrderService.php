<?php

namespace frontend\services;

use Yii;
use yii\base\Object;
use app\models\ShippingOrder;
use common\models\User;

interface IShippingOrderService
{
	public function applyNewShippingOrder($id);
	public function approveShippingOrder($id);
	public function rejectShippingOrder($id);
	public function confirmShippingOrder($id);
	public function receivingShippingOrder($id);
	public function discrepantShippingOrder($id);
}

class ShippingOrderService extends Object implements IShippingOrderService
{
	function applyNewShippingOrder($id)
	{
		$model = $this->findModel($id);
        $model->apply_date = date("Y-m-d H:i:s");
        $model->save();
	}

	function approveShippingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 1;
		$model->approval_user_id = Yii::$app->user->getId();
		$model->save();
	}

	function rejectShippingOrder($id)
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
			->setSubject('Your application for shipping is rejected by'.$rejectUser->username)
			->setTextBody('This is auto sending, do not replay this email!')
			->send();
	}

	function confirmShippingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 2;
		$model->save();
	}

	public function receivingShippingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 3;
		$model->save();
	}

	public function discrepantShippingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 9;
		$model->save();

		$appliedUser = $model->applyUser;
		$discrepantUser = User::findOne(Yii::$app->user->getId());
		Yii::$app->mailer->compose()
			->setFrom(Yii::$app->params['systemEmail'])
			->setTo($appliedUser->email)
			->setSubject('Your application for shipping is rejected by'.$discrepantUser->username)
			->setTextBody('This is auto sending, do not replay this email!')
			->send();
	}

	protected function findModel($id)
    {
        if (($model = ShippingOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}