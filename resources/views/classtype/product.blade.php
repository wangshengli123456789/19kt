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
<div id="urHere">DouPHP 管理中心<b>></b><strong>课程列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="/proadd" class="actionBtn add">添加课程</a>课程列表</h3>
    <div class="filter">
    <form action="/producttype" method="post">
        {{csrf_field()}}
        <select name="cat_id">
            <option value="0">未分类</option>
            @foreach($types as $k=>$v)
                <option value="{{$v->id}}">{{$v->class_type}}</option>
            @endforeach
        </select>
     <input name="keyword" type="text" class="inpMain" value="" size="20" />
     <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
    <span>
    <a class="btnGray" href="/uploadshow">显示目录以及视频</a>
        <a class="btnGray" href="product.php?rec=sort">开始筛选首页商品</a>
        </span>
    </div>
        <div id="list">
    <form name="action" method="post" action="{{url('deleteall')}}">
        {{csrf_field()}}
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
        <th width="40" align="center">编号</th>
        <th align="left">课程名称</th>
         <th width="80" align="center">课程分类</th>
         <th width="80" align="center">地区分类</th>
         <th width="80" align="center">考试分类</th>
        <th width="80" align="center">课程图片</th>

        <th width="80" align="center">课程现价</th>
        <th width="80" align="center">课程原价</th>
        <th width="80" align="center">交流群组</th>
       <th width="80" align="center">添加日期</th>
       <th width="100" align="center" colspan="2">
       状态</th>
        <th width="80" align="center">操作</th>
      </tr>
        @foreach($list as $k=>$v)
            <tr>
                <td align="center"><input type="checkbox" name="checkbox[]" value="{{$v->cid}}" /></td>
                <td align="center">{{$v->cid}}</td>
                <td><a href="product.php?rec=edit&id=1">{{$v->classname}}</a></td>
                <td>{{$v->class_type}}</td>
                <td>{{$v->address}}</td>
                <td>{{$v->exam_type1}}</td>
                <td><img src="{{$v->img}}" alt="" width="40" height="40"></td>
                <td align="center">{{$v->new_price}}</td>
                <td align="center">{{$v->old_price}}</td>
                <td align="center">{{$v->writegroup}}</td>
                <td align="center">{{$v->create_time}}</td>
                <td align="center"><td><input type="checkbox" class="c1" name="l" @if($v->status=='1')checked @endif onclick="statussaves({{$v->cid}},{{$v->status}})"></td>
                <td align="center">
                    <a href="proedit/{{$v->cid}}">编辑</a> | <a href="prodel/{{$v->cid}}">删除</a> | <a href="setDir/{{$v->cid}}">设置目录</a>
                </td>
            </tr>
        @endforeach

          </table>
    <div class="action">
     <select name="action" onchange="douAction()">
      <option value="0">请选择...</option>
      <option value="del_all">删除</option>
      <option value="category_move">移动分类至</option>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0">未分类</option>
         @foreach($types as $k=>$v)
             <option value="{{$v->id}}">{{$v->class_type}}</option>
         @endforeach
                 </select>
     <input name="submit" class="btn" type="submit" value="执行" />
    </div>
    </form>
    </div><!-- dcFooter 结束 -->
<div class="clear"></div>
    @endsection
</div>
<script type="text/javascript">

onload = function()
{
 document.forms['action'].reset();
}

function douAction()
{
 var frm = document.forms['action'];
 frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
}

</script>
</body>


</html>
    <script type="text/javascript">
        $(".c1").simpleSwitch({
            "theme": "Default"
        });
        function statussaves(id,status) {
            //获取value值
            $.ajax({
                type:"get",
                url:"/statusSave",
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

