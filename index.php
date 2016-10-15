<?php 

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', __DIR__ . DS);
require 'sys/start.php';
core\App::run();