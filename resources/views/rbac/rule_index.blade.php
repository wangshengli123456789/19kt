@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>权限管理</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3>权限显示</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th align="left">角色名称</th>
         <th>权限名称</th>
     </tr>
         @foreach($list as $v)
         <tr>
      <td>{{$v->role_name}}</td>
      <td>{{$v->type_name}}</td>
     </tr>
          @endforeach
         </table>
                       </div>
 @endsection