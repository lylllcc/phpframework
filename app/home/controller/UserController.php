<?php 
namespace home\controller;

use core\Controller;
use home\model\UserModel;
/**
* yong
*/
class UserController extends Controller
{
	
	function __construct()
	{
		echo " I am user controller!";
	}
	public function index()
	{
		$model = new UserModel();
		if ($model->save(['name'=>'hello','password'=>'shiyanlou'])) {
			$this->success('Success','/');	//执行成功，弹出信息，跳转至首页
		} else {
          $this->error('error');	//如果你在这个页面尝试，将会一直弹出错误信息.因为找不到上一页
		}
	}
}