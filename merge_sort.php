<?php
/*
* 归并排序
* 归并排序是指将两个或两个以上有序的数列（或有序表），合并成一个仍然有序的数列（或有序表）。
* 这样的排序方法经常用于多个有序的数据文件归并成一个有序的数据文件。
* */
function mergeSort(&$arr) {
    $len = count($arr);//求得数组长度
    mSort($arr, 0, $len-1);
    return $arr;
}
//实际实现归并排序的程序
function mSort(&$arr, $left, $right) {
    if($left < $right) {
        //说明子序列内存在多余1个的元素，那么需要拆分，分别排序，合并
        //计算拆分的位置，长度/2 去整
        $center = floor(($left+$right) / 2);
        //递归调用对左边进行再次排序：
        mSort($arr, $left, $center);
        //递归调用对右边进行再次排序
        mSort($arr, $center+1, $right);
        //合并排序结果
        mergeArray($arr, $left, $center, $right);
    }
}
//将两个有序数组合并成一个有序数组
function mergeArray(&$arr, $left, $center, $right) {
    //设置两个起始位置标记
    $a_i = $left;
    $b_i = $center+1;
    while($a_i<=$center && $b_i<=$right) {
        //当数组A和数组B都没有越界时
        if($arr[$a_i] < $arr[$b_i]) {
            $temp[] = $arr[$a_i++];
        } else {
            $temp[] = $arr[$b_i++];
        }
    }
    //判断 数组A内的元素是否都用完了，没有的话将其全部插入到C数组内：
    while($a_i <= $center) {
        $temp[] = $arr[$a_i++];
    }
    //判断 数组B内的元素是否都用完了，没有的话将其全部插入到C数组内：
    while($b_i <= $right) {
        $temp[] = $arr[$b_i++];
    }

    //将$arrC内排序好的部分，写入到$arr内：
    for($i=0, $len=count($temp); $i<$len; $i++) {
        $arr[$left+$i] = $temp[$i];
    }
}





$arr = array(10,2,36,14,10,25 ,23,85,99,45);
//$arr = bubble_sort($arr);
//$arr = quick_sort($arr);
//$arr = select_sort($arr);
//mergeSort($arr);
//mergeArray($arr , 0,5,9);
//print_r($arr);

$sort = new MergeSort($arr);
print_r($sort->sortArray());


class MergeSort{
	
	private $arr;
	public function __construct($arr){
		$this->arr = $arr;
	}
	
	public function sortArray(){
		$this->_split(0 , count($this->arr) - 1 );
		return $this->arr;
	}
	
	private function _split($left,$right){
		if($left < $right){
			$center = floor( ($left + $right)/2 );
			$this->_split($left,$center);
			$this->_split($center+1,$right);
			$this->mergeArray($left,$center,$right);
		}
	}
	
	private function mergeArray($left,$center,$right){
		$temp = [];
		$ai = $left;
		$bi = $center+1;
		
		//echo ($left.' '.$center.' '.$right.PHP_EOL);
		
		while( $ai <=$center && $bi <=$right ){
			if($this->arr[$ai] < $this->arr[$bi]){
				$temp[] = $this->arr[$ai];
				$ai++;
			}else{
				$temp[] = $this->arr[$bi];
				$bi++;
			}
		}
		if($ai <= $center){
			for($i=$ai;$i<=$center;$i++){
				$temp[] = $this->arr[$i];
			}
		}
		if($bi <= $right){
			for($i=$bi;$i<=$right;$i++){
				$temp[] = $this->arr[$i];
			}
		}
		
		$j=0;
		for($i=$left;$i<=$right;$i++){
			$this->arr[$i] = $temp[$j];
			$j++;
		}
	}
	
}












