<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{asset('rbac')}}/js/jquery.min.js"></script>
</head>
<body>
标题：<input type="text" id="title"><br>
密码：<input type="text" id="keywords"><br>
内容：<input type="text" id="content"><br>
<button onclick="add()">提交</button>
</body>
</html>
<script>
    function add() {
       var titile = $("#title").val();
       var keywords = $("#keywords").val();
       var content = $("#content").val();
       $.ajax({
           type:'post',
           url:"/ajaxadd",
           data:{title:titile,keywords:keywords,content:content},
           success:function (con) {
           }
       })
    }
</script>