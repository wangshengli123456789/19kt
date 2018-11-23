<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 15:55
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\Role;
class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function roleadd()
    {
        if (request()->isMethod('post')){
            $data = request()->all();
            for ($i=0;$i<count($data['role_name']);$i++){
                $array[]['role_name']=$data['role_name'][$i];
            }
            $info = Role::addrole($array);
            if ($info['status']==100){
                return redirect('manager');
            }
        }else{
            return view('rbac/addmanager');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleread()
    {
        $list = Role::read();
        return view('rbac/manager',['list'=>$list]);
    }

    public function roledel($id)
    {
        $list = Role::deletes($id);
        if ($list){
            return redirect('manager');
        }
    }
}