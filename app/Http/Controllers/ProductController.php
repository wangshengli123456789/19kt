<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/2
 * Time: 15:23
 */

namespace App\Http\Controllers;

use App\Http\Models\Address;
use App\Http\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * 显示分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productindex()
    {
        $res = Product::protype();
        return view('classtype/product_category',['list'=>$res]);
    }

    /**
     * 分类列表的添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function productadd()
    {
        if (request()->isMethod('post')){
            $data = request()->only('cat_name','byname','parent_id','keywords','description','sort');
            $res = Product::proadd($data);
            if ($res){
                return redirect('productindex');
            }
        }else{
            $res = Product::protype();
            return view('classtype/add_product_category',['type'=>$res]);
        }
    }

    /**
     * 分类列表的删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function productdel($id)
    {
        $res = Product::prodel($id);
        if ($res){
            return redirect('productindex');
        }
    }

    /**
     * 修改的信息
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function productsave($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('cat_name','byname','parent_id','keywords','description','sort');
            $res = Product::prosave($id,$data);
            if ($res){
                return redirect('productindex');
            }
        }else{
            //查询所有的分类
            $res = Product::protype();
            //根据id查看要修改的信息
            $info = Product::proindex($id);
            if ($info){
                return view('classtype/product_save',['type'=>$res,'data'=>$info,'id'=>$id]);
            }

        }
    }
    public function proindex()
    {
        //查询product_class表中的数据
        $res = Product::classselect();
        //查询所有的考试分类
        $info = Product::typeclasss();
        //查询课程分类
        $infos = Product::classtype();
        return view('classtype/product',['list'=>$res,'type'=>$info,'types'=>$infos]);
    }

    /**
     * 课程信息的添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function proadd()
    {
        if (request()->isMethod('post')){
            $data = request()->only('classname','address_id','cat_id','exam_type','writegroup','create_time','useful_time','new_price','old_price','content');
            //上传图片
            $file=request()->file('img');
            $ext = $file->getClientOriginalExtension();//获取图片的后缀名
            $filename = uniqid().rand(1000,9999).'.'.$ext;
            $file->move('./classuploads/',$filename);
            $data['img']='http://seven.haoyunyun.cn/classuploads/'.$filename;
            //进行新增
            $res = Product::classadd($data);
            if ($res){
                return redirect('proindex');
            }
        }else{
           //查询所有的分类
            $res = Product::typeclasss();
            $info = Product::classtype();
            //查询地区分类
            $infos = Address::protype();
            return view('classtype/addproduct',['type'=>$res,'types'=>$info,'typess'=>$infos]);
        }
    }

    public function prodel($id)
    {
        $res = Product::classdel($id);
        if ($res){
            return redirect('proindex');
        }
    }
	
	public function proedit($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('classname','address_id','cat_id','exam_type','writegroup','create_time','useful_time','new_price','old_price','content');
            //上传图片
            if (request()->hasFile('img')){
                $file=request()->file('img');
                $ext = $file->getClientOriginalExtension();//获取图片的后缀名
                $filename = uniqid().rand(1000,9999).'.'.$ext;
                $file->move('./classuploads/',$filename);
                $data['img']='http://seven.haoyunyun.cn/classuploads/'.$filename;
            }
            //进行修改
            $res = Product::classedit($id,$data);
            if ($res){
                return redirect('proindex');
            }
        }else{
            //查询所有的分类
            $res = Product::typeclasss();
            //根据id查询数据
            $info = Product::proselect($id);
            $infos = Product::classtype();
            //查询地区分类
            //查询地区分类
            $infoss = Address::protype();
            return view('classtype/productsave',['type'=>$res,'data'=>$info,'types'=>$infos,'typess'=>$infoss]);
        }
    }
	 //批量删除
    public function deleteall()
    {
        $data = request()->only('checkbox','new_cat_id');
        if (empty($data['new_cat_id'])){
            $del = Product::classdelall($data['checkbox']);
            if ($del){
                return redirect('proindex');
            }
        }else{
            //批量修改
            $del = Product::typesaveall($data['checkbox'],$data['new_cat_id']);
            if ($del){
                return redirect('proindex');
            }
        }

    }
    //分类显示信息
    public function producttype()
    {
        $data = request()->all();
        $res = Product::classfintype($data);
        //查询所有的考试分类
        $info = Product::typeclasss();
        //查询课程分类
        $infos = Product::classtype();
        return view('classtype/product',['list'=>$res,'type'=>$info,'types'=>$infos]);
    }
    //更改状态信息
    public function statusSave()
    {
        $status = request()->only('id','status');
        if ($status['status']==1)
        {
            $arr = array(
                'status'=>2
            );
            $res = DB::table('product_class')->where('cid',$status['id'])->update($arr);
            return $res;
        }else{
            $arr = array(
                'status'=>1
            );
           $res = DB::table('product_class')->where('cid',$status['id'])->update($arr);
           return $res;
        }
    }
}