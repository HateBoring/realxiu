<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Article_content;
use App\Http\Model\Cate;
use App\Http\Model\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class ArticleController extends CommonController
{
    //全部文章列表
    public function index()
    {
        $status=isset($_GET['status'])?$_GET['status']:-1;
        $search=isset($_GET['search'])?$_GET['search']:'';

        if($status==-1){
            $data=Article::where('status','!=',$status)
                ->orderBy('art_id','desc')
                ->paginate(20);
        }
        if($status!=-1){
            $data=Article::where('status','=',$status)
                ->orderBy('art_id','desc')
                ->paginate(20);
        }
        if(!empty($search)){
            $data=Article::where('title','like','%'.$search.'%')->paginate(20);
        }
        //追加额外搜索条件
        $appendData = $data->appends(array(
            'status' => $status,
            'search' => $search,
        ));

        return view('Admin/Article/index')->with('data',$data);

    }
    //删除单个分类/*需要把方法位序调高，要不然找不到该方法，就算你特么问我为啥。。我也不知道啊。。*/
    public function destroy($art_id)
    {
        //此操作不删除数据，只更改数据状态
        $status['status']=-1;
        $res=Article::where('art_id',$art_id)->update($status);
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'数据删除成功,稍后自动刷新页面',
            ];
        }else{
            $data=[
                'stauts'=>1,
                'msg'=>'数据删除失败,请稍后重试',
            ];
        }
        return $data;

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
                'msg'=>'文章排序更新成功！',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'文章排序更新失败！请稍后重试',
            ];
        }
        return $data;
    }
    //添加文章
    public function create()
    {
        $cates=(new Cate)->tree();//获取数据
        return view('Admin/Article/add')->with('cates',$cates);
    }
    //获取提交的数据
    //post.admin\article
    public function store()
    {
        $input=Input::except('_token');//排除_token字段
        $input['create_time']=time();
        $title=$input['title'];
        $isres=Article::where('title',$title)->first();
        if($isres!=null){
            return back()->with('message','该文章已经存在');
        }
        $rules=[
            'title'=>'required',
            'small_title'=>'required',
            'content'=>'required',
        ];
        $message=[
            'title.required'=>'标题不能为空',
            'small_title.required'=>'短标题不能为空',
            'content.required'=>'内容不能为空',
        ];
        $val=Validator::make($input,$rules,$message);
        if($val->passes()){
            $re=Article::create($input);
            if($re){
                $arr['content']=$input['content'];
                $arr['art_id']=$re['art_id'];
                $conres=Article_content::create($arr);
                if($conres){
                    return redirect('Admin/article');
                }
            }
        }else{
            return back()->withErrors($val);
        }

    }
    //文章预览
    public function show($art_id)
    {
        $data=Article::find($art_id);
        $type='Admin';
        $data['content']=Article_content::find($art_id)->value('content');
        $cateid=$data['cateid'];
        //相关阅读根据文章cateid查询文章
        $list=Article::where('cateid',$cateid)
            ->orderBy('art_id','desc')
            ->take(10)
            ->pluck('art_id','title');
        //推荐文章like
        $recommend=Article::orderBy('like','desc')
            ->take(7)
            ->pluck('art_id','title');
        //最新文章art_id desc
        $newArt=Article::orderBy('art_id','desc')
            ->take(7)
            ->pluck('art_id','title');
        //阅读排行count
        $countArt=Article::orderBy('count','desc')
            ->take(7)
            ->pluck('art_id','title');
        return view('Home/Article/index')->with([
            'data'=>$data,//文章内容
            'list'=>$list,//相关阅读
            'recommend'=>$recommend,//推荐文章
            'newArt'=>$newArt,//最新文章
            'countArt'=>$countArt,//阅读排行
            'type'=>$type
        ]);
    }

    //更新文章
    public function update($art_id)
    {
        $data=Article::find($art_id);
        $input=Input::except('_token','_method','content');
        $input=Input::except('_token','_method','content');//排除_token字段
        $content['content']=Input::get('content');
        //提交更改的数据与数据库数据一样的话，返回0，不同的话返回1
        $res=Article::where('art_id',$art_id)->update($input);
        $conres= Article_content::where('art_id',$art_id)->update($content);//update传入类型必须是数组
        if($res==1&&$conres==1){
            return back()->with('message','文章更新成功');
        }elseif($res==0&&$conres==0){
            return back()->with('message','文章未更改');
        }
        return back()->with('prompt','文章更新成功');
        /*if($res==1){

           if($conres==1){
               echo "文章更新成功";
           }
        }else{
            return back()->with('message','数据更新失败，请稍后重试');
        }*/
    }
    //编辑文章
    public function edit($art_id)
    {
        $field=Article::find($art_id);
        $content=Article_content::find($art_id);
        $field['content']=$content['content'];
        $cates=(new Cate)->tree();//获取数据
        return view('Admin/Article/edit',compact('field','cates'));
    }
}