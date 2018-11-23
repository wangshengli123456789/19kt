<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/30
 * Time: 10:20
 */

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleRule extends Model
{
    /**
     * 查询权限表中的所有的权限
     * @return mixed
     */
    public static function set_rule_read()
    {
        $res = DB::table('jy_privileges')->get();
        return $res;
    }

    /**
     * 查询该角色所拥有的所有权限
     * @param $id
     * @return mixed
     */
    public static function read_rule_role($id)
    {
        $res = DB::table('jy_roleprivileges')->where('rid',$id)->pluck('pid');
        return $res;
    }

    /**
     * 实现用户对应的权限（用户权限表）的新增
     * @param $array
     * @return mixed
     */
    public static function ruleadd($id,$array)
    {
        DB::table('jy_roleprivileges')->where('rid',$id)->delete();
        $res = DB::table('jy_roleprivileges')->insert($array);
        return $res;
    }

    public static function readrule($id)
    {
        //$res = DB::select("SELECT type_name FROM jy_roleprivileges JOIN jy_privileges ON jy_roleprivileges.pid = jy_privileges.id WHERE jy_roleprivileges.rid = $id");
        $res = DB::table('jy_roleprivileges')
            ->join('jy_roles','jy_roleprivileges.rid','=','jy_roles.rid')
            ->join('jy_privileges','jy_roleprivileges.pid','=','jy_privileges.id')
            ->where('jy_roleprivileges.rid',$id)
            ->get();
        return $res;
    }
}