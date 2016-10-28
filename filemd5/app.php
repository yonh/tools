<?php
require 'common.php';

//dir = "/media/yonh/0872b309-137b-351a-a3dc-9463f8e806bf1/mirror";
//$dir = "/home/yonh/git";


$fh = fopen($md5_log,'w');

show_files($src_dir, $fh, $separator, $src_dir);

fclose($fh);

function show_files($dir, $fh, $separator, $src_dir) {
	
	$di = new DirectoryIterator($dir);

	foreach ($di as $d) {
		$fullname = $d->getPathname();
		
 		if ($d->isDir() && !$d->isDot()) {
			show_files($fullname, $fh, $separator, $src_dir);
		} elseif ($d->isFile()) {
			$short =  substr($fullname, strlen($src_dir));
			$s = $fullname. $separator . $short. $separator . md5_file($fullname).PHP_EOL;
			fputs($fh, $s);
		}
	}
}
