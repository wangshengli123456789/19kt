<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/15
 * Time: 14:16
 */

namespace App\Http\Controllers;


use App\Http\Models\Dir;

class DirController extends Controller
{
    /**
     * 显示设置目录
     */
    public function setDir($id)
    {
        $type = Dir::dirRead();
        return view('qiniu.add',['type'=>$type,'id'=>$id]);
    }

    /**
     * 删除视频信息
     */
    public function dirDel($id)
    {
        $res = Dir::videoDel($id);
        if ($res){
            return redirect('uploadshow');
        }else{
            echo "删除失败";
        }
    }
}