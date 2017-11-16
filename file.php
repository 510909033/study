<?php

$filename='bin_search.php';
if(!file_exists('bin_search.bak.php')){
	copy($filename,'bin_search.bak.php');
}

$fp = fopen($filename,'rb');
var_dump(fgets($fp));
var_dump(fgets($fp));

print_r(file($filename));





