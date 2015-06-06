<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Depot;
use app\models\Requirement;
use app\models\RequirementPassDepot;

interface IRequirementService
{
	public function savePassDepots($id, $depotIds);
	public function deleteRequirement($id);
}

class RequirementService extends Object implements IRequirementService
{
	function savePassDepots($id, $depotIds)
	{
		foreach ($depotIds as $depotId) {
			$requirementPassDepot = new RequirementPassDepot();
			$requirementPassDepot->requirement_id = $id;
			$requirementPassDepot->depot_id = $depotId;
			$requirementPassDepot->save();
		}
	}

	function deleteRequirement($id)
	{
		$requirementPassDepots = RequirementPassDepot::find()->where(['requirement_id' => $id])->all();
		foreach ($requirementPassDepots as $requirementPassDepot) {
			$requirementPassDepot->delete();
		}
		Requirement::findOne($id)->delete();
	}
}