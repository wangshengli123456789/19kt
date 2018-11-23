<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/9
 * Time: 20:42
 */

namespace App\Http\Controllers;
use App\Http\Models\Address;
use Illuminate\Support\Facades\DB;
class AddressController extends Controller
{
    public function addrRead()
    {
        //查询无限极分类
        $res = Address::protype();
        return view('addr/address_type',['list'=>$res]);
    }

    /**
     * 添加地区的方法
     */
    public function addrAdd()
    {
        if (request()->isMethod('post')){
            $data = request()->only('address','create_time','parent_id');
            //添加地区
            $res = Address::addressAdd($data);
            if ($res){
                return redirect('addrRead');
            }
        }else{
            $res = Address::protype();
            return view('addr/add_address_type',['list'=>$res]);
        }
    }
    /**
     * 删除地区的方法
     */
    public function addrDel($id)
    {
        $res = Address::addressDel($id);
        if ($res){
            return redirect('addrRead');
        }
    }
    /**
     * 修改地区的方法
     */
    public function addrSave($id)
    {
        if (request()->isMethod('post')){
            $data = request()->only('address','create_time','parent_id');
            //添加地区
            $res = Address::addressSave($id,$data);
            if ($res){
                return redirect('addrRead');
            }
        }else{
            //查询所有地区
            $res = Address::protype();
            //根据id查信息
            $info = Address::typeId($id);
            return view('addr/save_address_type',['list'=>$res,'data'=>$info]);
        }
    }
	/**
     * 修改地区状态的方法
     */
    public function addressstatusSave()
    {
        $status = request()->only('id','status');
        if ($status['status']==1)
        {
            $arr = array(
                'status'=>2
            );
            $res = DB::table('address')->where('id',$status['id'])->increment('status',1);
            return $res;
        }else{
            $arr = array(
                'status'=>1
            );
            $res = DB::table('address')->where('id',$status['id'])->decrement('status',1);
            return $res;
        }
    }
}