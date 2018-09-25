<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 9:38
 */
//定义根目录
define('ROOT',dirname(__DIR__));

//var_dump($_SERVER);

//引入视图文件
include ROOT.'\\libs\\functions.php';

//获取地址栏参数
$info = $_SERVER['PATH_INFO'];
//var_dump($info);

//把参数切割成数组
$getInfo = explode('/',$info);
//var_dump($getInfo);

//自动加载
function autoload($className){
//    var_dump($className);

    include ROOT."\\".$className.".php";
}
spl_autoload_register('autoload');

//解析路由
$controllerName =  $getInfo[1] ? ucfirst($getInfo[1]) : 'Index';
$actionName = isset($getInfo[2]) ? $getInfo[2] : 'index';
//var_dump($controllerName);

//完整的控制名
$fullController = "\\controllers\\".$controllerName."Controller";
//var_dump($fullController);

$index = new $fullController;
$index->$actionName();