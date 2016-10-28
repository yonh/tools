<?php


// 替换字符串, $str:被替换  $rep_str:替换
function replace_str($file, $str, $rep_str) {
	$txt = file_get_contents($file);
	$new_s = str_replace($str, $rep_str, $txt);
	$fh = fopen($file, 'w+');
	fputs($fh, $new_s);
	fclose($fh);
}


function find_word($word, $str) {
	if (strpos($str, $word) !== false) {
		return true;
	}

	return false;
}

function is_comments($str) {
	$str = trim($str);
	$index = strpos($str, '//');

	if ($index !== false && $index == 0) {
		return true;
	} else {
		return false;
	}
}

function find($file, $word) {
	$line = 0;


	$echoFileName = false;

	if ($fh = fopen($file, 'r')) {
		while (! feof($fh)) {
			$s = fgets($fh);
			if ($s) {
				$line++;

				if (find_word($word, $s)) {

					if (!is_comments($s)) {

						if (!$echoFileName) {
							$echoFileName = true;
							echo $file . "\n";
						}

						echo $line . ": " . $s . PHP_EOL;
					}
				}
			}
		}
	}
}


function search_dir($dir, $word, $ignore) {
	if (in_array($dir, $ignore)) return;

	$di = new DirectoryIterator($dir);
	foreach ($di as $d) {
		if ($d->isFile() && ($d->getExtension()=='php' ||  $d->getExtension()=='js'|| $d->getExtension()=='html')) {
			find($d->getRealPath(), $word);
		} else if ($d->isDir() && !$d->isDot()) {
			search_dir($d->getRealPath(), $word, $ignore);
		}
	}
}
