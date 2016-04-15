#!/usr/bin/env ruby
# -*- coding: utf-8 -*-
require "open-uri"

# 写入文件
def write_to_file (file, txt)
	File.open(file, "w") { |f| f.puts txt }
end


# 下载文件
def download(url, filename)
	puts "download: #{url}"
	data=open(url) { |f| f.read }
	open(filename, "wb"){ |f| f.write data }
end


def get_script_src(content)
	arr = []
	content.scan(%r{<script.*src=["|](.*)["|'].*></script>}).each do |item|
		arr.push(item[0])
	end
	arr
#	.each do |item|
#		puts path.to_s + item[0].to_s
#	end
end

def get_folder(url)
	lindex = url.index("/")+1
	if url[lindex+1] == "/" then
		lindex += 1
	end
	rindex = url.rindex("/")-lindex
	url[lindex, rindex]
end


