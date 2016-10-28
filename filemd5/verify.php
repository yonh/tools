<?php
require 'common.php';

verify_file($md5_log, $separator, $dest_dir);

function verify_file($file, $line_separator,$dest_dir)
{
	if ($fh = fopen($file, 'r')) {
		while (! feof($fh)) {
			$s = fgets($fh);
			if ($s) {
				$strArr = explode($line_separator, $s);
				$short = $strArr[1];
				$fullname = $strArr[0];
				$src_md5 = trim($strArr[2]);
				$dest_md5 = md5_file($dest_dir. trim($short));
				if ($src_md5 !== $dest_md5) {
					echo 'fail: ' . $strArr[0].PHP_EOL.
						"src: " . $src_md5. "| ".
						"dest: " . $dest_md5.PHP_EOL.PHP_EOL;
					

				}
			}
		}
	}
}


function verify_file_md5($src, $dest, $verify_log_file, $separator)
{
	$md5_src = md5_file($src);
	$md5_dest = md5_file($dest);
	if ($md5_src !== $md5_dest) {

		f_append($verify_log_file, "$src" . $separator . $dest);
	}
}
