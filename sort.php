<?php

class Test implements Iterator{
    private $item = array('id'=>1,'name'=>'php');

    public function rewind(){
        reset($this->item);
    }

    public function current(){
        return current($this->item);
    }

    public function key(){
        return key($this->item);
    }

    public function next(){
        return next($this->item);
    }

    public function valid(){
        return($this->current()!==false);
    }
}
//测试
$t=new Test;
foreach($t as $k=>$v){
	echo$k,'--->',$v,'',PHP_EOL;
}

function bubble_sort($arr){
	$length = count($arr);
	$tmp = null;
	$change = false;
	for($i=0;$i<$length;$i++){
		$change = false;
		for($j=$length-1;$j>$i;$j--){
			if($arr[$j] < $arr[$j-1]){
				$tmp = $arr[$j];
				$arr[$j] = $arr[$j-1];
				$arr[$j-1] = $tmp;
				$change = true;
			}
		}
		if(false === $change){
			break;
		}
	}
	
	return $arr;
}

function quick_sort($arr){
	$length = count($arr);
	if( $length  <= 1){
		return $arr;
	}
	
	$left = [];
	$right = [];
	
	$one = $arr[0];
	
	for($i=1;$i<$length;$i++){
		if($arr[$i] < $one){
			$left[] = $arr[$i];
		}else{
			$right[] = $arr[$i];
		}
	}
	
	$left = quick_sort($left);
	$right = quick_sort($right);
	
	
	return array_merge($left,array($one),$right);
}


function select_sort($arr){
	$length = count($arr);
	
	for($i=0;$i<$length-1;$i++){
		$key = $i;
		for($j=$i+1;$j<$length;$j++){
			if($arr[$j] < $arr[$key]){
				$key = $j;
			}
		}
		if($key != $i){
			$tmp = $arr[$i];
			$arr[$i] = $arr[$key];
			$arr[$key] = $tmp;
		}
	}
	
	return $arr;
}


function insert_sort($arr){
	$length = count($arr);
	for($i=1;$i<$length;$i++){
		$tmp = $arr[$i];
		for($j=$i-1;$j>=0;$j--){
			if( $arr[$j] > $tmp ){
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $tmp;
			}else{
				break;
			}
		}
	}
	return $arr;
}



function shell_sort($arr){
    //计算数组长度
    $length=count($arr);
    //计算增量
    for ($gap=floor($length/2); $gap >0 ; $gap=floor($gap/2)) {
    //根据增量进行分组，进行直接插入排序
        for ($i=1; $i*$gap <$length ; $i++) {
            $tmp=$arr[$i*$gap];
            for ($j=$i-1; $j >=0 ; $j--) {
                if($tmp<$arr[$j*$gap]){   
					$arr[($j+1)*$gap]=$arr[$j*$gap];
                    $arr[$j*$gap]=$tmp;
                }else{
                    break;
                }
            }
        }
		var_dump($gap);
		print_r($arr);
    }
    return $arr;
}




$arr = array(10,2,36,14,10,25,23,85,99,45);
//$arr = bubble_sort($arr);
//$arr = quick_sort($arr);
//$arr = select_sort($arr);
//$arr = insert_sort($arr);
$arr = shell_sort($arr);
print_r($arr);
	
	

//array_pop,array_push , array_unshift,array_shift




