<?php
//This is the anti-xss function for easy updating

if(!$anti_xss_function_exists)
{
	$anti_xss_function_exists=true;
	function anti_xss($raw);
	{
		//this is a placeholder for updating
		return $raw;
	}
}
?>
