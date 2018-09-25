<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 16:53
 */
namespace controllers;

class BlogsController{

//    显示商品列表页
    function index(){
        view('blogs/index',[]);
    }

//      显示添加的页面
    function create(){
        view('blogs/create',[]);
    }

//      处理添加表单
    function insert(){

    }

//      显示修改的页面
    function edit(){
        view('blogs/edit',[]);
    }

//      处理修改表单
    function update(){

    }

//    处理删除表单
    function delete(){

    }


}