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
        $this->pdo = new PDO("mysql:host:127.0.0.1;dbname=jxshop","root","");
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
//    提供一个公共的方法 ，外界调用，执行sql语句  查一条语句
    public function getRow($sql,$data=[]) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }

//    提供一个公共的方法 查多条消息
    public function getAll($sql,$data=[]){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//    提供公共的查询方法 ，执行删除修改添加等sql语句
    public function exec($sql) {
        $this->pdo->exec($sql);
    }


}