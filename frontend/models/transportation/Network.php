<?php

namespace app\models\transportation;

class Network
{
	var $depotNum;
	var $roadNum;
	var $depotList;
	var $roadList;
	var $link;
	var $stack;

	public function __construct($_depotnum) {
		$this->depotNum = $_depotnum;
		$this->roadNum = 0;
		$this->stack = new Stack($this->depotNum+1);
		$this->depotList = array();
		$this->roadList = array();
		$this->link = array();
		for ($i = 0; $i < $this->depotNum; $i++) {
			$this->link[$i] = array();
			for ($j = 0; $j < $this->depotNum; $j++) {
				$this->link[$i][$j] = -1;
			}
		}
	}

	public function __get($name) {
		return $this->name;
	}

	public function __set($name, $value) {
		$this->name = $value;
	}
	
	public function getDepotLinkId($_id) {
		for ($i = 0; $i < $this->depotNum; $i++) {
			if ($this->depotList[$i]->id == $_id) {
				return $i;
			}
		}
		return -1;
	}
	
	public function savePath($start, $end, &$pathChild)
	{
		$len = $this->stack->Length();
		$num = count($pathChild);
		$pathChild[$num] = array();
		for ($i = 0; $i < $len; $i++) {
			$pathChild[$num][$i] = $this->stack->getData($i);
		}
	}
	
	public function computePath(&$order)
	{
		$passDepot = array();
		$startId = $this->getDepotLinkId($order->startId);
		$endId = $this->getDepotLinkId($order->endId);
		
		
		$passNum = count($order->passId);
		$passDepot[0] = $startId;
		$passDepot[$passNum+1] = $endId;

		for ($i = 0; $i < $passNum; $i++) {
			$passDepot[$i+1] = $order->passId[$i];
		}

		for ($i = 0; $i < $passNum+1; $i++) {
			$order->allChild[$i] = array();
			$this->getPaths($passDepot[$i], -1, $passDepot[$i], $passDepot[$i+1], $order->allChild[$i]);
			$this->stack->Reset();
		}
		$this->combine($order);		
	}

	public function combine(&$order) {
		$num = 1;
		$con = array();
		$cur = array();
		$all = array();
		for ($i = 0; $i < count($order->allChild); $i++) {
			$con[$i] = count($order->allChild[$i]);
			$cur[$i] = 0;
			$num *= $con[$i];
		}
		$count = 0;
		while ($count < $num) {
			$k = 1;
			for ($i = 0; $i < count($con); $i++) {
				for ($j = 1; $j < count($order->allChild[$i][$cur[$i]]); $j++) {
					$all[$count][$k++] = $order->allChild[$i][$cur[$i]][$j];
				}
			}
			$all[$count][0] = $order->allChild[0][0][0]; 
			$count++;
			$this->change($con, $cur, 0, count($con)-1);
		}
		$order->allpath = $all;
		
	}	 
	public function change(&$con, &$cur, $start, $end ){
		if ($end >= $start && $cur[$end] == ($con[$end]-1)) {
			$cur[$end] = 0;
			$this->change($con, $cur, $start, $end - 1);
		} else if ($end >= 0) {
			$cur[$end]++;
		}
	}

	public function getPaths($cur, $par, $start, $end, &$pathChild) {
	
		$next = -1;
		if ($cur != -1 && $par != -1 && $cur == $par)
			return 0;
	
		if ($cur != -1) {
			$i = 0;
			$this->stack->Push($cur);
	
			if ($cur == $end)
			{
				$this->savePath($start, $end, $pathChild);
				return 1;
			}
			else
			{
				if ($i<count($this->depotList[$cur]->next)) {
					$next = $this->depotList[$cur]->next[$i];
				}
				while ($next != -1) {
					if ($par != -1 && ($next == $start || $next == $par || $this->stack->isIn($next))) {
						$i++;
						if ($i >= count($this->depotList[$cur]->next))
							$next = -1;
						else {
							$next = $this->depotList[$cur]->next[$i];
						}
						continue;
					}
					if ($this->getPaths($next, $cur, $start, $end,$pathChild))
					{
						$this->stack->Pop();
					}
					$i++;
					if ($i >= count($this->depotList[$cur]->next))
						$next = -1;
					else {
						$next = $this->depotList[$cur]->next[$i];
					}
				}

				$this->stack->Pop();
				return 0;
			}
		} else
			return 0;
	}
	
	public function computeCost($order) {
		for ($i = 0; $i < count($order->allpath); $i++) {
			$this->pathCost($order, $i);
		}
		if ($order->mini == -1) return;
		for ($i = 0; $i < count($order->allpath[$order->mini]); $i++) {
			$order->path[$i] = $order->allpath[$order->mini][$i];
		}
	}
	
	public function pathCost(&$order, $pathi) {
		$order->alltrans[$pathi] = array();
		$trans = array();
		$num = 1;
		$con = array();
		$cur = array();
		$road = array();
		$all = array();
		$start;
		$end; 
		for ($i = 0; $i < count($order->allpath[$pathi]) - 1; $i++) {
			$start = $order->allpath[$pathi][$i];
			$end = $order->allpath[$pathi][$i+1];
			$road[$i] = $this->link[$start][$end];
			$con[$i] = count($this->roadList[$road[$i]]->transportation);
			$num*=$con[$i];
			$cur[$i] = 0;
		}
		$count = 0;
		$mincost = -1;
		$timeOfCost = -1;
		$transport;
		while ($count < $num) {
			$order->alltrans[$pathi][$count] = array();
			$cost = 0;
			$time = 0;
			for ($i = 0; $i < count($con); $i++) {
				$order->alltrans[$pathi][$count][$i+2] = $this->roadList[$road[$i]]->transportation[$cur[$i]][0];
				$time+=$this->roadList[$road[$i]]->transportation[$cur[$i]][1];
				$cost+=$this->roadList[$road[$i]]->transportation[$cur[$i]][2];
			}
			$order->alltrans[$pathi][$count][0] = $time;
			$order->alltrans[$pathi][$count][1] = $cost;
			if ($time <= $order->timeLimit) {
				if ($mincost < 0||($mincost > 0 && $mincost > $cost)) {
					$mincost = $cost;
					$timeOfCost = $time;
					$transport = array();
					for ($j = 0; $j < count($con); $j++) {
						$transport[$j] = $this->roadList[$road[$j]]->transportation[$cur[$j]][0];
					}
				}
			}
			$count++;
			$this->change($con, $cur, 0, count($con)-1);
		}

		if ($order->expense < 0 || ($order->expense > 0 && $order->expense > $mincost)) {
			$order->expense = $mincost;
			$order->trans = $transport;
			$order->time = $timeOfCost;
			$order->mini = $pathi;
		}
	}
}
