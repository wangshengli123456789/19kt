<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{asset('css')}}/app.css">
    <link href="{{asset('rbac')}}/css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('rbac')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('rbac')}}/js/global.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcHead">
        <div id="head">
            <div class="logo"><a href="/user"><img src="{{asset('rbac')}}/images/dclogo.gif" alt="logo"></a></div>
            <div class="nav">
                <ul>
                    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
                        <div class="drop mTopad"><a href="/proindex">课程</a> <a href="article">文章</a> <a href="/nav">自定义导航</a> <a href="/show">首页幻灯</a>  <a href="/user">管理员</a> <a href="link.html"></a> </div>
                    </li>
                    <li><a href="../index.php" target="_blank">查看站点</a></li>
                    <li><a href="http://baidu.com" target="_blank">帮助</a></li>
                </ul>
                <ul class="navRight">
                    <li class="M noLeft"><a href="JavaScript:void(0);">您好,{{\Illuminate\Support\Facades\Cache::get('user')}}</a>
                        {{--<div class="drop mUser">--}}
                            {{--<a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>--}}
                            {{--<a href="manager.php?rec=cloud_account">设置云账户</a>--}}
                        {{--</div>--}}
                    </li>
                    <li class="noRight"><a href="/loginout">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- dcHead 结束 -->
    <div id="dcLeft"><div id="menu">
            <ul class="top">
                <li><a href="/user"><i class="home"></i><em>管理首页</em></a></li>
            </ul>
            <ul>
                <li><a href="/nav"><i class="nav"></i><em>自定义导航栏</em></a></li>
                <li><a href="/show"><i class="show"></i><em>首页幻灯广告</em></a></li>
            </ul>
            <ul>
                <li><a href="/productindex"><i class="productCat"></i><em>课程分类</em></a></li>
                <li><a href="/proindex"><i class="product"></i><em>课程列表</em></a></li>
            </ul>
            <ul>
                <li><a href="/addrRead"><i class="product"></i><em>地区列表</em></a></li>
            </ul>
            <ul>
                <li><a href="/article_category"><i class="articleCat"></i><em>文章分类</em></a></li>
                <li><a href="/article"><i class="article"></i><em>文章列表</em></a></li>
            </ul>
            <ul class="bot">
                {{--<li><a href="backup.html"><i class="backup"></i><em>数据备份</em></a></li>--}}
                {{--<li><a href="mobile.html"><i class="mobile"></i><em>手机版</em></a></li>--}}
                {{--<li><a href="theme.html"><i class="theme"></i><em>设置模板</em></a></li>--}}
                <li><a href="/user"><i class="manager"></i><em>用户管理</em></a></li>
                <li><a href="/manager"><i class="manager"></i><em>角色管理</em></a></li>
                <li><a href="/rule"><i class="manager"></i><em>权限管理</em></a></li>
                {{--<li><a href="manager_log.html"><i class="managerLog"></i><em>操作记录</em></a></li>--}}
            </ul>
        </div>
    </div>
    <div id="dcMain">
    @yield('content')
    <div class="clear"></div>
    <div id="dcFooter">
        <script type="text/javascript">
            $(".c1").simpleSwitch({
                "theme": "Default"
            });
            $(".c2").simpleSwitch({
                "theme": "DefaultMin"
            });
            $(".c3").simpleSwitch();
            $(".c4").simpleSwitch({
                "theme": "FlatRadius"
            });
            $(".c5").simpleSwitch({
                "theme": "FlatCircular"
            });
            $(".c6").simpleSwitch({
                "theme": "Green"
            });
            $(".c7").simpleSwitch({
                "theme": "Icon"
            });

        </script>
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div>
    </div>
</div>
</body>
</html>
