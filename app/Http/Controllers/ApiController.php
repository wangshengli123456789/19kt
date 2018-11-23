<?php
/**
 * Created by PhpStorm.
 * User: 二宝
 * Date: 2018/11/5
 * Time: 16:15
 */

namespace App\Http\Controllers;
use App\Http\Models\ArticleType;
use App\Http\Models\File;
use App\Http\Models\Login;
use App\Http\Models\Product;
use App\Http\Models\User;
use App\Http\Models\Api;
class ApiController extends Controller
{
    /**
     * 文章内容的显示
     */
    public function articleRead()
    {
        //查询文章的内容并显示
        $info = ArticleType::Articlesls();
        if ($info){
            $array['list']=$info;
            $array['status']=100;
            $array['msg']='接口请求成功';
        }else{
            $array['status']=101;
            $array['msg']='接口请求失败';
        }
        $datas = json_encode($array);
        return $datas;
    }

    /**幻灯片的接口
     * @return false|string
     */
    public function pictureShow()
    {
        //查询所拥有的幻灯片
        $info = File::imgshowsss();
        if ($info){
            $array['list']=$info;
            $array['status']=100;
            $array['msg']='接口请求成功';
        }else{
            $array['status']=101;
            $array['msg']='接口请求失败';
        }
        $datas = json_encode($array);
        return $datas;
    }

    /**
     * 显示导航栏的接口
     */
    public function navRead()
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
        $datas = json_encode($array);
        return $datas;
    }

      /**
     * 授课模块考试类型的分类数据
     * @return false|string
     */
    //查询一级分类数据
    public function productSelect()
    {
        $key = self::secretkey();
        $data = request()->only('key');
        if (md5($data['key'])==$key)
        {
            $res = Product::typeclass();
            return $res;
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
        }

    }
    public function productRead()
    {
        $data = request()->only('id','key');
        $key = self::secretkey();
        $id = $data['id'];
        if (md5($data['key'])==$key)
        {
            $res = Product::cls_type($id);
            if ($res){
                $array['status']=100;
                $array['msg']='接口请求成功';
                $array['list']=$res;
            }
            return json_encode($array);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
        }

    }

    /**
     * 课程列表的展示接口
     * @return mixed
     */
    public function proRead()
    {
        //接收id
        //接收密钥
        $key = self::secretkey();
        $data = request()->only('key','id');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            $id = $data['id'];
            $res = Product::classselects($id);
            $ress['list']=$res;
            $ress['status']=100;
            $ress['msg']='接口请求成功';
            json_encode($ress);
            return $ress;
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
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
        $url='http://api.sms.cn/sms/?ac=send&uid=haoyunyun888-001&pwd=e9ed9401ed8ad38eaabbedccfbb5a36d&template=100001&mobile='.$phone.'&content={"code":"'.$code.'"}';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,1);
        curl_exec($ch);
        curl_close($ch);
    }
    /**
     *前台页面的注册
     */
    public function loginRegister()
    {
        $data = request()->all();
        $info = array(
            'telphone'=>$data['telphone'],
            'pwd'=>$data['pwd'],
            'user'=>$data['user'],
            'sex'=>$data['sex']
        );
        //上传图片：
        $file = request()->file('photo');
        if (request()->hasFile('photo')){
            $ext = $file->getClientOriginalExtension();//获取图片的后缀名
            $filename = uniqid().rand(1000,9999).'.'.$ext;
            $file->move('./uploads/',$filename);
            $info['photo']='http://seven.haoyunyan/uploads/'.$filename;
        }
       $res = Login::register($info);
       return json_encode($res);
    }
    /**
     * 前台页面的登录
     */
    public function indexLogin()
    {
        $data = request()->all();
        $res = Login::loginins($data);
        return json_encode($res);
    }
	 /**
     * 修改密码
     * @return mixed
     */
    public function uploadPwd()
    {
        //原始密码，新密码，确认密码
        $info = self::secretkey();
        $data = request()->all();
        //判断密钥是否正确
        if (md5($data['key'])==$info)
        {
            $res = Login::pwdUpload($data);
            return $res;
        }else{
            $array['status']=108;
            $array['msg']='密钥不正确';
            return $array;
        }

    }
    //修改头像
    public function updatephoto()
    {
        $key = self::secretkey();
        $data = request()->only('key');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            $file=request()->file('photo');
            if (request()->hasFile('photo')){
                $ext = $file->getClientOriginalExtension();//获取图片的后缀名
                $filename = uniqid().rand(1000,9999).'.'.$ext;
                $file->move('./uploads/',$filename);
                $info['photo']='http://seven.haoyunyan/uploads/'.$filename;
                //调用模型的方法
            Login::photosave($info);
            }else{
                $array['status']=101;
                $array['msg']='没有选择头像';
                return $array;
            }
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return $array;
        }

    }
    //修改手机号
    public function updatephone()
    {
        $key = self::secretkey();
        $data = request()->only('key');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            $info=request()->only('telphone');
                //调用模型的方法
                Login::phonesave($info);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return $array;
        }

    }
    //修改手机号
    public function updateuser()
    {
        $key = self::secretkey();
        $data = request()->only('key');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            $info=request()->only('user');
            //调用模型的方法
            Login::usersave($info);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return $array;
        }

    }
    //写一个私有的方法，产生接口使用的密钥
    private static function secretkey()
    {
        //密钥qazwsxEDVGFT34fdghgtr4dAS3
        $key = file_get_contents('key.txt');
        return md5($key);
    }
	 //地区的接口
    public function addressRead()
    {
        $key = self::secretkey();
        $data = request()->only('key');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            //调用模型的方法
            $res = Login::addressindex();
            return json_encode($res);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
        }
    }
	 /**
     * 地区二级分类的接口
     */
    public function addressSelect()
    {
        $key = self::secretkey();
        $data = request()->only('key','id');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            //调用模型的方法
            $res = Login::addressindexs($data['id']);
            return json_encode($res);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
        }
    }
	 /**
     * 文章分类的接口
     */
    public function articleType()
    {
        $key = self::secretkey();
        $data = request()->only('key');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            //调用模型的方法
            $res = Api::articletypes();
            return json_encode($res);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
        }
    }
    //点击分类显示文章
    public function typeArticle()
    {
        $key = self::secretkey();
        $data = request()->only('key','id');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            //调用模型的方法
            $res = Api::typesArticle($data['id']);
            return json_encode($res);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
        }
    }
    /**
     * 点击文章显示文章详细信息
     */
    public function articleList()
    {
        $key = self::secretkey();
        $data = request()->only('key','id');
        //判断密钥是否正确
        if (md5($data['key'])==$key)
        {
            //调用模型的方法
            $res = Api::listArticleRead($data['id']);
            return json_encode($res);
        }else{
            $array['status']=102;
            $array['msg']='密钥不正确,无法调用';
            return json_encode($array);
        }
    }
}