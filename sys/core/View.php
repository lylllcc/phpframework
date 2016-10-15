<?php 
namespace core;

use core\Config;
use core\Parser;
/**
* 视图类
*/
class View
{
	public $vars = [];

	function __construct($vars =[])
	{
		if (!is_dir(Config::get('cache_path')) || !is_dir(Config::get('complie_path')) || !is_dir(Config::get('view_path'))) {
			exit('The directory does not exist');
		}
		$this->vars = $vars;
	}

	public function display($file)
	{
		$tpl_file = Config::get('view_path').$file.Config::get('view_suffix');
		if (!file_exists($tpl_file)) {
			exit('Template file does not exist');
		}
		$parser_file = Config::get('complie_path').md5("$file").$file.'.php';
		$cache_file = Config::get("cache_path").Config::get("cache_prefix").$file.'.html';
		if (Config::get('auto_cache')) {
			if (file_exists($cache_file) && file_exists($parser_file)) {
				if (filemtime($cache_file) >= filemtime($parser_file) && filemtime($parser_file) >= filemtime($tpl_file)) {
					return include $cache_file;
				}
			}
		}
		if (!file_exists($parser_file) || filemtime($parser_file) < filemtime($tpl_file)) {
			$parser = new Parser($tpl_file);
			$parser->compile($parser_file);
		}
		include $parser_file;
		if (Config::get('auto_cache')) {
			file_put_contents($cache_file,ob_get_contents());
			ob_end_clean();
			return include $cache_file;
		}
	}
}