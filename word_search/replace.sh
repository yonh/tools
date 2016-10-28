#!/bin/bash

file="tmp.txt"
php app.php '<include file="./template/home/{:__THEME__}/PC/page/__headInclude__.html"/>' > $file

php app.php '<include file="./template/home/{:__THEME__}/PC/page/__header__.html"/>' >> $file

php app.php '<include file="./template/home/{:__THEME__}/PC/page/__footer__.html"/>' >> $file



bash get_files.sh $file

cat filenames.txt > $file
rm filenames.txt 

for file in `cat $file`
do
	php replace.php $file '<include file="./template/home/{:__THEME__}/PC/page/__headInclude__.html"/>' '<include file="./__headInclude__"/>'
	php replace.php $file '<include file="./template/home/{:__THEME__}/PC/page/__header__.html"/>' '<include file="./__header__"/>'
	php replace.php $file '<include file="./template/home/{:__THEME__}/PC/page/__footer__.html"/>' '<include file="./__footer__"/>'

done
