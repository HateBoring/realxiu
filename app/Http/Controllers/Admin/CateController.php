<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class CateController extends CommonController
{
    //全部分类列表
    public function index()
    {

        $cates=(new Cate)->tree();//获取数据
        /*$list=$this->getTree($cates,'title','id','pid',0);*/
        return view('Admin/Cate/index')->with('data',$cates);
        /*return view('Admin/Cate/index');*/

    }
    //接收排序
    public function changeorder(){
        $input=Input::all();
        $id=$input['id'];
        $order=$input['order'];
        $cate=Cate::find($id);//查找数据
        $cate->order=$order;//根据字段更改值
        $res=$cate->update();//执行更新操作并返回
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'分类排序更新成功！稍后自动刷新页面',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'分类排序更新失败！请稍后重试',
            ];
        }
        return $data;
    }
    //删除单个分类/*需要把方法位序调高，要不然找不到该方法，就算你特么问我为啥。。我也不知道啊。。*/
    public function destroy($id)
    {
        $res=Cate::where('id',$id)->delete();
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'数据删除成功，稍后自动刷新页面',
            ];
        }else{
            $data=[
                'stauts'=>1,
                'msg'=>'数据删除失败,请稍后重试',
            ];
        }
        return $data;
    }
    //添加分类
    public function create()
    {
        //获取分类
        $data=Cate::where('pid',0)->get();
        return view('Admin/Cate/add')->with('data',$data);
    }
    //获取提交的数据
    //post.admin\cate
    public function store()
    {
        $input=Input::except('_token');//排除_token字段
        //判断字段在数据库中是否存在
        $title=$input['title'];
        $isres=Cate::where('title',$title)->first();
        if($isres!=null){
            return back()->with('message','该栏目已经存在');
        }
        $rules=[
            'title'=>'required',
        ];
        $message=[
            'title.required'=>'标题不能为空',
        ];
        $val=Validator::make($input,$rules,$message);
        if($val->passes()){
            $res=Cate::create($input);
            if($res){
                return redirect('Admin/cate');
            }else{
                return back()->with('message','数据填充失败');
            }
        }else{
            return back()->withErrors($val);
        }
    }
    //显示单个分类信息
    public function show()
    {

    }

    //更新分类
    public function update($id)
    {
        $input=Input::except('_token','_method');//排除_token字段
        $res=Cate::where('id',$id)->update($input);
        if($res){
            return redirect('Admin/cate');
        }else{
            return back()->with('message','数据更新失败，请稍后重试');
        }
    }
    //编辑分类
    public function edit($id)
    {
        $field=Cate::find($id);
        $data=Cate::where('pid',0)->get();
        return view('Admin/Cate/edit',compact('field','data'));
    }
}