<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>登录</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="{{asset('rbac')}}/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="{{asset('rbac')}}/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="{{asset('rbac')}}/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="{{asset('rbac')}}/assets/css/admin.css">
  <link rel="stylesheet" href="{{asset('rbac')}}/assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="{{asset('code')}}/css/verify.css">
</head>

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				Amaze UI<span> Login</span> <i class="am-icon-skyatlas"></i>
				
			</div>
		</div>

		<div class="login-font">
			<i>Log In </i> or <span> Sign Up</span>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form" action="/" method="post">
				<fieldset>
					{{csrf_field()}}
					<div class="am-form-group">
						<input type="text" name="user" class="user" id="doc-ipt-email-1" placeholder="输入个用户名吧">
					</div>
					<br>
					<div class="am-form-group">
						<input type="password" class="pwd" name="pwd" id="doc-ipt-pwd-1" placeholder="输入个密码吧">
					</div>
					<br>
					<div id="mpanel1" >
						<input type="hidden" id="codes">
					</div>
					<p><button type="button" id="submit" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
			</form>
		</div>
	</div>
</div>

  <script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
  <script src="{{asset('rbac')}}/assets/js/amazeui.min.js"></script>
  <script src="{{asset('rbac')}}/assets/js/app.js"></script>
  <script type="text/javascript" src="{{asset('code')}}/js/verify.js" ></script>
</body>
<script>
    $('#mpanel1').slideVerify({
        type : 1,		//类型
        vOffset : 5,	//误差量，根据需求自行调整
        barSize : {
            width : '80%',
            height : '40px',
        },
        ready : function() {
        },
        success : function() {
			$("#codes").val("1");
        },
        error : function() {
            $("#codes").val("0");
        }

    });
    $("#submit").click(function () {
        //获取文本框的值
        var user=$(".user").val();
        var pwd=$(".pwd").val();
        var code=$('#codes').val();
		if (code==1){
		    $.ajax({
				type:"post",
				url:"/",
				data:{user:user,pwd:pwd},
				success:function (e) {
				    if (e==1){
                        alert('登录成功');window.location.href='/user';
					}else if(e==2){
                        alert('密码不正确');window.location.href='/';
					}else if(e==3){
                        alert('该用户不存在');window.location.href='/';
					}
                }
			})
		}else {
		    alert('请完成验证');
		    location.reload();
		}
    });
</script>
</html>