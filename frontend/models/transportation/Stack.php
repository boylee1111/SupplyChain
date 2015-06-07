<?php

namespace app\models\transportation;

class Stack{
	var $size;
	var $top;
	var $stack=array();

	//初始化栈
	public function __construct($size){
		$this->size=$size;
		$this->top=-1;
	}
	public function Reset() {
		$top = -1;
	}
	public function Length(){
		return $this->top + 1;
	}
	//判断栈是否为空
	public function isEmpty(){
		if($this->top==-1)return 1;
		else return 0;
	}
	//判断栈是否已满
	public function isFull(){
		if($this->top<$this->size-1)return 0;
		else return 1;
	}
	//入栈
	public function Push($data){
		if($this->isFull())
			echo "栈满了<br />";
		else
			$this->stack[++$this->top]=$data;
	}
	//出栈
	public function Pop(){
		if($this->isEmpty())
			return null;
		else
		{
			return  $this->stack[$this->top--];
		}
	}

	public function getData($i) {
		if ($i<=$this->top) {
			return $this->stack[$i];
		}
	}
	//读取栈顶元素
	public function Top(){
		return $this->isEmpty()?"栈空无数据！":$this->stack[$this->top];
	}
	//判断结点是否在栈中,假设栈中全为depot类型的对象
	public function isIn($data){
		for ($i = 0; $i <= $this->top; $i++) {
			//$depot = $this->stack[$i];
			//echo $depot->no." haha ".$depot->name;
			if ($this->stack[$i] === $data) {
				return 1;
			}
		}
		return 0;
	}
}