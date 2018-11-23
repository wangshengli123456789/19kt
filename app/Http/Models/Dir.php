<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/15
 * Time: 18:21
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Dir
{
    /**
     * 显示目录
     * @return mixed
     */
    public static function dirRead()
    {
        $res = DB::table('unit_type')->get();
        return $res;
    }

    /**
     * 查询所拥有的目录以及视频信息
     * @return mixed
     */
    public static function videoRead()
    {
        $res = DB::table('dir_class')
            ->join('product_class','dir_class.class_id','=','product_class.cid')
            ->join('unit_type','dir_class.dir_id','=','unit_type.id')
            ->select('dir_class.id','dir_class.video_name','dir_class.video_url','dir_class.create_time','product_class.classname','unit_type.unit')
            ->get();
        return $res;
    }

    public static function videoDel($id)
    {
        $res = DB::table('dir_class')->where('id',$id)->delete();
        return $res;
    }
}