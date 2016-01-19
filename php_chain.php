<?php
/**
 * @todo php模拟链表
 * @author pengsidong@gmail.com
 */

	$classTest = new PhpChain();
	$classTest->outPutChain();
	$classTest->insertElement(4);
	$classTest->outPutChain();

	class PhpChain{
		private $dataIndex = 0;//数据长度
		private $data = array();//数据数组
		private $nextPointer = array();//模拟链表数组
		public  $head = 0;

		function __construct($default=array(1,3,4,5,6,2,7,8,9)){
			sort($default);
			foreach($default as $v){
				$this->data[$this->dataIndex+1] = $v;//键值从1开始
				$this->nextPointer[$this->dataIndex] = $this->dataIndex+1;
				$this->dataIndex++;
			}
		}

		public function outPutChain(){
			echo 'data:';print_r($this->data);echo '<br>';
			$index = $this->head;
			echo 'nextPointer:';print_r($this->nextPointer);echo '<br>';
			while (isset($this->data[$this->nextPointer[$index]])) {
				echo $this->data[$this->nextPointer[$index]].' ';
				$index=$this->nextPointer[$index];
			}
			echo '<hr>';
		}

		public function insertElement($newNum){
			$index = $this->head;
			while (isset($this->data[$this->nextPointer[$index]])){
				if($this->data[$this->nextPointer[$index]]>$newNum){//链表数组关系调整
					$this->dataIndex++;
					$this->data[$this->dataIndex] = $newNum;
					$tmp = $this->nextPointer[$index];
					$this->nextPointer[$index]=$this->dataIndex;
					$this->nextPointer[$this->dataIndex] = $tmp;
					return;
				}
				$index=$this->nextPointer[$index];
			}
			#插入元素最大
			$this->dataIndex++;
			$this->data[$this->dataIndex] = $newNum;
			$this->nextPointer[$index]=$this->dataIndex;
		}

	}