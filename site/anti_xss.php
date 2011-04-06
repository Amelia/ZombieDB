<?php
//This is the anti-xss function for easy updating

if(!$anti_xss_function_exists)
{
	$anti_xss_function_exists=true;
	function anti_xss($raw)
	{
		//strip_tags syntax the second parameter lists all ALLOWED html tags
		$raw = strip_tags($raw,'<b>,<i>,<u>,<font>,<li>,<ul>,<ol>,<p>');
		$raw = str_replace('\r','',$raw);
		$raw = str_replace('\n','<br>',$raw);
		return $raw;
	}
}
?>
