<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/10/31
 * Time: 19:45
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class File
{
    /**
     * 添加幻灯片
     * @param $array
     * @return bool
     */
    public static function uploads($array)
    {
        $res = DB::table('show_picture')->insert($array);
        return $res;
    }

    /**
     * 查询所有的图片信息
     * @return array|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public static function imgshows()
    {
        $res = DB::table('show_picture')->orderBy('pid','asc')->paginate(2);
        return $res;
    }
	public static function imgshowsss()
    {
        $res = DB::table('show_picture')->orderBy('pid','asc')->get();
        return $res;
    }
    /**
     * 图片的删除
     * @param $id
     * @return int
     */
    public static function imgdels($id)
    {
        $res = DB::table('nav_picture')->where('id',$id)->delete();
        return $res;
    }
	public static function imgdelss($id)
    {
        $res = DB::table('show_picture')->where('pid',$id)->delete();
        return $res;
    }

    /**
     * @return array|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public static function imgshowss()
    {
        $res = DB::table('nav_picture')->orderBy('id','asc')->get();
        return $res;
    }

    public static function navuploads($array)
    {
        $res = DB::table('nav_picture')->insert($array);
        return $res;
    }
	
	    //查询导航页面
    public static function navedit($id)
    {
        $res = DB::table('nav_picture')->where('id',$id)->first();
        return $res;
    }

    //修改导航页面
    public static function navedits($id,$data)
    {
        $res = DB::table('nav_picture')->where('id',$id)->update($data);
        return $res;
    }
    //查询所有的幻灯片
    public static function imgedit($id)
    {
        $res = DB::table('show_picture')->where('pid',$id)->first();
        return $res;
    }
    public static function imgedits($id,$data)
    {
        $res = DB::table('show_picture')->where('pid',$id)->update($data);
        return $res;
    }
}