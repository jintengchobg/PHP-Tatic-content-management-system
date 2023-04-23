<?php
header("Content-type: text/html; charset=utf-8"); #页面输出编码utf-8
#error_reporting(0);#不显示错误提示
session_start(); #开启Session功能
define('Y', $_SERVER['SERVER_NAME']); //设置主机域名常量为Y
define('F', $_SERVER['REQUEST_URI']); //获得当前文件名常量为F[REQUEST_URI]
define('S', dirname($_SERVER['SCRIPT_NAME']) . '/'); //设置模板路径为S
define('L', dirname(__FILE__) . '/'); //设置主机绝对路径为L
include(L.'c/c.php');

$p=$_POST;
$g=$_GET;
$l=S;
foreach (file(L.'a/set.txt') as $key => $value) {
$s=trim($value);
    $$s=$s;
}
is_dir(L.Y)?'':$c->ml_创建目录(L.Y);
$a=empty($_GET['a'])?Y:$_GET['a'];
$导航='<ul class="nav justify-content-center">';
$导航.=empty($_GET['a'])?'':'<li class="nav-item"><a href="/">返回首页</a>_</li>';
foreach (glob(L.Y.'/*') as $key => $value) {
$导航.='<li class="nav-item"><a href="?a='.$value.'">'.$c->wjm($value).'</a>_</li>';
}
$导航.='</ul>';
$c->cz(L.'a/'.Y.'.json')?extract(json_decode($c->dk(L.'a/'.Y.'.json'),true)):(include(L.'a/set.php'));
include(L.'a/'.$c->kzm($a).'.php');

include($c->cz(L.'m/'.$a.'.php')?'m/'.$a.'.php':'m/index.php');
