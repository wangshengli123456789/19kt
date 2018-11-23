@extends('layouts.master')

@section('content')
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>角色权限管理</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="manager.blade.php" class="actionBtn">返回列表</a>角色权限管理</h3>
   <form action="/rolessetrule" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <input type="hidden" name="id" value="{{$id}}">
       <td width="100" align="right">角色名称</td>
       @foreach($rule as $v)
        <td>
         <input type="checkbox" name="uid[]" value="{{$v->id}}"
            @foreach($rules as $k)
                @if($k==$v->id)
                 checked="checked"
                @endif
           @endforeach>{{$v->type_name}}<br>
        </td>
       @endforeach

      </tr>
      <tr>
       <td width="100" align="right"></td>
       <td>
        <input type="submit" class="btn" value="提交" />
       </td>
      </tr>
     </table>

    </form>
                   </div>
 </div>
@endsection