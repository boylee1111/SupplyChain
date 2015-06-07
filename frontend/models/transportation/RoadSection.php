<?php

namespace app\models\transportation;

class RoadSection
{
	var $id;
	var $startId;
	var $endId;
	var $next;
	var $transportation;  //保存该路段的运输方式(name,time,cost);

	public function __construct($_id,$_startId, $_endId) {
		$this->id = $_id;
		$this->startId = $_startId;
		$this->endId = $_endId;
		$this->transportation = array();
	}

	public function __get($name) {
		return  $this->name;
	}

	public function __set($name, $value) {
		$this->name = $value;
	}
}