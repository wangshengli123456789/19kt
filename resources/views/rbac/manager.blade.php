@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>角色管理</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="/roleadd" class="actionBtn">添加角色</a>角色管理</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="30" align="center">编号</th>
      <th align="left">角色名称</th>
      <th align="center">操作</th>
     </tr>
         @foreach($list as $v)
         <tr>
      <td align="center">{{$v->rid}}</td>
      <td>{{$v->role_name}}</td>
      <td align="center"><a href="/setrules/{{$v->rid}}">设置权限</a> | <a href="/readrule/{{$v->rid}}">查看权限</a> | <a href="/deleterole/{{$v->rid}}">删除</a></td>
     </tr>
          @endforeach
         </table>
</div>
@endsection