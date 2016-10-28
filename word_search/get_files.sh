#!/bin/bash

for i in `cat $1`
do
	if [ -f $i ]; then
		echo $i >> filenames.txt
	fi
done
