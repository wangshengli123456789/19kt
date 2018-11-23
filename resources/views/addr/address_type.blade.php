@extends('layouts.master')

@section('content')
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="favicon.ico">
        <script src="http://www.jq22.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('onoff')}}/js/simple.switch.js"></script>
        <link rel="stylesheet" href="{{asset('onoff')}}/css/simple.switch.three.css" type="text/css">
    </head>
<div id="urHere">DouPHP 管理中心<b>></b><strong>地区分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="/addrAdd" class="actionBtn add">添加地区</a>地区分类</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th width="120" align="left">地区名称</th>
        <th align="left">添加时间</th>
        <th align="left" width="150">状态</th>
        <th width="80" align="center">操作</th>
     </tr>
        @foreach($list as $k=>$v)
            <tr>
                <td align="left"> <a href="#">{{str_repeat('&nbsp;',$v->level*4)}}{{$v->address}}</a></td>
                <td>{{$v->create_time}}</td>
                <td><input type="checkbox" class="c1" name="l" @if($v->status=='1')checked @endif onclick="statussave({{$v->id}},{{$v->status}})"></td>
                <td align="center"><a href="addrSave/{{$v->id}}">编辑</a> | <a href="addrDel/{{$v->id}}">删除</a></td>
            </tr>
        @endforeach

    </table>
</div>
 </div>
@endsection
    <script type="text/javascript">
        $(".c1").simpleSwitch({
            "theme": "Default"
        });
        function statussave(id,status) {
            //获取value值
            $.ajax({
                type:"get",
                url:"/addressstatusSave",
                data:{
                    id:id,
                    status:status
                },
                success:function(e) {
                    console.log(e);
                }
            })

        }
    </script>
    </html>