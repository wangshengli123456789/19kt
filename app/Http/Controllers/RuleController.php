<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 17:16
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\Rule;
use App\Http\Models\RoleRule;

class RuleController extends Controller
{
    /**
     * 添加权限
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function ruleadd()
    {
        if (request()->isMethod('post')){
            $data = request()->all();
            for ($i=0;$i<count($data['type_name']);$i++){
                $array[]['type_name']=$data['type_name'][$i];
            }
            $info = Rule::addrule($array);
            if ($info['status']==100){
                return redirect('rule');
            }
        }else{
            return view('rbac/addrule');
        }
    }

    /**
     * 读取所有的权限
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ruleread()
    {
        $list = Rule::read();
        return view('rbac/rule',['list'=>$list]);
    }

    /**
     * 删除权限
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function ruledel($id)
    {
        $list = Rule::deletes($id);
        if ($list){
            return redirect('rule');
        }
    }

    /**根据角色id查询权限信息
     * @param $id
     */
    public function readrule($id)
    {
        $info = RoleRule::readrule($id);
        //显示权限信息
        return view('rbac/rule_index',['list'=>$info]);
    }
}