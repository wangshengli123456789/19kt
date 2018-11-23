<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/10
 * Time: 13:15
 */

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
class Address
{
    /**
     * @return array
     */
    public static function protype()
    {
        $data = DB::table('address')->get();
        $res = self::getTree($data);
        return $res;
    }

    /**
     * 无限极分类
     * @param $data
     * @param int $pid
     * @param int $level
     * @return array
     */
    private static function getTree($data,$pid=0,$level=0)
    {
        //定义一个静态的数组
        static $array = array();
        foreach ($data as $k => $v){
            if ($v->parent_id == $pid){
                $v->level = $level;
                $array[]=$v;
                self::getTree($data,$v->id,$level+1);
            }
        }
        return $array;
    }
    /**
     * 添加地区
     */
    public static function addressAdd($data)
    {
        $res = DB::table('address')->insert($data);
        return $res;
    }

    /**
     * 删除地区的方法
     * @param $id
     */
    public static function addressDel($id)
    {
        $res = DB::table('address')->where('id',$id)->delete();
        return $res;
    }
    /**
     * 修改地区的方法
     */
    public static function addressSave($id,$data)
    {
        $res = DB::table('address')->where('id',$id)->update($data);
        return $res;
    }
    /**
     * 查询id对应的地区信息
     */
    public static function typeId($id)
    {
        $res = DB::table('address')->where('id',$id)->first();
        return $res;
    }
}