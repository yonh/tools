<?php

function _counts($func, $dir)
{
	$times = 0;
	$dir = new \RecursiveDirectoryIterator($dir);
	foreach (new \RecursiveIteratorIterator($dir) as $file) {
		$name = $file->getFilename();
		if ($name == "." || $name == "..") continue;

		if (!$file->isDir() && $file->isFile()) {
			$times = call_user_func($func, $file, $times);
		}
	}

	return $times;
}

function line_empty_counts($dir) {
	return _counts("_empty_line", $dir);
}


function file_counts($dir) {
	return _counts("_file", $dir);
}

function line_counts($dir) {
	return _counts("_line", $dir);
}

/**
统计文件数
*/
function _file($file, $times) {
	$name = $file->getFilename();

	if ($name != '.' && $name!='..') $times++;

	return $times;
}

/**
统计行数
*/
function _line($file, $times) {
	$f = new \SplFileObject($file->getPathname());
	foreach ($f as $l) {
		$times++;
	}
	
	return $times -1;
}
/**
空行数
*/
function _empty_line($file, $times) {
	$f = new \SplFileObject($file->getPathname());
	foreach ($f as $l) {
		$tl = trim($l);
		if ('' == $tl) $times++;
	}
	
	return $times -1;
}



