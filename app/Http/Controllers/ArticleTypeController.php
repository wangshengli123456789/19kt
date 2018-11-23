<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/30
 * Time: 19:02
 */

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Http\Models\ArticleType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ArticleTypeController extends Controller
{
    /**
     * 分类数据的显示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //查询分类的所有数据
        $info = ArticleType::articleRead();
        return view('article/article_category',['list'=>$info]);
    }

    /**
     * 分类的添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function articleTypeAdd()
    {
        if (request()->isMethod('post')){
            $info = request()->all();
            //调用模型实现文章分类添加
            $res = ArticleType::addArticleType($info);
            if ($res){
                return redirect('article_category');
            }
        }else{
            return view('article/add_article_category');
        }
    }
    /**
     * 文章的添加
     */
    public function articleAdd()
    {
        if (request()->isMethod('post'))
        {
            $info = request()->all();
            //调用模型实现文章内容添加
            $res = ArticleType::addArticle($info);
            if ($res){
                date_default_timezone_set('PRC');
                return redirect('article');
            }
        }else{
            //查询文章分类表中的所有分类
            $type = ArticleType::articleRead();
            return view('article/addarticle',['type'=>$type]);
        }
    }
    /**
     * 文章内容的显示
     */
    public function articleIndex()
    {
        //查询文章的内容并显示
        $info = ArticleType::readArticle();
        //查询所有的分类
        $data = ArticleType::articleRead();
        if ($info){
            $array['list']=$info;
            $array['status']=100;
            $array['msg']='接口请求成功';
        }else{
            $array['status']=101;
            $array['msg']='接口请求失败';
        }
//        $datas = json_encode($array);
//        print_r($datas);
        return view('article/article',['list'=>$info,'type'=>$data]);
    }

    /**
     * 文章分类的删除
     */
    public function articleTypeDel($id)
    {
        $res = ArticleType::ArticleTypeDel($id);
        if ($res){
            return redirect('article');
        }
    }
    /**
     * 文章的删除
     */
    public function articleDel($id)
    {
        $res = ArticleType::ArticleDel($id);
        if ($res){
            return redirect('article');
        }
    }

    public function searchs()
    {
        $info = request()->all();
        $id = $info['id'];

        //根据id查询分类信息
        $res = DB::table('article_list')->where('article_type',$id)->get();
        return view('article/mb');
    }
       //修改文章分类页面
    public function articleedit($id)
    {
        if (request()->isMethod('post')){
            $info = request()->only('type_name','byname','keywords','description','sort');
            //调用模型实现文章分类修改
            $res = ArticleType::editArticleType($id,$info);
            if ($res){
                return redirect('article_category');
            }
        }else{
            $info = ArticleType::articleselect($id);
            return view('article/edit_article_category',['data'=>$info]);
        }
    }
    //修改文章内容
    public function articletypeedit($id)
    {
        if (request()->isMethod('post'))
        {
            $info = request()->only('article_name','article_type','article_bywrite','article_from','keyword','description','create_time');
            //调用模型实现文章内容添加
            $res = ArticleType::editArticle($id,$info);
            if ($res){
                date_default_timezone_set('PRC');
                return redirect('article');
            }
        }else{
            //查询文章分类表中的所有分类
            $type = ArticleType::articleRead();
            $data = ArticleType::articleedit($id);
            return view('article/editarticle',['type'=>$type,'data'=>$data]);
        }
    }
}