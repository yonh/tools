#!/bin/bash
# 修改用户中心模板

file="tmp.txt"
dir="/home/yonh/svn/niaoyun_agent/code/branches/develop/origin/template/User/"
search1='<title>用户中心 - 小鸟云</title>'
rep1='__THEME_STATIC__'
rep1='<title>用户中心 - {$common_site_name}</title>'



php app.php "$search1" $dir > $file


bash get_files.sh $file

cat filenames.txt > $file
rm filenames.txt 

for file in `cat $file`
do
	php replace.php $file "$search1" "$rep1"
	
done


