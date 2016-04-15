#!/usr/bin/ruby
# -*- coding: utf-8 -*-
require 'mechanize'
require 'awesome_print'
require 'fileutils'

require File.dirname(__FILE__) + '/functions.rb'

url = ARGV[0]

if url then
	index = url.rindex("/");
	path = url[0, index+1]

	agent = Mechanize.new
	agent.user_agent_alias = 'Mac Mozilla'
	#page = agent.get(url)
	#puts page.body
	page = File.read("index.html")

	# 获取scripts节点
	scripts = get_script_src page
	scripts.each do |src|
		src = "/" + src
		dir = "down/" + get_folder(src)
		if !Dir.exist?(dir) then
			FileUtils.mkdir_p dir
		end
		download("http://jansis.net/Sapphire"+src, "down"+ src)
	end
	ap scripts
	
	css = get_css_src page
	css.each do |src|
		src = "/" + src
		dir = "down/" + get_folder(src)
		if !Dir.exist?(dir) then
			FileUtils.mkdir_p dir
		end
		download("http://jansis.net/Sapphire"+src, "down"+ src)
	end

	#write_to_file('down/index.html', page.body)
end

