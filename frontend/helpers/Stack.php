<?php

namespace app\helpers;

class Stack{
    var $size;
    var $top;
    var $stack = array();

    public function __construct($size){
        $this->size = $size;
        $this->top = -1;
    }

    public function Reset() {
        $top = -1;
    }

    public function Length(){
        return $this->top + 1;
    }

    public function isEmpty(){
        if($this->top == -1) return 1;
        else return 0;
    }

    public function isFull(){
        if ($this->top < $this->size - 1) return 0;
        else return 1;
    }
    
    public function Push($data){
        if ($this->isFull())
            echo "full";
        else
            $this->stack[++$this->top]=$data;
    }

    public function Pop(){
        if ($this->isEmpty()) {
            return null;
        }
        else {
            return $this->stack[$this->top--];
        }
    }

    public function getData($i) {
        if ($i <= $this->top) {
            return $this->stack[$i];
        }
    }
    
    public function Top(){
        return $this->isEmpty() ? "Empty" : $this->stack[$this->top];
    }
    
    public function isIn($data){
        for ($i = 0; $i <= $this->top; $i++) {
            if ($this->stack[$i] === $data) {
                return 1;
            }
        }
        return 0;
    }
}