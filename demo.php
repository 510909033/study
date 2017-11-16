<?php


function jumpFloor($number)
{
	switch($number){
        case 0:
            return 0;
            break;
        case 1:
            return 1;
            break;
        case 2:
            return 2;
            break;
    }
    if($number <0){
        return 0;
    }

        $first = 1;
        $sec = 2;
        $total = 3;
        while($number>2){
			$tmp = $total;
            $total = $sec+$first;
            
            $first = $sec;
            $sec = $tmp;
            
            $number--;
        }
	return $total;
}


echo jumpFloor(30);