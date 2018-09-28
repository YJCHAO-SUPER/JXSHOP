
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2018/9/25
 * Time: 17:00
 */
namespace models;

class <?=$mname?> extends Model
{

    //设置这个模型对应的表
    protected $table = '<?=$tableName?>';
    //设置允许接收的字段
    protected $fillable = ['<?=$fillable?>'];

}