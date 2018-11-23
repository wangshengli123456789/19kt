<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/30
 * Time: 19:23
 */

namespace App\Http\Models;
use  Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleType
{
    /**
     * 文章分类的添加
     */
    public static function addArticleType($array)
    {
        $res = DB::table('article_type')->insert($array);
        return $res;
    }
    /**
     * 文章内容的添加
     */
    public static function addArticle($array)
    {
        $res = DB::table('article_list')->insert($array);
        return $res;
    }
    /**
     * 文章分类信息的查询
     */
    public static function articleRead()
    {
        $res = DB::table('article_type')->get();
        return $res;
    }
	public static function Articlesls()
    {
        $res = DB::table('article_list')
            ->join('article_type','article_list.article_type','=','article_type.tid')
            ->select('article_list.aid','article_list.article_name','article_type.type_name')->get();
        return $res;
    }
    /**
     * 文章分类信息的查询
     */
    public static function readArticle()
    {
        $res = DB::table('article_list')
            ->join('article_type','article_list.article_type','=','article_type.tid')
            ->paginate(2);
        return $res;
    }

    public static function ArticleDel($id)
    {
        $res = DB::table('article_list')->where('aid',$id)->delete();
        return $res;
    }

    public static function ArticleTypeDel($id)
    {
        $res = DB::table('article_type')->where('tid',$id)->delete();
        return $res;
    }
	    public static function articleselect($id)
    {
        $res = DB::table('article_type')->where('tid',$id)->first();
        return $res;
    }

    public static function editArticleType($id,$data)
    {
        $res = DB::table('article_type')->where('tid',$id)->update($data);
        return $res;
    }

    public static function articleedit($id)
    {
        $res = DB::table('article_list')->where('aid',$id)->first();
        return $res;
    }

    public static function editArticle($id,$data)
    {
        $res = DB::table('article_list')->where('aid',$id)->update($data);
        return $res;
    }
}