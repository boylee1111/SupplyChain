<?php

namespace frontend\helpers;

use yii\helpers\ArrayHelper;

class RestfulHelper
{
	public static function successfulStatusEnvolop()
	{
		return [
			'status' => 0,
			'message' => 'success',
		];
	}

	public static function requirementsToJsonFormat($requirements)
	{
		$result = array();
		foreach ($requirements as $requirement) {
			$result[] = static::requirementToJsonFormat($requirement);
		}
		return $result;
	}

	public static function requirementToJsonFormat($requirement)
	{
		$result = array();
		$result = array_merge($result, [
				'requirement_id' => $requirement->requirement_id,
				'time_limit' => $requirement->requirement_time_limit,
				'start_depot_serial_number' => $requirement->startDepot->serial_number,
				'end_depot_serial_number' => $requirement->endDepot->serial_number,
				'pass_depots_serial_number' => ArrayHelper::getColumn($requirement->depots, 'serial_number'),
				'requirement_path' => $requirement->requirement_path,
			]);
		return $result;
	}

	public static function depotsToJsonFormat($depots)
	{
		$result = array();
		foreach ($depots as $depot) {
			$result[] = static::depotToJsonFormat($depot);
		}
		return $result;
	}

	public static function depotToJsonFormat($depot)
	{
		$result = array();
		$result = array_merge($result, [
				'serial_number' => $depot->serial_number,
				'country' => $depot->country,
				'name' => $depot->name,
				'short_name' => $depot->short_name,
			]);
		$result['longitude'] = $depot->longitude;
		$result['altitude'] = $depot->altitude;
		return $result;
	}

	public static function roadSectionsToJsonFormat($roadSections)
	{
		$result = array();
		foreach ($roadSections as $roadSection) {
			$result[] = static::roadSectionToJsonFormat($roadSection);
		}
		return $result;
	}

	public static function roadSectionToJsonFormat($roadSection)
	{
		$result = array();
		$result = array_merge($result, [
				'serial_number' => $roadSection->serial_number,
				'road_section_name' => $roadSection->road_section_name,
				'start_depot_serial_number' => $roadSection->startDepot->name,
				'end_depot_serial_number' => $roadSection->endDepot->name,
				'transportation' => static::transportationsToJsonFormat($roadSection->transportations),
			]);
		return $result;
	}

	public static function transportationsToJsonFormat($transportations)
	{
		$result = array();
		foreach ($transportations as $transportation) {
			$result[] = static::transportationToJsonFormat($transportation);
		}
		return $result;
	}

	public static function transportationToJsonFormat($transportation)
	{
		$result = array();
		$result = array_merge($result, [
				'transportation_name' => $transportation->transportation_name,
				'transportation_cost' => $transportation->transportation_cost,
				'transportation_time' => $transportation->transportation_time,
			]);
		return $result;
	}

	private function setHeader($status)
  	{
      	$status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
      	$content_type="application/json; charset=utf-8";
 
      	header($status_header);
      	header('Content-type: ' . $content_type);
      	header('X-Powered-By: ' . "Maitrox <maitrox.com>");
  	}

  	private function _getStatusCodeMessage($status)
  	{
     	$codes = [
      		200 => 'OK',
      		400 => 'Bad Request',
      		401 => 'Unauthorized',
      		402 => 'Payment Required',
      		403 => 'Forbidden',
      		404 => 'Not Found',
      		500 => 'Internal Server Error',
      		501 => 'Not Implemented',
      	];
      	return (isset($codes[$status])) ? $codes[$status] : '';
  	}
}