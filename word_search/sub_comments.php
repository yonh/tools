<?php

$file = "/home/yonh/Desktop/database.sql";
$file2 = "/home/yonh/Desktop/database.clear.sql";

$fh = fopen($file, 'r');
$fh2 = fopen($file2, 'w');
while (! feof($fh)) {
	if ($s = fgets($fh)) {
		$pos = mb_strpos($s, "--",0,'utf-8');
		if ($pos===false) {
			fputs($fh2, $s);
		}
	}
}

fclose($fh);
fclose($fh2);
