<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/30
 * Time: 10:16
 */

namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Http\Models\RoleRule;
use Illuminate\Support\Facades\DB;

class RoleRuleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function setrule($id)
    {
        //显示所有的权限
        $res = RoleRule::set_rule_read();
        //查询已拥有的权限
        $info = RoleRule::read_rule_role($id);
        return view('rbac/rolerule',['rule'=>$res,'id'=>$id,'rules'=>$info]);
    }

    public function setruleadd()
    {
        $data = request()->all();
        for ($i=0;$i<count($data['uid']);$i++){
            $array[]['pid']=$data['uid'][$i];
            $array[$i]['rid']=$data['id'];
        }
        $info = RoleRule::ruleadd($data['id'],$array);
        if ($info){
            return redirect('manager');
        }
    }
}