<?php 
namespace home\controller;

use core\traits\Jump;
use core\Controller;
/**
* index
*/
class IndexController extends Controller
{
	// use Jump;
	public function index()
	{
		$this->assign('name','shiyanlou---Admin');
		$this->display();
	}

	public function hello()
	{
		$this->assign('name','shiyanlou');
		$this->display();
	}

}