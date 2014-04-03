<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('shutdown'))
{
	function shutdown()
	{
		$install_log = fopen(APPPATH .'logs/install.log', 'a+');	
		fwrite($install_log, error_get_last());
		fclose($install_log);
		
		echo file_get_contents(APPPATH .'logs/install.log');
	}
}