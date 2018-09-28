<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 15:58
 */
namespace models;

use libs\DB;
use PDO;

class Model
{
//     调用DB类 让所有的model继承
    protected $pdo;
    public function __construct()
    {
        $this->pdo = DB::make();
    }

//      操作的表名 值由子类设置
    protected $table;
//    表单的数据，值由控制器设置
    protected $data;

//    钩子函数
    protected function _before_write(){}
    protected function _after_write(){}
    protected function _before_delete(){}
    protected function _after_delete(){}

//    添加
    public function insert(){

        $this->_before_write();

//        echo 123;
//    var_dump($this->data);

//        设置空的数组
        $keys = [];
        $values = [];
        $token = [];
//        循环把值追加到数组里
        foreach ($this->data as $k => $v){
            $keys[] = $k;
            $values[] = $v;
            $token[] = '?';
        }
//        把数组转成字符串
        $keys = implode(',',$keys);
        $token = implode(',',$token);

//        插入数据库sql语句
        $sql = "insert into {$this->table}($keys) VALUES ($token)";
//        var_dump($sql);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);

        $this->_after_write();
    }

//    接收表单中的数据
    public function fill($data){
//      判断是否在白名单中
        foreach ($data as $k => $v){
            if(!in_array($k,$this->fillable)){
                unset($data[$k]);
            }
        }
        $this->data = $data;

    }

//    修改
    public function update($id){

        $this->_before_write();

        $set = [];
        $token = [];
        foreach ($this->data as $k => $v){

            $set[] = "$k = '?'";
            $values[] = $v;
            $token[] = '?';

        }
        $set = implode(',',$set);
        $values[] = $id;

//        更新数据库sql语句
        $sql = "update {$this->table} set $set WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);

        $this->_after_write();

    }

//    删除
    public function delete($id)
    {
        $this->_before_delete();
//        删除sql语句
        $stmt = $this->pdo->prepare("delete from {$this->table} WHERE id=?");
        $stmt->execute([$id]);
        $this->_after_delete();
    }

//    获取所有数据
    public function findAll($option=[]){

//        默认的参数
        $_option = [
            'fields'=>'*',
            'where'=>1,
            'order_id'=>'id',
            'order_way'=>'desc',
            'per_page'=>15
        ];

//        合并用户参数和默认参数
        if($option){
            $_option = array_merge($_option,$option);
        }

//        翻页
//        获取地址栏传来的当前页
        $page = isset($_GET['page']) ? max(1,(int)$_GET['page']) : 1;
//        当前页*每页的个数-每页的个数=当前页从第几个开始
        $offset = $page*$_option['per_page']-$_option['per_page'];

        $sql = "select {$_option['fields']} from {$this->table} WHERE {$_option['where']} ORDER BY {$_option['order_id']} {$_option['order_way']} limit $offset,{$_option['per_page']}";
        echo $sql;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

//        获取总的记录数
        $stmt = $this->pdo->prepare("select count(*) from {$this->table} WHERE {$_option['where']}");
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_COLUMN);
//        总页数=总的记录数/每页的个数 上取整
        $pageCount = ceil($count/$_option['where']);

//        设置一个空字符串
        $page_str = '';
//        判断  如果总页数>1
         if($pageCount>1){
//             循环每页，有几页加几个标签
             for ($i=1;$i<$pageCount;$i++){
                 $page_str .= '<a href="?page='.$i.'">'.$i.'</a>';
             }
         }

         return [
           'data' => $data,
           'page' => $page_str
         ];

    }

//    获取一条数据
    public function findOne($id){

        $stmt = $this->pdo->prepare("select * from {$this->table} WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_COLUMN);

    }

}