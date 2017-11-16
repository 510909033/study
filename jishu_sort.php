<?php
error_reporting(0);
error_reporting(E_ALL);
function jishu_sort($arr){
	
	$step = 0;
	$len = count($arr);
	$new = [];
	$continue = true;
	

	while(true){
		$new = [];
		for($i=0;$i<=9;$i++){
			$new[$i] = [];
		}
		$continue = false;
		for($i=0;$i<$len;$i++){

			$tmp = substr($arr[$i],-1-$step,1);
			if(strlen($arr[$i])< abs(-1-$step) ){
				$tmp = "";
				$new[0][] =  $arr[$i];
			}
			
			var_dump($tmp ."---|||".(-1-$step));
		
			if(strlen($tmp)>0){
				$new[ $tmp ][] = $arr[$i];
				$continue = true;
			}
		}
		

	

		if($continue){
			$arr = [];
			for($i=0;$i<=9;$i++){
				$sub_len = count($new[$i]);
				for($j=0;$j<$sub_len;$j++){
					$arr[] = $new[$i][$j];
				}
			}
			$step++;
		}else{
			$arr = $new[0];
			break;
		}
		
		
	}
	
	
	return $arr;
}



$arr = array(10,2,36111,14,10,25,231,85,99,451);
$arr = jishu_sort($arr);



print_r($arr);
