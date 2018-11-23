<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/10/31
 * Time: 16:47
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login
{
    /**
     * @param $phone
     * @return Model|\Illuminate\Database\Query\Builder|mixed|null|object
     */
    public static function read($phone)
    {
        $res = DB::table('login_code')->where('telphone',$phone)->first();
        return $res;
    }

    public static function loginindex($user)
    {
        $res = DB::table('login')->where('user',$user)->first();
        if ($res){
            $data['list']=$res;
            $data['status']=100;

        }else{
            $data['status']=101;
        }
        return $data;
    }

    public static function register($data)
    {
        $phone = $data['telphone'];
        $user = $data['user'];
        $pwd = $data['pwd'];
        if (empty($phone)){
            $array['status']=103;
            $array['msg']='手机号为空';
            return $array;
        }
        if (empty($user)){
            $array['status']=104;
            $array['msg']='用户名为空';
            return $array;
        }
        if (empty($pwd)){
            $array['status']=105;
            $array['msg']='密码为空';
            return $array;
        }
        //判断密码长度是否符合要求
        if (!preg_match('/^[0-9a-zA-Z]{6,10}$/',$pwd)){
            $array['status']=106;
            $array['msg']='密码长度必须为数字，字母混合，且6-10位';
            return $array;
        }
        //手机号规则验证
        if (!preg_match('/^1[3578]\d{9}$/',$phone)){
            $array['status']=107;
            $array['msg']='手机号不符合，必须以1开头，第二位为3578';
            return $array;
        }
        //先查询该用户是不是注册过
        $info =DB::table('login_code')->where('telphone',$data['telphone'])->first();
        //判断$info
        if ($info){
            $array['status']=102;
            $array['msg']="用户被注册";
        }else{
			$data['pwd']=md5($pwd);
            $res = DB::table('login_code')->insert($data);
            if ($res){
                $array['status']=100;
                $array['msg']="数据添加成功";
            }else{
                $array['status']=101;
                $array['msg']="数据添加失败";
            }
        }

        return $array;
    }

    public static function loginins($data)
    {
        $phone = $data['telphone'];
        $user = $data['user'];
        $pwd = $data['pwd'];
        //判断数据是不是为空
        if (empty($phone)){
            $array['status']=104;
            $array['msg']='手机号为空';
            return $array;
        }
        if (empty($user)){
            $array['status']=105;
            $array['msg']='用户名为空';
            return $array;
        }
        if (empty($pwd)){
            $array['status']=106;
            $array['msg']='密码为空';
            return $array;
        }
        //判断密码长度是否符合要求
        if (!preg_match('/^[0-9a-zA-Z]{6,10}$/',$pwd)){
            $array['status']=107;
            $array['msg']='密码长度必须为数字，字母混合，且6-10位';
            return $array;
        }
        //手机号规则验证
        if (!preg_match('/^1[3578]\d{9}$/',$phone)){
            $array['status']=108;
            $array['msg']='手机号不符合，必须以1开头，第二位为3578';
            return $array;
        }
        $res = DB::table('login_code')->where('telphone',$phone)->first();
        if ($res){
            //判断密码是不是正确
            if ($res->user==$data['user']){
                if ($res->pwd==md5($data['pwd'])){
                    $array['status']=100;
                    $array['msg']='密码正确';
                }else{
                    $array['status']=101;
                    $array['msg']='密码错误';
                }
            }else{
                $array['status']=103;
                $array['msg']='用户名错误';
            }

        }else{
            $array['status']=102;
            $array['msg']='此用户不存在';
        }
        return $array;
    }
	
	   public static function pwdUpload($res)
    {
        //判断原始密码是否为空
        $old_pwd = $res['old_pwd'];
        $new_pwd = $res['new_pwd'];
        $confirm_pwd = $res['confirm_pwd'];
        //判断旧密码是否为空
        if (empty($old_pwd)){
            $array['status']=101;
            $array['msg']='旧密码为空';
            return $array;
        }
        //判断新密码是否为空
        if (empty($new_pwd)){
            $array['status']=102;
            $array['msg']='新密码为空';
            return $array;
        }
        //判断确认密码
        if (empty($confirm_pwd)){
            $array['status']=103;
            $array['msg']='确认密码为空';
            return $array;
        }
        //判断两次输入的密码
        if ($confirm_pwd!=$new_pwd){
            $array['status']=104;
            $array['msg']='两次密码输入不一致';
            return $array;
        }
        //判断密码长度是否符合要求
        if (!preg_match('/^[0-9a-zA-Z]{6,10}$/',$new_pwd)){
            $array['status']=105;
            $array['msg']='新密码长度必须为数字，字母混合，且6-10位';
            return $array;
        }
        //判断原始密码输入是否正确
        $userid = Session::get('userid');
        if (Session::has('userid')){
            $info = DB::table('login_code')->where(['pwd'=>md5($old_pwd),'id'=>$userid])->first();
            if ($info){
                //之后修改密码
                $data = array('pwd'=>md5($new_pwd));
                $datas = DB::table('login_code')->where('id',$userid)->update($data);
                if ($datas){
                    Session::flush('userid');
                    $array['status']=100;
                    $array['msg']='密码修改成功,请重新登录';
                    return $array;
                }
            }else{
                $array['status']=106;
                $array['msg']='原始密码不正确';
                return $array;
            }
        }else{
            $array['status']=107;
            $array['msg']='该用户没有登录，请先登录';
            return $array;
        }

    }

    /**
     * 修改图片
     * @param $file
     * @return mixed
     */
    public static function photosave($file)
    {
        $userid = Session::get('userid');
        $datas = DB::table('login_code')->where('id',$userid)->update($file);
        if ($datas){
            $array['status']=100;
            $array['msg']='头像修改成功';
            return $array;
        }else{
            $array['status']=103;
            $array['msg']='头像修改失败';
            return $array;
        }
    }
    /**
     * 修改手机号
     * @param $file
     * @return mixed
     */
    public static function phonesave($res)
    {
        $userid = Session::get('userid');
        $datas = DB::table('login_code')->where('id',$userid)->update($res);
        if ($datas){
            $array['status']=100;
            $array['msg']='手机号修改成功';
            return $array;
        }else{
            $array['status']=103;
            $array['msg']='手机号修改失败';
            return $array;
        }
    }
    /**
     * 修改昵称
     * @param $file
     * @return mixed
     */
    public static function usersave($res)
    {
        $userid = Session::get('userid');
        $datas = DB::table('login_code')->where('id',$userid)->update($res);
        if ($datas){
            $array['status']=100;
            $array['msg']='昵称修改成功';
            return $array;
        }else{
            $array['status']=103;
            $array['msg']='昵称修改失败';
            return $array;
        }
    }
	public static function addressindex()
    {
        $datas = DB::table('address')->where(['parent_id'=>'0','status'=>'1'])->select('id','address')->get();
        if ($datas)
        {
            $array['list']=$datas;
            $array['status']=100;
            $array['msg']='地区请求成功';
            return $array;
        }else{
            $array['status']=101;
            $array['msg']='地区请求失败';
            return $array;
        }
        return json_encode($array);
    }
	
	  public static function addressindexs($id)
    {
        $datas = DB::table('address')->where(['parent_id'=>$id,'status'=>'1'])->select('id','address')->get();
        if ($datas)
        {
            $array['list']=$datas;
            $array['status']=100;
            $array['msg']='地区请求成功';
            return $array;
        }else{
            $array['status']=101;
            $array['msg']='地区请求失败';
            return $array;
        }
        return json_encode($array);
    }
}