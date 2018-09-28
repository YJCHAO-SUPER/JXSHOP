
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 16:53
 */
namespace controllers;

use models\<?=$mname?>

class <?=$cname?>
{

//    显示商品列表页
    function index(){

        $model = new <?=$mname?>;
        $data = $model->findAll();
        view('<?=$tableName?>/index',$data);
    }

//      显示添加的页面
    function create(){
        view('<?=$tableName?>/create',[]);
    }

//      处理添加表单
    function insert(){
        $model = new <?=$mname?>;
        $model = $model->fill($_POST);
        $model->insert();
        redirect('<?=$tableName?>/index');
    }

//      显示修改的页面
    function edit(){
        $model = new <?=$mname?>
        $data = $model->findOne($_GET['id']);
        view('<?=$tableName?>/edit',[
            'data'=>$data
        ]);
    }

//      处理修改表单
    function update(){
        $model = new <?=$mname?>;
        $model = $model->fill($_POST);
        $model->insert($_GET['id']);
        redirect('<?=$tableName?>/index');
    }

//    处理删除表单
    function delete(){
        $model = new <?=$mname?>
        $model->delete($_GET['id']);
        redirect('<?=$tableName?>/index');
    }


}