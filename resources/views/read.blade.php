<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('rbac')}}/js/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <table border="1">
        @foreach($list as $k=>$v)
            <tr>
                <td>{{$v->title}}</td>
                <td>{{$v->keywords}}</td>
                <td>{{$v->content}}</td>
                <td><a href="javascript:void(0)" onclick="deletes({{$v->id}})">删除</a></td>
                <td><a href="javascript:void(0)" onclick="updates({{$v->id}})">修改</a></td>
            </tr>
        @endforeach
    </table>
<button onclick="read()">显示</button>
</body>
</html>
<script>
    function deletes(id){
        $.ajax({
            type:'get',
            url:"http:// ",
            data:{id:id},
            success:function (con) {
                alert(con);
            }
        })
    }
    function updates(id){
        $.ajax({
            type:'get',
            url:"/ajaxupdate",
            data:{id:id},
            success:function (con) {
                alert(con);
            }
        })
    }
    function read(){
        $.ajax({
            type:'post',
            url:"http://www.laravel55.com/acticle",
            success:function (con) {
                document.write(con);
            }
        })
    }
</script>