<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 17:46
 */

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public static function adduser($array)
    {
        $info = DB::table('jy_user')->insert($array);
        if ($info){
            $data['status']='100';
            $data['msg']='用户添加成功';
        }else{
            $data['status']='101';
            $data['msg']='用户添加失败';
        }
        return $data;
    }
    public static function read()
    {
        $info = DB::table('jy_user')->get();
        return $info;
    }

    public static function deletes($id)
    {
        $res = DB::table('jy_user')->where('id',$id)->delete();
        return $res;
    }
}