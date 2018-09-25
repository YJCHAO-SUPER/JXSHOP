<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 9:00
 */
namespace controllers;

class IndexController
{
//    显示首页
    function index(){

        view('Index/index',[]);
    }

//    显示头部
    function top(){

        view('Index/top',[]);
    }

//    显示左侧边栏
    function menu(){

        view('Index/menu',[]);
    }

//    显示右侧边栏
    function main(){

        view('Index/main',[]);
    }

}