<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/2
 * Time: 15:49
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Product
{
    /**
     * @return array
     */
    public static function protype()
    {
        $data = DB::table('product_type')->get();
        $res = self::getTtree($data);
        return $res;
    }

    /**
     * 无限极分类
     * @param $data
     * @param int $pid
     * @param int $level
     * @return array
     */
    private static function getTtree($data,$pid=0,$level=0)
    {
        //定义一个静态的数组
        static $array=array();
        foreach ($data as $k =>$v){
            if ($v->parent_id==$pid){
                $v->level=$level;
                $array[]=$v;
                self::getTtree($data,$v->id,$level+1);
            }
        }
        return $array;
    }
	public static function proclasstypes()
	{
		$res = DB::table('class_type')->get();
        return $res;
	}
	
	//查询课程分类
    public static function classtype()
    {
        $res = DB::table('class_type')->get();
        return $res;
    }
    /**
     * 添加分类
     * @param $data
     * @return bool
     */
    public static function proadd($data)
    {
        $res = DB::table('product_type')->insert($data);
        return $res;
    }

    /**
     * 删除分类
     * @param $id
     * @return int
     */
    public static function prodel($id)
    {
        $res = DB::table('product_type')->where('id',$id)->delete();
        return $res;
    }

    /**
     * 根据id查询所述的分类
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed|null|object
     */
    public static function proindex($id)
    {
        $res = DB::table('product_type')->where('id',$id)->first();
        return $res;
    }

    /**
     * 修改分类的数据
     * @param $id
     * @param $data
     * @return int
     */
    public static function prosave($id,$data)
    {
        $res = DB::table('product_type')->where('id',$id)->update($data);
        return $res;
    }

    public static function classadd($data)
    {
        $res = DB::table('product_class')->insert($data);
        return $res;
    }
   public static function classselect()
    {
        $res = DB::table('product_class')
            ->join('exam_type2','product_class.exam_type','=','exam_type2.id')
            ->join('class_type','product_class.cat_id','=','class_type.id')
            ->join('address','product_class.address_id','=','address.id')
            ->select('product_class.cid','product_class.status','product_class.create_time','product_class.writegroup','product_class.img','product_class.old_price','product_class.new_price','product_class.classname','class_type.class_type','address.address','exam_type2.exam_type1')
            ->get();
        return $res;
    }
	public static function classselects($id)
    {
        $res = DB::table('product_class')->where(['cat_id'=>$id,'status'=>'1'])->select('img','classname','new_price')->get();
        return $res;
    }
    /**
     * 删除分类
     * @param $id
     * @return int
     */
    public static function classdel($id)
    {
        $res = DB::table('product_class')->where('cid',$id)->delete();
        return $res;
    }
	
	public static function proselect($id)
    {
        $res = DB::table('product_class')->where('cid',$id)->first();
        return $res;
    }

    public static function classedit($id,$data)
    {
        $res = DB::table('product_class')->where('cid',$id)->update($data);
        return $res;
    }
	    //查询一级分类数据
    public static function typeclass()
    {
        $res = DB::table('exam_type1')->get();
        if ($res){
            $array['status']=100;
            $array['msg']='接口请求成功';
            $array['list']=$res;
        }
        return json_encode($array);
    }
	//查询二级分类
    public static function typeclasss()
    {
        $res = DB::table('exam_type2')->get();
        return $res;
    }
	//查询地区信息
    public static function readaddress()
    {
        $res = DB::table('address')->get();
        return $res;
    }
    public static function cls_type($id)
    {
        $res = DB::table('exam_type1')
            ->join('exam_type2','exam_type1.id','=','exam_type2.exam_type2')
            ->where('exam_type1.id',$id)
            ->get();
        return $res;
    }
	//批量删除的方法
    public static function classdelall($data)
    {
        $res = DB::table('product_class')->whereIn('cid',$data)
            ->delete();
        return $res;
    }
    //按照分类查找
    public static function classfintype($data)
    {
        if (!empty($data['cat_id']))
        {
            //根据分类id查询信息
            $res = DB::table('product_class')
                ->join('exam_type2','product_class.exam_type','=','exam_type2.id')
                ->join('class_type','product_class.cat_id','=','class_type.id')
                ->join('address','product_class.address_id','=','address.id')
                ->where('cat_id',$data['cat_id'])
                ->get();
            return $res;
        }elseif (empty($data['cat_id'])&&!empty($data['keyword']))
        {
            $res = DB::table('product_class')
                ->join('exam_type2','product_class.exam_type','=','exam_type2.id')
                ->join('class_type','product_class.cat_id','=','class_type.id')
                ->join('address','product_class.address_id','=','address.id')
                ->where('classname',$data['keyword'])
                ->get();
            return $res;
        }elseif (!empty($data['cat_id'])&&!empty($data['keyword']))
        {
            $res = DB::table('product_class')
                ->join('exam_type2','product_class.exam_type','=','exam_type2.id')
                ->join('class_type','product_class.cat_id','=','class_type.id')
                ->join('address','product_class.address_id','=','address.id')
                ->where('classname','like','%'.$data['keyword'].'%')
                ->where('cat_id',$data['cat_id'])
                ->get();
            return $res;
        }else{
            $res = DB::table('product_class')
                ->join('exam_type2','product_class.exam_type','=','exam_type2.id')
                ->join('class_type','product_class.cat_id','=','class_type.id')
                ->join('address','product_class.address_id','=','address.id')
                ->get();
            return $res;
        }
    }
    //批量修改的方法
    public static function typesaveall($data,$info)
    {
        $infos = array(
            'cat_id'=>$info
        );
        $res = DB::table('product_class')->whereIn('cid',$data)
            ->update($infos);
        return $res;
    }
}