<!-- 作者：ljl -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>注册</title>
<link rel="stylesheet" href="{{asset('login')}}/css/public.css">
<link rel="stylesheet" href="{{asset('login')}}/font/iconfont.css">
<link rel="stylesheet" href="{{asset('login')}}/css/j-register.css">
<!--[if lt IE 9]>
  <script src="{{asset('login')}}/js/html5shiv.min.js"></script>
<![endif]-->
</head>
<body>
<div class="head">
    <div class="head-cont">
        <img src="{{asset('login')}}/imgs/logo.png" alt="" class="logo" />
        <div class="tit">魔派企业级开源软件</div> |
        <div class="txt">技术孵化梦想</div>
    </div>
</div>
<form action="/register" class="back" method="post">
    <div class="tit">注册新用户</div>
    <input type="text" class="input user" name="user" placeholder="用户名"/>
    <input type="text" class="input phone" name="telphone" placeholder="手机号"/>
    <input type="password" class="input password" name="pwd" placeholder="输入密码"/>
    <input type="text" class="input sex" name="sex" placeholder="输入性别1男2女"/>
    <input type="submit" class="sub" value="确 &nbsp; 定"/>
    <div class="login">
        <a href="/login">点击登录</a>
    </div>
</form>
</body>
</html>
<script src="{{asset('login')}}/js/zepto.min.js"></script>
<script src="{{asset('rbac')}}/js/jquery.min.js"></script>
<script>
$(function(){
    $('.sub').on('click', function(){
        var user = $('.user').val();
        var phone = $('.phone').val();
        var sex = $('.sex').val();
        var password = $('.password').val();
    })
})      
</script>