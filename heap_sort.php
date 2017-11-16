<?php
function heap_sort(&$arr){
	
	if(!$arr){
		return $arr;
	}
	
	build_heap($arr);
	
	$count = count($arr);
	while($count>1){
		swap($arr,0,$count-1);
		$count--;
		change($arr,$count,0);
		
	}
	
	
}

function build_heap(&$arr){
	$node = floor(count($arr)/2) - 1;
	for($i=$node;$i>=0;$i--){
		change($arr,count($arr),$i);
	}
	
	
}
function swap(&$arr,$a,$b){
	$tmp = $arr[$a];
	$arr[$a] = $arr[$b];
	$arr[$b] = $tmp;
}

function change(&$arr,$length,$node){
	$left = $node*2 + 1;
	$right = $node*2 + 2;
	$max = $node;
	while( $left <$length || $right < $length ){
		
		if($left <$length && $arr[$left]>$arr[$max]){
			$max = $left;
		}
		if($right <$length && $arr[$right]>$arr[$max] ){
			$max = $right;
		}
		if($max != $node){
			swap($arr,$node,$max);
			$node= $max;
			$left = $node*2 + 1;
			$right = $node*2 + 2;
		}else{
			break;
		}
	}	
}


$demo=[
	[],
	[1],
	[1,2],
	[2,1],[1,2,3],[3,2,1],
	[6,1,2,3,5,7,9],
	[22,33,99,1234,4457,234,12,678,987,28,38,39,910,102,29,88,28,283,283,928,381,12,203]
	
];
foreach($demo as $value){
	print implode(' , ',$value);
	heap_sort($value);
	
	print_r($value);
}








