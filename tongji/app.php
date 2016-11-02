<?php
require 'functions.php';

$dir = "/home/yonh/git/tools";
$dir = "/home/yonh/git/tools/tongji/a";

$files = file_counts($dir);
$lines = line_counts($dir);
$emptys = line_empty_counts($dir);

echo "path: $dir".PHP_EOL;
echo "files: $files".PHP_EOL;
echo "emptys: $emptys".PHP_EOL;
echo "lines: $lines";

