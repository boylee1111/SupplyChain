<?php

namespace app\models\transportation;

class Order
{
	var $id;
	var $startId;  
	var $endId;    
	var $timeLimit;
	var $passId;  
	var $expense;  
	var $time;   
	var $allChild = array();
	var $allpath = array(); 
	var $alltrans = array();
	var $mini;
	var $path = array();  
	var $trans = array(); 

	public function __construct($_id, $_startId, $_endId, $_timeLimit) {
		$this->allChild = array();
		$this->path = array();
		$this->trans = array();
		$this->id = $_id;
		$this->startId = $_startId;
		$this->endId = $_endId;
		$this->timeLimit = $_timeLimit;
		$this->expense = -1;
		$this->time = -1;
		$this->mini = -1;
		$this->passId = array();
	}

	public function __get($name) {
		return  $this->name;
	}

	public function __set($name, $value) {
		$this->name = $value;
	}
}
