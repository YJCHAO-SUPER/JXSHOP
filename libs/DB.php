<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 15:08
 */
namespace libs;

use PDO;

class DB
{
//私有化一个静态属性
    private static $instance = null;

//    私有化克隆方法
    private function __clone(){}

//    私有化pdo属性
    private $pdo;

//    私有化构造方法
    private function __construct()
    {
//        连接数据库
        $this->pdo = new PDO("mysql:host=localhost;dbname=jxshop","root","123456");
        $this->pdo->exec("set names utf8");
    }

//new DB类 执行构造方法
    public static function make(){
//        判断 如果静态属性是空的就new  这样连接数据库就只用new一次
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

//    预处理执行sql
    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

//    非预处理执行sql
    public function exec($sql) {
        $this->pdo->exec($sql);
    }



}