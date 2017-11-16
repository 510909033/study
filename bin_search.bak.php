<?php

function bin_search($arr,$left,$right,$search_key){
	if($left <=$right)	{
		$mid = floor(($left+$right)/2);	
		if($arr[$mid] === $search_key){
			return $mid;
		}else if($arr[$mid] < $search_key){
			return bin_search($arr,$mid+1,$right,$search_key);
		}else{
			return bin_search($arr,$left,$mid-1,$search_key);
		}

	}
		
	return -1;
}

//二分查找法  
function bin_search2($arr,$search){  
    $height=count($arr)-1;  
    $low=0;  
    while($low<=$height){  
        $mid=floor(($low+$height)/2);//获取中间数  
        if($arr[$mid]==$search){  
            return $mid;//返回  
        }elseif($arr[$mid]<$search){//当中间值小于所查值时，则$mid左边的值都小于$search，此时要将$mid赋值给$low  
            $low=$mid+1;  
        }elseif($arr[$mid]>$search){//中间值大于所查值,则$mid右边的所有值都大于$search,此时要将$mid赋值给$height  
            $height=$mid-1;  
        }  
    }  
    return "查找失败";  
}  


function bin_search3($arr,$search_key){
	$right = count($arr)-1;
	$left = 0;
	while($left <= $right){
		$mid = floor(($left+$right)/2);
		if($arr[$mid] === $search_key){
			return $mid;
		}else if($arr[$mid] < $search_key){
			$left = $mid+1;
		}else{
			$right = $mid-1;
		}
	}
	return -1;
}


$arr = [1,2,9,0,22,44,77,11,23,4,56,'exists'];
sort($arr);
var_dump(bin_search($arr,0,count($arr)-1,77));
var_dump(bin_search($arr,0,count($arr)-1,'exists'));
var_dump(bin_search($arr,0,count($arr)-1,'not exists'));

var_dump(bin_search3($arr,77));
var_dump(bin_search3($arr,'exists'));
var_dump(bin_search3($arr,'not exists'));




