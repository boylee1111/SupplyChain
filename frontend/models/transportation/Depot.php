<?php

namespace app\models\transportation;

class Depot
{
	var $id;
	var $name;
	var $next;
	var $nextNum;

	public function __construct($_id, $_name) {
		$this->id = $_id;
		$this->name = $_name;
		$this->next = array();
		$this->nextNum = 0;
	}

	public function __get($name) {
		return  $this->name;
	}

	public function __set($name, $value) {
		$this->name = $value;
	}
}
?>