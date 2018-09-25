<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 10:04
 */

//   加载view文件
    function view($viewName,$data=[]){
        extract($data);
//        var_dump($viewName);
        include ROOT."\\views\\".$viewName.".html";

    }
