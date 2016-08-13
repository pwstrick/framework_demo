<?php

//一般都会继承一个通用的controller父类
class index {
    function action() {
        $view = new view(APP_PATH . '/view/');//初始化视图控制类
        $output = $view->fetch( 'index.php',array('send' => '发送'));//指定要输出的视图名，并设置变量
        echo $output;
    }
}