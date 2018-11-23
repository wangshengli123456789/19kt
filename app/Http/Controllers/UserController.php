<?php
/**
 * Created by PhpStorm.
 * User: 王胜利
 * Date: 2018/10/29
 * Time: 17:40
 */

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
class UserController extends  Controller
{
    public function useradd()
    {
        if (request()->isMethod('post')){
            $data = request()->all();
            $info = User::adduser($data);
            if ($info['status']==100){
                return redirect('user');
            }
        }else{
            return view('rbac/adduser');
        }
    }
    public function userread()
    {
        $list = User::read();
        return view('rbac/user',['list'=>$list]);
    }
    public function userdel($id)
    {
        $list = User::deletes($id);
        if ($list){
            return redirect('user');
        }
    }
}