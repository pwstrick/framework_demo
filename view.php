<?php

class view {
    protected $templatePath;
    protected $attributes;
    public function __construct($templatePath = "", $attributes = [])
    {
        $chr = substr($templatePath,-1);
        if ($chr !== '/') {
            $templatePath .= '/';
        }
        $this->templatePath = $templatePath;
        $this->attributes = $attributes;
    }
    public function render($template, array $data = [])
    {
        $output = $this->fetch($template, $data);
        return htmlspecialchars($output);
    }

    public function fetch($template, array $data = []) {
        $data = array_merge($this->attributes, $data);
        ob_start();
        extract($data);//设置view上面的参数
        include $this->templatePath . $template;//引入试图文件的绝对路径
        $output = ob_get_clean();//输出页面
        return $output;
    }
}