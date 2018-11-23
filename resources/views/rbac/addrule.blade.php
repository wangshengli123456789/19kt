@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>权限管理</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="manager.blade.php" class="actionBtn">返回列表</a>权限管理</h3>
   <form action="/ruleadd" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="100" align="right">权限名称</td>
       <td>
        <input type="text" name="type_name[]" size="40" class="inpMain" />
       </td>
      </tr>
      <div class="div1"></div>
      <tr>
       <td width="100" align="right"><span onclick="roleadds()">添加权限</span></td>
       <td>
        <input type="submit" class="btn" value="提交" />
       </td>
      </tr>
     </table>

    </form>
   <script>
    function roleadds() {
        $('.div1').append("<tr>\n" +
            "       <td width=\"100\" align=\"right\">权限名称</td>\n" +
            "       <td>\n" +
            "        <input type=\"text\" name=\"type_name[]\" size=\"40\" class=\"inpMain\" />\n" +
            "       </td>\n" +
            "      </tr>");
    }
   </script>
                   </div>
@endsection