<?php 
namespace core;

use core\View;
use core\traits\Jump;
/**
* 控制器类
*/
class Controller
{
	use Jump;

	protected $vars = [];
	protected $tpl;

	final protected function assign($name,$value = '')
	{
		if (is_array($name)) {
			$this->vars = array_merge($this->vars,$name);
			return $this;
		} else {
			$this->vars[$name] = $value;
		}
	}

	final public function setTpl($tpl='')
	{
		$this->tpl = $tpl;
	}

	final protected function display()
	{
		$view = new View($this->vars);
		$view->display($this->tpl);
	}
}