<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/1
 * Time: 15:31
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function ajaxadd()
    {
        if (request()->isMethod('get')){
            return view('ajaxadd');
        }else{
           $data = request()->all();
           DB::table('xinxi')->insert($data);
        }

    }

    public function ajaxread()
    {
        $info = DB::table('xinxi')->get();

        if ($info){
            $array['list']=$info;
            $array['status']=100;
            $array['msg']='接口请求成功';
        }else{
            $array['status']=101;
            $array['msg']='接口请求失败';
        }
        $datas = json_encode($array);
        print_r($datas);
        //return view('read',['list'=>$info]);
    }

    public function ajaxdel()
    {
        $data = request()->all();
        $res = DB::table('xinxi')->where('id',$data['id'])->delete();
        print_r($res);
    }

    public function index()
    {
        
    }
}