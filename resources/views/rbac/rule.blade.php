@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>权限管理</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="/ruleadd" class="actionBtn">添加权限</a>权限管理</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="30" align="center">编号</th>
      <th align="left">权限名称</th>
      <th align="center">操作</th>
     </tr>
         @foreach($list as $v)
         <tr>
      <td align="center">{{$v->id}}</td>
      <td>{{$v->type_name}}</td>
      <td align="center"><a href="javascript:void(0)">编辑</a> | <a href="/deleterule/{{$v->id}}">删除</a></td>
     </tr>
          @endforeach
         </table>
                       </div>
 @endsection