<?php

namespace App\Http\Controllers;
use App\Http\Models\Dir;
use Illuminate\Support\Facades\DB;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Illuminate\Http\Request;
use App\Http\Models\Product;
class UploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        if ($request->isMethod('post')) {
            $info = request()->only('dir_id','class_id','video_name','create_time');
            if ($request->hasFile('file')) {
                // 需要填写你的 Access Key 和 Secret Key
                $accessKey = 'jBe2ZqnUBfGcdP43iilFKMTqCpR3qxlexuwose2K';
                $secretKey = 'lw3HDgndWbC3axUCsdlJKoJ5xLOisgS6ke38oE-P';
                // 构建鉴权对象
                $auth = new Auth($accessKey, $secretKey);
                // 要上传的空间
                $bucket = 'libaobao';
                // 生成上传 Token
                $token = $auth->uploadToken($bucket);
                // 要上传文件的本地路径
                $file=request()->file('file');
                $ext = $file->getClientOriginalExtension();//获取图片的后缀名
                $filename = uniqid().rand(1000,9999).'.'.$ext;
                $file->move('./classuploads/',$filename);
                $filePath = './classuploads/'.$filename;
                // 上传到七牛后保存的文件名
                $key = $filename;
                // 初始化 UploadManager 对象并进行文件的上传
                $uploadMgr = new UploadManager();
                // 调用 UploadManager 的 putFile 方法进行文件的上传
                list($ret,$err) = $uploadMgr->putFile($token, $key, $filePath);
                if ($err !== null) {
                    var_dump($err);
                } else {
                    $info['video_url']='http://phpbq2snf.bkt.clouddn.com/'.$key;
                    //添加到数据库
                    DB::table('dir_class')->insert($info);

                    unlink($filePath);
                    return redirect('proindex');
                }
            }

        }else {
            $res = Product::protype();
            return view('qiniu/add',['type'=>$res]);
        }
    }

    public function uploadShow()
    {
        //查询表中的信息
        $res = Dir::videoRead();
        return view('qiniu/read',['list'=>$res]);
    }
}
