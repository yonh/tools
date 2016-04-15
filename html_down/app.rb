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
#	page.scan(%r{<script.*src=["|](.*)["|'].*></script>}).each do |item|
#@		puts path.to_s + item[0].to_s
#	end
	srcs = get_script_src page
	srcs.each do |src|
		src = "/" + src
		dir = "down/" + get_folder(src)
		if !Dir.exist?(dir) then
			FileUtils.mkdir_p dir
		end
		download("http://jansis.net/Sapphire"+src, "down"+ src)
	end

	#write_to_file('down/index.html', page.body)
end

