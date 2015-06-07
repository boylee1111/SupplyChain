<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Depot;
use app\models\RoadSection;
use app\models\Requirement;
use app\models\RequirementPassDepot;
use app\models\transportation\Network;

interface IRequirementService
{
	public function savePassDepots($id, $depotIds);
	public function deleteRequirement($id);
	public function calculatePath($id);
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

	function calculatePath($id)
	{
		$requirement = Requirement::findOne($id);

		$order = new \app\models\transportation\Order(
			$requirement->requirement_id,
			$requirement->start_depot_id,
			$requirement->end_depot_id,
			$requirement->requirement_time_limit);

		$allDepots = Depot::find()->all();
		$allRoadSections = RoadSection::find()->all();

		$network = new Network(count($allDepots));
	    for ($i = 0; $i < count($allDepots); $i++) { 
	    	$depot = $allDepots[$i];
	    	$network->depotList[$i] = new \app\models\transportation\Depot($depot->depot_id, $depot->short_name);
	    }
	    for ($i = 0; $i < count($allRoadSections); $i++) { 
	    	$roadSection = $allRoadSections[$i];
	    	$roadId = $roadSection->road_section_id;
	    	$startId = $roadSection->start_depot_id;
	    	$endId = $roadSection->end_depot_id;

	    	$network->roadList[$i] = new \app\models\transportation\RoadSection($roadId, $startId, $endId);
	    	$allTransportations = $roadSection->transportations;
	    	for ($j= 0; $j < count($allTransportations); $j++) { 
	    		$transportation = $allTransportations[$j];
	    		$network->roadList[$i]->transportation[$j] = array(
	    			$transportation->transportation_name,
	    			$transportation->transportation_time,
	    			$transportation->transportation_cost);
	    	}
	    }
	    $network->roadNum = count($network->roadList);

	    for ($i= 0; $i < $network->roadNum; $i++) { 
	    	$startId = $network->roadList[$i]->startId;
	    	$endId = $network->roadList[$i]->endId;

	    	$startDepotId = $network->getDepotLinkId($startId);
	    	$endDepotId = $network->getDepotLinkId($endId);
	    	$network->link[$startDepotId][$endDepotId] = $i;
	    	$num = $network->depotList[$startDepotId]->nextNum;
	    	$network->depotList[$startDepotId]->next[$num] = $endDepotId;
	    	$network->depotList[$startDepotId]->nextNum = $network->depotList[$startDepotId]->nextNum + 1;
	    }

	    $network->computePath($order);
	    $network->computeCost($order);

	    $result = '';
	    for ($i = 0; $i < count($order->allpath); $i++) {
			for ($j = 0; $j < count($order->alltrans[$i]); $j++) {
				if ($requirement->requirement_time_limit < 0 || $requirement->requirement_time_limit < $order->alltrans[$i][$j][0]) continue;
				$result = $result.' time:'.$order->alltrans[$i][$j][0].' cost:'.$order->alltrans[$i][$j][1].'  ';
				$result = $result.$network->depotList[$order->allpath[$i][0]]->name;
				for ($k = 0; $k < count($order->alltrans[$i][$j])-2; $k++) {
					$result = $result.'--'.$order->alltrans[$i][$j][$k + 2].'--'.$network->depotList[$order->allpath[$i][$k + 1]]->name;
				}
				$result = $result.PHP_EOL;
			}	
		}

		$requirement->requirement_path = $result;
		$requirement->save();

		return $result;
	}
}