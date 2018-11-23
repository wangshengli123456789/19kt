<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/10/31
 * Time: 16:00
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Login;
class LoginController extends Controller
{
    /**
     * 显示登录页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        if (request()->isMethod('get')){
            return view('index/login');
        }else{
            //接收收到的值
            $data = request()->all();
            $phone = $data['phone'];
            $session =Session::get('code');
            //根据手机号查询是否拥有该账户
            $res = Login::read($phone);
            if ($res){
                //判断用户名和密码是否正确
                if ($res->user==$data['user']){
                    //判断验证码是否正确
                    if ($data['code']==$session){
                        echo "<script>alert('登录成功');</script>";
                    }else{
                        echo "<script>alert('验证码不正确，请自信确认之后再登录');location.href='/login';</script>";
                    }
                }else{
                    echo "<script>alert('用户名不正确');location.href='/login';</script>";
                }
            }
        }
    }

    /**
     * ajax接收手机号，随机产生验证码 使用curl传递参数
     */
    public function codePhone()
    {
        $data = request()->all();
        $phone = $data['phone'];
        $code = rand(100000,999999);
        $url='http://api.sms.cn/sms/?ac=send&uid=wangshengli123&pwd=d3452de404bd6d3a62d85f426728eb83&template=478897&mobile='.$phone.'&content={"code":"'.$code.'"}';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,1);
        curl_exec($ch);
        curl_close($ch);
        //把生成的验证码和手机号存到session
        Session::put('code',$code,300);
    }

    public function adminlogin()
    {
        if (request()->isMethod('post')){
            $data = request()->only('user','pwd');
            $res = Login::loginindex($data['user']);

            if ($res['status']==100){
                //判断密码是否正确
                if ($data['pwd']==$res['list']->pwd)
                {
                    return 1;
                    Session::put('user',$data['user']);
                    Session::put('userid',$res['list']->id);
                }else{
                    return 2;
                }
            }else{
                    return 3;
            }
        }else{
            //判断是否存在session
            if (Session::has('userid')){
                return redirect('/user');
            }else{
                return view('login');
            }

        }
    }
}