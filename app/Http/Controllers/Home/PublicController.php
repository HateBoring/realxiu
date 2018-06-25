<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\Article;
use App\Http\Model\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends CommonController {
    public function __construct(Request $request){
        $cate1=Cate::where('pid',0)->get();
        $cate2=Cate::where('pid','!=',0)->get();
        $request->session()->put([
            'cate1'=>$cate1,
            'cate2'=>$cate2,
        ]);//把数据存储到session
        $request->session()->save();
    }
    public function index(){
        $data = Article::join('art_content', 'article.art_id', '=', 'art_content.art_id')
            ->where('status','!=','1')
            ->orderBy('create_time','desc')
            ->paginate(10);
        /*$data=Article::where('status','!=','-1')
            ->orderBy('art_id','desc')
            ->paginate(10);*/
        return view('Home/index')->with([
            'data'=>$data,
        ]);
    }
}