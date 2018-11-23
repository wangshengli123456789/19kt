@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>文章分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="/articleadd" class="actionBtn add">添加分类</a>文章分类</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
        <th width="120" align="left">分类名称</th>
      <th align="left">别名</th>
        <th align="left">简单描述</th>
       <th width="60" align="center">排序</th>
        <th width="80" align="center">操作</th>
      </tr>
        @foreach($list as $v)
            <tr>
                <td align="left"> <a href="article.php?cat_id=1">{{$v->type_name}}</a></td>
                <td>{{$v->byname}}</td>
                <td>{{$v->description}}</td>
                <td align="center">{{$v->sort}}</td>
                <td align="center"><a href="articleedit/{{$v->tid}}">编辑</a> | <a href="/articletypedel/{{$v->tid}}">删除</a></td>
            </tr>
        @endforeach

          </table>
           </div>
 @endsection