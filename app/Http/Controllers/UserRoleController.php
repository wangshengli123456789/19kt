<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 18:17
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\Role;
use App\Http\Models\UserRole;

class UserRoleController extends Controller
{
    /**
     * 用模型查询所有的角色
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userRoleInfo($id)
    {
            //用模型查询所有的角色
            $res = Role::read();
            //查询该用户拥有那些角色
            $role = UserRole::roleAll($id);
            return view('rbac/userrole',['res'=>$res,'role'=>$role,'id'=>$id]);

    }

    /**
     * 用户角色表的添加
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userRoleInsert()
    {
        $data = request()->all();
        for ($i=0;$i<count($data['rid']);$i++){
            $array[]['rid']=$data['rid'][$i];
            $array[$i]['uid']=$data['id'];
        }
        //新生成的角色
        $res = UserRole::insAll($data['id'],$array);
        if ($res){
            return redirect('user');
        }
    }

    /**
     * 查询该用户的角色
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rolesindex($id)
    {
        //查询该用户的角色
        $info = UserRole::roleindex($id);
        return view('rbac/rolesindex',['list'=>$info]);
    }
}