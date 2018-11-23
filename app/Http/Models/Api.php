<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/14
 * Time: 19:19
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Api
{
    /**
     * 文章分类
     * @return mixed
     */
    public static function articletypes()
    {
        $res = DB::table('article_type')->select('tid','type_name')->get();
        if ($res){
            $array['list']=$res;
            $array['status']=100;
            $array['msg']='数据请求成功';
        }else{
            $array['status']=101;
            $array['msg']='数据请求失败';
        }
        return $array;
    }

    /**
     * 根据id查询文章分类的信息
     * @param $id
     * @return mixed
     */
    public static function typesArticle($id)
    {
        $res = DB::table('article_list')->where('article_type',$id)->select('aid','article_name','article_from','create_time')->get();
        if ($res){
            $array['list']=$res;
            $array['status']=100;
            $array['msg']='数据请求成功';
        }else{
            $array['status']=101;
            $array['msg']='数据请求失败';
        }
        return $array;
    }

    public static function listArticleRead($id)
    {
        $res = DB::table('article_list')->where('aid',$id)->select('aid','article_name','article_from','create_time','article_bywrite')->get();
        if ($res){
            $array['list']=$res;
            $array['status']=100;
            $array['msg']='数据请求成功';
        }else{
            $array['status']=101;
            $array['msg']='数据请求失败';
        }
        return $array;
    }
}