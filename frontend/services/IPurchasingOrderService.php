<?php

namespace frontend\services;

use Yii;
use yii\base\Object;
use app\models\PurchasingOrder;
use common\models\User;

interface IPurchasingOrderService
{
	public function applyNewPurchasingOrder($id);
	public function approvePurchasingOrder($id);
	public function rejectPurchasingOrder($id);
	public function confirmPurchasingOrder($id);
	public function warehousingPurchasingOrder($id);
	public function discrepantPurchasingOrder($id);
	public function findModel($id);
}

class PurchasingOrderService extends Object implements IPurchasingOrderService
{
	function applyNewPurchasingOrder($id)
	{
		$model = $this->findModel($id);
        $model->apply_date = date("Y-m-d H:i:s");
        $model->save();
	}

	function approvePurchasingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 1;
		$model->approval_user_id = Yii::$app->user->getId();
		$model->save();
	}

	function rejectPurchasingOrder($id)
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
			->setSubject('Your application for purchasing is rejected by'.$rejectUser->username)
			->setTextBody('This is auto sending, do not replay this email!')
			->send();
	}

	function confirmPurchasingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 2;
		$model->save();
	}

	function warehousingPurchasingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 4;
		$model->save();
	}

	function discrepantPurchasingOrder($id)
	{
		$model = $this->findModel($id);
		$model->status = 9;
		$model->save();

		$appliedUser = $model->applyUser;
		$discrepantUser = User::findOne(Yii::$app->user->getId());
		Yii::$app->mailer->compose()
			->setFrom(Yii::$app->params['systemEmail'])
			->setTo($appliedUser->email)
			->setSubject('Your application for purchasing is mark as discrepancy by'.$discrepantUser->username)
			->setTextBody('This is auto sending, do not replay this email!')
			->send();
	}

	function findModel($id)
    {
        if (($model = PurchasingOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}