<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 16:00
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    /**
     * 角色的添加
     * @param $array
     * @return mixed
     */
    public static function addrole($array)
    {
        $info = DB::table('jy_roles')->insert($array);
        if ($info){
            $data['status']='100';
            $data['msg']='角色添加成功';
        }else{
            $data['status']='101';
            $data['msg']='角色添加失败';
        }
        return $data;
    }

    /**
     * 读取所有的角色
     * @return mixed
     */
    public static function read()
    {
        $info = DB::table('jy_roles')->get();
        return $info;
    }

    /**
     * 根据id删除角色
     * @param $id
     * @return mixed
     */
    public static function deletes($id)
    {
        $res = DB::table('jy_roles')->where('rid',$id)->delete();
        return $res;
    }
}