@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>首页幻灯广告</strong> </div>   <div class="mainBox imgModule">
    <h3>首页幻灯广告</h3><a href="/imgshow">显示幻灯片</a>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
    <tr>
       <th>添加幻灯</th>
       <th>幻灯列表</th>
     </tr>
     <tr>
      <td width="350" valign="top">
       <form action="show" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
         <tr>
          <td><b>幻灯名称</b>
<input type="text" name="show_name" value="" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td><b>幻灯图片</b>
           <input type="file" name="show_img" class="inpFlie" /></td>
         </tr>
         <tr>
          <td><b>链接地址</b>
           <input type="text" name="show_link" value="" size="40" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td><b>排序</b>
<input type="text" name="sort" value="50" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td>
           <input class="btn" type="submit" value="提交" />
          </td>
         </tr>
        </table>
       </form>
      </td>
      <td valign="top">
       <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
        <tr>
            <td>幻灯图片</td>
         <td width="100">幻灯名称</td>

         <td width="50" align="center">排序</td>
         <td width="80" align="center">操作</td>
        </tr>
           @foreach($list as $v)
          <tr>
             <td><a href="{{$v->show_link}}" target="_blank"><img src="{{asset('uploads')}}{{$v->show_img}}" width="80" />{{$v->show_link}}</a></td>
             <td>{{$v->show_name}}</td>
             <td align="center">{{$v->sort}}</td>
             <td align="center"><a href="showedit/{{$v->pid}}">编辑</a> | <a href="/delshowimg/{{$v->pid}}">删除</a></td>
          </tr>
           @endforeach

       </table>
      </td>
     </tr>
    </table>
    <p>{{$list->render()}}</p>
   </div>
@endsection