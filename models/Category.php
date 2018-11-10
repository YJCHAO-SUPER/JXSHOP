<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 17:00
 */
namespace models;

class Category extends Model
{

    //设置这个模型对应的表
    protected $table = 'category';
    //设置允许接收的字段
    protected $fillable = ['cat_name','parent_id','path'];

}