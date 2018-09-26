<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 17:06
 */
namespace controllers;

class CodeController
{
//    生成代码
    function make(){

//        接收参数 (生成代码的表名)
        $tableName = $_GET['name'];


//        生成控制器 拼出控制器名字
        $cname = ucfirst($tableName)."Controller";
//        加载模板
//        打开缓冲区
        ob_start();
//        把模板加到缓冲区中
        include ROOT."\\templates\\controller.php";
//        ob_get_clean()得到当前缓冲区的内容并且删除当前缓冲内容
        $str = ob_get_clean();
//        file_put_contents()将一个字符串写入文件
        file_put_contents(ROOT."\\controllers\\".$cname.".php","<?php".$str);


//        生成模型 拼出模型名字
        $mname = ucfirst($tableName);
//        加载模板
        ob_start();
        include ROOT."\\templates\\model.php";
        $str = ob_get_clean();
        file_put_contents(ROOT."\\models\\".$mname.".php","<?php".$str);


//        生成视图文件
        $vname = ucfirst($tableName);
        @mkdir(ROOT."\\views\\".$vname,0777);

//        取出这个表中所有的字段信息
        $sql = "SHOW FULL FIELDS FROM $tableName";
        $db = \libs\DB::make();
//        预处理
        $stmt = $db->prepare($sql);
//        执行sql
        $stmt->execute();
//        取出数据
        $fields = $stmt->fetchAll(\PDO::FETCH_ASSOC);

//        var_dump($fields);


//        加载模板
//        index.html
        ob_start();
        include ROOT."\\templates\\index.html";
        $str = ob_get_clean();
        file_put_contents(ROOT."\\views\\".$vname."/index.html",$str);


//        create.html
        ob_start();
        include ROOT."\\templates\\create.html";
        $str = ob_get_clean();
        file_put_contents(ROOT."\\views\\".$vname."/create.html",$str);


//        edit.html
        ob_start();
        include ROOT."\\templates\\edit.html";
        $str = ob_get_clean();
        file_put_contents(ROOT."\\views\\".$vname."/edit.html",$str);


    }
}