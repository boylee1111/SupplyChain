<?php

namespace frontend\services;

use Yii;
use yii\base\Object;
use app\models\AuthAssignment;

interface IUserService
{
	public function saveAuthItemsToUser($id, $items);
	public function saveAuthItemToUser($id, $item);
}

class UserService extends Object implements IUserService
{
	function saveAuthItemsToUser($id, $items)
	{
		if ($items == null) return;
		foreach ($items as $item) {
			$this->saveAuthItemToUser($id, $item);
		}
	}

	function saveAuthItemToUser($id, $item)
	{
		$auth = Yii::$app->authManager;
		$role = $auth->getRole($item);
		$auth->assign($role, $id);
	}
}