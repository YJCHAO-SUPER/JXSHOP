
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

    }

//      显示修改的页面
    function edit(){
        view('<?=$tableName?>/edit',[]);
    }

//      处理修改表单
    function update(){

    }

//    处理删除表单
    function delete(){

    }


}