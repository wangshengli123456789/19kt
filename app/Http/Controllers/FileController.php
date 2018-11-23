<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/10/31
 * Time: 19:25
 */

namespace App\Http\Controllers;

use App\Http\Models\File;
use App\Http\Requests\Request;
class FileController extends Controller
{
    //文件上传
    public function file()
    {
        if (request()->isMethod('post')){
            $data = request()->all();
            $res['show_name']=$data['show_name'];
            $res['show_link']=$data['show_link'];
            $res['sort']=$data['sort'];
            //图片上传
            $file = request()->file('show_img');
            $ext = $file->getClientOriginalExtension();//获取图片的后缀名
            $filename = uniqid().rand(1000,9999).'.'.$ext;
            $file->move('./uploads/',$filename);
            $res['show_img']='http://seven.haoyunyun.cn/uploads/'.$filename;
            //将结果添加到数据库
            $info = File::uploads($res);
            if ($info){
                return redirect('show');
            }
        }else{
            //查询所拥有的幻灯片
            $info = File::imgshows();
            return view('show',['list'=>$info]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delshowimg($id)
    {
        $info = File::imgdelss($id);
        if ($info){
            return redirect('show');
        }
    }

    /**
     * 显示导航栏
     */
    public function nav()
    {
        //查询信息
        $list = File::imgshowss();
        if ($list){
            $array['list']=$list;
            $array['status']=100;
            $array['msg']='接口请求成功';
        }else{
            $array['status']=101;
            $array['msg']='接口请求失败';
        }
//        $datas = json_encode($array);
//        return $datas;
        return view('nav',['list'=>$list]);
    }

    public function addnav()
    {
        if (request()->isMethod('post')){
            $data = request()->all();
            $res['nav_menu']=$data['nav_menu'];
            $res['nav_name']=$data['nav_name'];
            $res['sort']=$data['sort'];
            //图片上传
            $file = request()->file('photo');
            $ext = $file->getClientOriginalExtension();//获取图片的后缀名
            $filename = uniqid().rand(1000,9999).'.'.$ext;
            $file->move('./navuploads/',$filename);
            $res['photo']='http://seven.haoyunyun.cn/navuploads/'.$filename;
            $info = File::navuploads($res);
            if ($info){
                return redirect('nav');
            }
        }else{
            return view('addnav');
        }
    }
    /**
     * navdel  删除导航信息
     */
    public function navdel($id)
    {
        $info = File::imgdels($id);
        if ($info){
            return redirect('nav');
        }
    }

 public function navsave($id)
    {
        if (request()->isMethod('post'))
        {
            //接受所有数据
            $res = request()->only('nav_menu','nav_name','sort');
            //判断是否修改图片
            if (request()->hasFile('photo'))
            {
                $file = request()->file('photo');
                $ext = $file->getClientOriginalExtension();//获取图片的后缀名
                $filename = uniqid().rand(1000,9999).'.'.$ext;
                $file->move('./navuploads/',$filename);
                $res['photo']='http://seven.haoyunyun.cn/navuploads/'.$filename;
            }
            //调用模型里面修改的方法
            $data = File::navedits($id,$res);
            if ($data){
                return redirect('nav');
            }
        }else{
            //查询数据
            $res = File::navedit($id);
            return view('navsave',['list'=>$res]);
        }
    }

    public function showedit($id)
    {
        if (request()->isMethod('post')){
            $data = request()->all();
            $res['show_name']=$data['show_name'];
            $res['show_link']=$data['show_link'];
            $res['sort']=$data['sort'];
            if (request()->hasFile('show_img')){
                $file = request()->file('show_img');
                $ext = $file->getClientOriginalExtension();//获取图片的后缀名
                $filename = uniqid().rand(1000,9999).'.'.$ext;
                $file->move('./uploads/',$filename);
                $res['show_img']='http://seven.haoyunyun.cn/uploads/'.$filename;
            }
            //将结果添加到数据库
            $info = File::imgedits($id,$res);
            if ($info){
                return redirect('show');
            }
        }else{
            //查询所拥有的幻灯片
            $info = File::imgshows();
            //查询要修改的幻灯片
            $infos = File::imgedit($id);
            return view('showedit',['list'=>$info,'data'=>$infos]);
        }
    }
}