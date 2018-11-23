<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>登录</title>
<link rel="stylesheet" href="{{asset('login')}}/css/public.css">
<link rel="stylesheet" href="{{asset('login')}}/font/iconfont.css">
<link rel="stylesheet" href="{{asset('login')}}/css/j-mp-login.css">
</head>
<body>
<div class="head">
    <div class="head-cont">
        <img src="{{asset('login')}}/imgs/logo.png" height="62" width="62" alt="" class="logo" />
        <div class="tit">魔派企业级开源软件</div> |
        <div class="txt">技术孵化梦想</div>
    </div>
</div>
<div class="login clear">
    <div class="login-left fl">
        <div class="txt1">企业应用中心</div>
        <div class="txt2">租户 · 云服务 · 移动应用</div>
        <div class="txt3">软件即服务(Saas)</div>
    </div>
    <div class="login-right fr">
        <div class="login-box">
            <div class="tit">登录</div>
            <form action="/apiLogin" method="post">
                <input type="text" class="input user" name="user" placeholder="请输入用户名"/><br><br>
                <input type="text" class="input phone" name="telphone" placeholder="请输入手机号"/>
                <input type="password" class="input password" name="pwd" placeholder="请输入密码"/>
                <div class="ji clear">
                    <div class="fl">
                        <input type="checkbox" />记住密码
                    </div>
                    <a href="#" class="fr">忘记密码？</a>
                </div>
                <input type="submit" class="sub" value="登 &nbsp; 录" />
                <div class="register">
                    <a href="/register">点击注册</a>
                </div>
            </form>
            <div class="login-bot clear">
                <a href="#" class="bot-item">
                    <img src="{{asset('login')}}/imgs/wx.png" alt="" />
                    <div>微信登录</div>
                </a>
                <a href="#" class="bot-item">
                    <img src="{{asset('login')}}/imgs/qq.png" alt="" />
                    <div>QQ登录</div>
                </a>
                <a href="#" class="bot-item">
                    <img src="{{asset('login')}}/imgs/zfb.png" alt="" />
                    <div>支付宝登录</div>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="js/zepto.min.js"></script>
<script>
      
</script>