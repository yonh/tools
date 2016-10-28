<?php

$src_dir = "/home/yonh/git/rbtool";
$dest_dir = "/home/yonh/git/rbtool";


$md5_log = __DIR__. '/md5.log';
$verify_log = __DIR__. '/verify.log';
$separator = "--->>>";

function f_append($file, $txt) {
	$fh = fopen($file,'a');
	fputs($fh, $txt);
	fclose($fh);
}

function f_write() {
	$fh = fopen($file,'w');
	fputs($fh, $txt);
	fclose($fh);
}
