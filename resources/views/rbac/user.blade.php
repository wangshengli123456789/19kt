@extends('layouts.master')

  @section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="/useradd" class="actionBtn">添加管理员</a>网站管理员</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="30" align="center">编号</th>
      <th align="left">管理员名称</th>
      <th align="center">E-mail地址</th>
      <th align="center">手机号</th>
      <th align="center">操作</th>
     </tr>
         @foreach($list as $v)
         <tr>
      <td align="center">{{$v->id}}</td>
      <td>{{$v->username}}</td>
      <td align="center">{{$v->email}}</td>
      <td align="center">{{$v->telphone}}</td>
      <td align="center"><a href="/userrole/{{$v->id}}">设置角色</a> | <a href="/readroles/{{$v->id}}">查看角色</a> | <a href="deleteuser/{{$v->id}}">删除</a></td>
     </tr>
          @endforeach
         </table>
                       </div>
 @endsection
