<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 17:00
 */
namespace models;

class Blog extends Model
{

//    设置这个模型对应的表
    protected $table = 'blog';
//    设置允许接收的字段
    protected $fillable = ['title','content','is_show'];


}