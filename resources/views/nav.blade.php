@extends('layouts.master')

@section('content')
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>自定义导航栏</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="/addnav" class="actionBtn">添加导航</a>自定义导航栏</h3>
        <div class="navList">
     <ul class="tab">
      <li><a href="/nav" class="selected">导航</a></li>
     </ul>
     <table width="100%" border="0" cellpadding="10" cellspacing="0" class="tableBasic">
      <tr>
       <th width="113" align="center">导航名称</th>
       <th width="80" align="center">导航图片</th>
       <th align="left">系统名称</th>
       <th width="80" align="center">排序</th>
       <th width="120" align="center">操作</th>
      </tr>
         @foreach($list as $k=>$v)
             <tr>
                 <td> {{$v->nav_menu}}</td>
                 <td><img src="{{asset('navuploads')}}{{$v->photo}}" alt="" width="70" height="50"></td>
                 <td>{{$v->nav_name}}</td>
                 <td align="center">{{$v->sort}}</td>
                 <td align="center"><a href="/navsave/{{$v->id}}">编辑</a> | <a href="navdel/{{$v->id}}">删除</a></td>
             </tr>
         @endforeach

     </table>
    </div>
   </div>
 </div>
@endsection