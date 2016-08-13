<?php
define('APP_PATH', dirname(__FILE__));

//路由逻辑
if(empty($_GET['c'])) {
    $uri = ltrim($_SERVER['REQUEST_URI'],'/');
    $params = explode('/',$uri);//简单粗暴的将URL分割，例如index/action
    $controller = $params[0];//第一个变量是控制器名
    $action = $params[1];//第二个是方法名
}else {
    $controller = $_GET['c'];//第二种域名访问方式 "pwstrick.com?c=index&a=action"
    $action = $_GET['a'];
}

//初始化逻辑
require_once './view.php';//试图控制类
require_once APP_PATH . '/controller/'.$controller.'.php';//需要访问的控制器，例如index控制器
$handler = new $controller;//初始化这个控制器，例如index
$handler->$action();//执行方法，也就是最终访问的那个地方