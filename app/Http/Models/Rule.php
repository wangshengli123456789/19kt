<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 17:23
 */

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Rule extends Model
{
    public static function addrule($array)
    {
        $info = DB::table('jy_privileges')->insert($array);
        if ($info){
            $data['status']='100';
            $data['msg']='权限添加成功';
        }else{
            $data['status']='101';
            $data['msg']='权限添加失败';
        }
        return $data;
    }
    public static function read()
    {
        $info = DB::table('jy_privileges')->get();
        return $info;
    }

    public static function deletes($id)
    {
        $res = DB::table('jy_privileges')->where('id',$id)->delete();
        return $res;
    }
}