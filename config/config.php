<?php 

return [
	'db_host' 	=>	'127.0.0.1',
	'db_user' 	=>	'root',
	'db_pwd' 	=>	'',
	'db_name' 	=>	'labframe',
	'db_table_prefix' 	=>	'lab_',
	'db_charset' 	=>	'utf8',

    'default_module'    => 'home',
	'default_controller' 	=>	'Index',
	'default_action' 	=>	'index',
    'url_type'          =>      2,

	'cache_path' 	=>	RUNTIME_PATH . 'cache' .DS,
	'cache_prefix' 	=>	'cache_',
	'cache_type' 	=>	'file',
	'complie_path' 	=>	RUNTIME_PATH . 'compile' .DS,

    // 模板路径
    'view_path'    => APP_PATH .'home' . DS . 'view' . DS,
    // 模板后缀
    'view_suffix'  => '.php',

    'auto_cache' 	=> true,
    // URL伪静态后缀
    'url_html_suffix'        => 'html',

];