@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>课程分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="productadd" class="actionBtn add">添加分类</a>课程分类</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th width="120" align="left">分类名称</th>
        <th align="left">别名</th>
        <th align="left">简单描述</th>
       <th width="60" align="center">排序</th>
        <th width="80" align="center">操作</th>
     </tr>
        @foreach($list as $k=>$v)
            <tr>
                <td align="left"> <a href="#">{{str_repeat('&nbsp;',$v->level*4)}}{{$v->cat_name}}</a></td>
                <td>{{$v->byname}}</td>
                <td>{{$v->description}}</td>
                <td align="center">{{$v->sort}}</td>
                <td align="center"><a href="productsave/{{$v->id}}">编辑</a> | <a href="productdel/{{$v->id}}">删除</a></td>
            </tr>
        @endforeach

    </table>
</div>
 </div>
@endsection