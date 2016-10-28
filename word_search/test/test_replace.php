<?php

require '../functions.php';

$file = "buy.txt";


replace_str($file, '<include file="./template/home/{:__THEME__}/PC/page/__headInclude__.html"/>','<include file="./__headInclude__"/>');
exit;

test_rep($file, 'abc', 'abc','def', 'def');
test_rep($file,'def', 'def','abc', 'abc');
test_rep($file,'abcd', 'abc','aaa', 'aaad');
test_rep($file,'abca', 'a','1', '1bc1');
test_rep($file,'abcaa', 'aa','QQ', 'abcQQ');

system("rm $file");

function test_rep($file,$init_str, $str, $rep, $eqstr) {
	system("echo ".$init_str." > ". $file);

	replace_str($file, $str,$rep);
	$s = trim(file_get_contents($file));

	if ($s == $eqstr) {
		echo 'yes'.PHP_EOL;
	} else {
		echo 'no'.PHP_EOL;;
	}
}
