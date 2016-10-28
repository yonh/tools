<?php

require_once 'functions.php';

$start = microtime(true);

$word = "_write";
//$dir = "/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/";
$dir = "/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/";
//$dir = "/home/yonh/svn/niaoyun_agent/code/branches/develop/origin_haiduCloud/template/";

//$ignore = "/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/php-tail";
$ignore_dirs = array(
	"/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/test-gen",
	"/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/php-tail",
	"/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/vendor",
	"/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/framework"
);

if (isset($argv[1])) {
	$word = $argv[1];
	if (isset($argv[2])) {
		$dir = $argv[2];
	}
}

search_dir($dir, $word, $ignore_dirs);
search_dir($dir, '_format_sql', $ignore_dirs);
search_dir($dir, '_print_', $ignore_dirs);
search_dir($dir, '_tail', $ignore_dirs);


$end = microtime(true);

echo 'use time:' . round(($end - $start),4) .PHP_EOL;
