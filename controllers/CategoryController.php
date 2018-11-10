<?php\r\nnamespace controllers;

use models\;

class CategoryController{
    // 列表页
    public function index()
    {
        $model = new ;
        $data = $model->findAll();
        view('category/index', $data);
    }

    // 显示添加的表单
    public function create()
    {
        view('category/create');
    }

    // 处理添加表单
    public function insert()
    {
        $model = new ;
        $model->fill($_POST);
        $model->insert();
        redirect('/category/index');
    }

    // 显示修改的表单
    public function edit()
    {
        $model = new ;
        $data=$model->findOne($_GET['id']);
        view('category/edit', [
        'data' => $data,
        ]);
    }

    // 修改表单的方法
    public function update()
    {
        $model = new ;
        $model->fill($_POST);
        $model->update($_GET['id']);
        redirect('/category/index');
    }

    // 删除
    public function delete()
    {
        $model = new ;
        $model->delete($_GET['id']);
        redirect('/category/index');
    }
}