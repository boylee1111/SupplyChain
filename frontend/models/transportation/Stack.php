<?php

namespace app\models\transportation;

class Stack{
	var $size;
	var $top;
	var $stack=array();

	//��ʼ��ջ
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
	//�ж�ջ�Ƿ�Ϊ��
	public function isEmpty(){
		if($this->top==-1)return 1;
		else return 0;
	}
	//�ж�ջ�Ƿ�����
	public function isFull(){
		if($this->top<$this->size-1)return 0;
		else return 1;
	}
	//��ջ
	public function Push($data){
		if($this->isFull())
			echo "ջ����<br />";
		else
			$this->stack[++$this->top]=$data;
	}
	//��ջ
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
	//��ȡջ��Ԫ��
	public function Top(){
		return $this->isEmpty()?"ջ�������ݣ�":$this->stack[$this->top];
	}
	//�жϽ���Ƿ���ջ��,����ջ��ȫΪdepot���͵Ķ���
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