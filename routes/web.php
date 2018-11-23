<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/',['uses'=>'LoginController@adminlogin']);
Route::any('/loginout',function (){
    \Illuminate\Support\Facades\Session::flush('user');
    return redirect('/');
});
/**
 * 角色表的新增
 */
Route::match(['get','post'],'roleadd',['uses'=>'RoleController@roleadd']);
/**
 * 显示添加角色成功的页面
 */
Route::get('manager',['uses'=>'RoleController@roleread']);
/**
 * 角色表的删除
 */
Route::get('deleterole/{id}',['uses'=>'RoleController@roledel']);
/**
 * 权限表的新增
 */
Route::match(['get','post'],'ruleadd',['uses'=>'RuleController@ruleadd']);
/**
 * 显示添加权限成功的页面
 */
Route::get('rule',['uses'=>'RuleController@ruleread']);
/**
 * 权限表的删除
 */
Route::get('deleterule/{id}',['uses'=>'RuleController@ruledel']);
/**
 * 根据角色id查询该角色拥有那些权限
 */
Route::get('readrule/{id}',['uses'=>'RuleController@readrule']);
/**
 * 用户表的新增
 */
Route::match(['get','post'],'useradd',['uses'=>'UserController@useradd']);
/**
 * 显示添加用户成功的页面
 */
Route::get('user',['uses'=>'UserController@userread']);
/**
 * 查看用户的角色
 */
Route::get('readroles/{id}',['uses'=>'UserRoleController@rolesindex']);
/**
 * 用户表的删除
 */
Route::get('deleteuser/{id}',['uses'=>'UserController@userdel']);
/**
 * 根据id查询所有的权限并显示
 */
Route::get('userrole/{id}',['uses'=>'UserRoleController@userRoleInfo']);
/**
 * 用户角色表的添加
 */
Route::post('userroles',['uses'=>'UserRoleController@userRoleInsert']);
/**
 * 给角色设置权限
 */
Route::get('setrules/{id}',['uses'=>'RoleRuleController@setrule']);
/**
 * 角色权限的添加
 */
Route::post('rolessetrule',['uses'=>'RoleRuleController@setruleadd']);
/**
 * 文章分类的添加article_category
 */
Route::get('article_category',['uses'=>'ArticleTypeController@index']);
//添加文章的分类
Route::match(['get','post'],'articleadd',['uses'=>'ArticleTypeController@articleTypeAdd']);
//添加文章
Route::any('article',['uses'=>'ArticleTypeController@articleIndex']);
Route::post('searchs',['uses'=>'ArticleTypeController@searchs']);
Route::get('articledel/{id}',['uses'=>'ArticleTypeController@articleDel']);
Route::get('articletypedel/{id}',['uses'=>'ArticleTypeController@articleTypeDel']);
Route::match(['get','post'],'addarticle',['uses'=>'ArticleTypeController@articleAdd']);
//文件上传的路由
Route::match(['get','post'],'show',['uses'=>'FileController@file']);
Route::get('imgshow',function (){
    $data = \Illuminate\Support\Facades\DB::table('show_picture')->get();
    return view('imgshow',['list'=>$data]);
});
Route::get('delshowimg/{id}',['uses'=>'FileController@delshowimg']);
//自定义导航的路由
Route::any('nav',['uses'=>'FileController@nav']);
//添加导航 addnav
Route::any('addnav',['uses'=>'FileController@addnav']);
//删除导航
Route::any('navdel/{id}',['uses'=>'FileController@navdel']);
Route::any('ii',['uses'=>'FileController@ii']);
//前台登录注册的路由

Route::any('login',['uses'=>'LoginController@login']);
Route::any('phonecode',['uses'=>'LoginController@codePhone']);

//显示新增信息
ROute::any('ajaxadd',['uses'=>'AjaxController@ajaxadd']);
ROute::any('ajaxread',['uses'=>'AjaxController@ajaxread']);
ROute::any('ajaxdel',['uses'=>'AjaxController@ajaxdel']);
ROute::any('wsllogin',['uses'=>'AjaxController@login']);
ROute::any('saveStatus.{id}',['uses'=>'AjaxController@saveStatus']);

//课程分类的显示
Route::any('productindex',['uses'=>'ProductController@productindex']);

//课程分类的添加
Route::any('productadd',['uses'=>'ProductController@productadd']);
//课程分类的删除
Route::any('productdel/{id}',['uses'=>'ProductController@productdel']);
//课程分类的修改
Route::any('productsave/{id}',['uses'=>'ProductController@productsave']);


//
//课程信息的显示
Route::any('proindex',['uses'=>'ProductController@proindex']);

//课程信息的添加
Route::any('proadd',['uses'=>'ProductController@proadd']);
Route::any('prodel/{id}',['uses'=>'ProductController@prodel']);

//七牛云上传图片
Route::any('upload','UploadController@uploadFile');
Route::any('uploadshow','UploadController@uploadShow');

//接口测试：
Route::any('articleRead',['uses'=>'ApiController@articleRead']);
Route::any('navRead',['uses'=>'ApiController@navRead']);
Route::any('proRead',['uses'=>'ApiController@proRead']);
Route::any('productRead',['uses'=>'ApiController@productRead']);
Route::any('pictureShow',['uses'=>'ApiController@pictureShow']);
Route::any('phoneCode',['uses'=>'ApiController@codePhone']);
Route::any('loginRegister',['uses'=>'Api@loginRegister']);
Route::any('indexLogin',['uses'=>'ApiController@indexLogin']);
Route::any('productSelect',['uses'=>'ApiController@productSelect']);
Route::any('addressRead',['uses'=>'ApiController@addressRead']);
Route::any('addressSelect',['uses'=>'ApiController@addressSelect']);
Route::any('articleType',['uses'=>'ApiController@articleType']);
Route::any('typeArticle',['uses'=>'ApiController@typeArticle']);
Route::any('articleList',['uses'=>'ApiController@articleList']);

//修改密码
Route::any('uploadPwd',['uses'=>'ApiController@uploadPwd']);
//修改头像
Route::any('updatephoto',['uses'=>'ApiController@updatephoto']);
//修改手机号
Route::any('updatephone',['uses'=>'ApiController@updatephone']);
//修改用户名（昵称）
Route::any('updateuser',['uses'=>'ApiController@updateuser']);

//编辑导航
Route::any('navsave/{id}',['uses'=>'FileController@navsave']);
//修改幻灯片
Route::any('showedit/{id}',['uses'=>'FileController@showedit']);
//修改课程
Route::any('proedit/{id}',['uses'=>'ProductController@proedit']);
//修改文章分类
Route::any('articleedit/{id}',['uses'=>'ArticleTypeController@articleedit']);
//修改文章内容
Route::any('editarticle/{id}',['uses'=>'ArticleTypeController@articletypeedit']);
//文章内容的批量删除
Route::any('deleteall',['uses'=>'ProductController@deleteall']);
//文章信息分类查询
Route::any('producttype',['uses'=>'ProductController@producttype']);
Route::any('statusSave',['uses'=>'ProductController@statusSave']);
//地区的无限极分类 addrRead
Route::any('addrRead',['uses'=>'AddressController@addrRead']);

//添加地区
Route::any('addrAdd',['uses'=>'AddressController@addrAdd']);
Route::any('addrSave/{id}',['uses'=>'AddressController@addrSave']);
Route::any('addrDel/{id}',['uses'=>'AddressController@addrDel']);
Route::any('addressstatusSave',['uses'=>'AddressController@addressstatusSave']);
Route::any('email',['uses'=>'AddressController@email']);
Route::any('email2',['uses'=>'AddressController@email2']);
/**
 * 调用接口实现登录
 */
Route::any('apiLogin',['uses'=>'LoginController@apiLogin']);
Route::any('register',['uses'=>'LoginController@register']);
/**
 * 设置目录
 */
Route::any('setDir/{id}',['uses'=>'DirController@setDir']);
Route::any('dirDel/{id}',['uses'=>'DirController@dirDel']);