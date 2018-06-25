<?php
namespace App\Http\Model;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=['id'];//排除不能填充的字段

    public function tree()
    {
        $cates = $this->orderBy('order','desc')->get();//获取数据
        return $this->getTree($cates, 'title', 'id', 'pid', 0);
    }


//二级分类
    public function getTree($data, $title, $id = 'id', $pid = 'pid', $int = 0)
    {
        $arr = array();

        foreach ($data as $k => $v) {
            if ($v->$pid == $int) {
                $data[$k]['_' . $title] = $data[$k][$title];
                $arr[] = $data[$k];
                foreach ($data as $m => $n) {
                    if ($v->$id == $n->$pid) {
                        $data[$m]['_' . $title] = '—— ' . $data[$m][$title];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;

    }
}