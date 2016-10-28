<?php

require_once 'functions.php';

$start = microtime(true);


if (isset($argv[1])) {
	$file = $argv[1];
	$str =  $argv[2];
	$rep =  $argv[3];

	replace_str($file, $str, $rep);

}











$end = microtime(true);

echo 'use time:' . round(($end - $start),4) .PHP_EOL;
