@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="manager.html" class="actionBtn">返回列表</a>网站管理员</h3>
   <form action="/useradd" method="post">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <td width="100" align="right">管理员名称</td>
      <td>
       <input type="text" name="username" size="40" class="inpMain" />
      </td>
     </tr>
     <tr>
      <td width="100" align="right">E-mail地址</td>
      <td>
       <input type="text" name="email" size="40" class="inpMain" />
      </td>
     </tr>
     <tr>
      <td width="100" align="right">手机号</td>
      <td>
       <input type="text" name="telphone" size="40" class="inpMain" />
      </td>
     </tr>
     <tr>
      <td align="right">密码</td>
      <td>
       <input type="password" name="password" size="40" class="inpMain" />
      </td>
     </tr>
     <tr>
      <td></td>
      <td>
       <input type="submit" class="btn" value="提交" />
      </td>
     </tr>
    </table>
   </form>
  </div>
@endsection