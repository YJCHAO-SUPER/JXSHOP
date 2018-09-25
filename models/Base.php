<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 15:58
 */
namespace models;
use libs\DB;

class Base
{

//     调用DB类 让所有的model继承
    protected $pdo;
    public function __construct()
    {
        $this->pdo = DB::make();
    }

}