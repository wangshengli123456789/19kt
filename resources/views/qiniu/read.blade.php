@extends('layouts.master')

@section('content')
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>上传管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3>七牛云上传</h3>
        <div class="navList">
     <table width="100%" border="0" cellpadding="10" cellspacing="0" class="tableBasic">
      <tr>
       <th width="113" align="center">课程名称</th>
       <th width="113" align="center">视频名称</th>
       <th width="113" align="center">目录名称</th>
       <th width="80" align="center">视频路径</th>
       <th width="80" align="center">添加时间</th>
       <th width="120" align="center">操作</th>
      </tr>
         @foreach($list as $k=>$v)
             <tr>
                 <td> {{$v->classname}}</td>
                 <td><a href="">{{$v->video_name}}</a></td>
                 <td><a href="">{{$v->unit}}</a></td>
                 <td><a href="{{$v->video_url}}">{{$v->video_url}}</a></td>
                 <td>{{$v->create_time}}</td>
                 <td align="center"><a href="javascript:void(0)">编辑</a> | <a href="/dirDel/{{$v->id}}">删除</a></td>
             </tr>
         @endforeach

     </table>
    </div>
   </div>
 </div>
@endsection