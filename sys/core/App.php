<?php 
namespace core;

use core\Config;
use core\Router;
/**
* 框架启动类
*/
class App
{
	public static $router;

	public static function run()
	{
		self::$router = new Router();
		self::$router->setUrlType(Config::get('url_type'));
		$url_array = self::$router->getUrlArray();
		self::dispatch($url_array);
	}

	public static function dispatch($url_array = [])
	{
		$module = '';
		$controller = '';
		$action= '';
		if (isset($url_array['module'])) {
			$module = $url_array['module'];
		} else {
			$module = Config::get('default_module');
		}
		if (isset($url_array['controller'])) {
			$controller = ucfirst($url_array['controller']);
		} else {
			$controller = ucfirst(Config::get('default_controller'));
		}
		$controller_file = APP_PATH . $module . DS . 'controller' .DS . $controller . 'Controller.php';
		
		if (isset($url_array['action'])) {
			$action = $url_array['action'];
		} else {
			$action = Config::get('default_action');
		}
		if (file_exists($controller_file)) {
			require $controller_file;
			$className  = 'module\controller\IndexController';
			$className = str_replace('module',$module,$className);
			$className = str_replace('IndexController',$controller.'Controller',$className);
			$controller = new $className;
			$controller->setTpl($action);
			if (method_exists($controller,$action)) {
				$controller->$action();
			} else {
				die('The method does not exist');
			}
		} else {
			die('The controller does not exist');
		}
	}
}