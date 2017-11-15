<?php
//顺序查找
function search($arr,$search_value){
	$len = count($arr);
	for($i=0;$i<$len;$i++){
		if($arr[$i] == $search_value){
			break;
		}
	}
	if($i < $len){
		return $i;
	}
	return -1;
}




$arr = array(10,2,36,14,10,25,23,85,99,45);
//$arr = bubble_sort($arr);
//$arr = quick_sort($arr);
//$arr = select_sort($arr);
$arr = search($arr,23);
print_r($arr);



