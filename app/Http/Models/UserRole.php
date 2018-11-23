<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 19:18
 */

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRole extends Model
{
    /**
     * 删除原来的角色，并添加新的角色
     * @param $array
     * @return mixed
     */
    public static function insAll($id,$array)
    {
        DB::table('jy_userrole')->where('uid',$id)->delete();
        $res = DB::table('jy_userrole')->insert($array);
        return $res;
    }

    /**
     * 查询原有的角色
     * @param $id
     * @return mixed
     */
    public static function roleAll($id)
    {
        $info = DB::table('jy_userrole')->where('uid',$id)->pluck('rid');
        return $info;
    }

    /**
     * 查询用户对应的角色
     * @param $id
     * @return mixed
     */
    public static function roleindex($id)
    {
        $info = DB::table('jy_userrole')
            ->join('jy_roles','jy_userrole.rid','=','jy_roles.rid')
            ->join('jy_user','jy_userrole.uid','=','jy_user.id')
            ->where('jy_userrole.uid',$id)
            ->get();
        return $info;
    }
}