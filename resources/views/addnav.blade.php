@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>自定义导航栏</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="/nav" class="actionBtn">返回列表</a>自定义导航栏</h3>
            <script type="text/javascript">
     
     $(function(){ $(".idTabs").idTabs(); });
     
    </script>
    <div class="idTabs">
      <ul class="tab">
        <li><a href="#nav_add">添加导航</a></li>
      </ul>
      <div class="items">
        <div id="nav_add">
         <form action="/addnav" method="post" enctype="multipart/form-data">
          <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableBasic">
           <tr>
            <td width="80" height="35" align="right">系统内容</td>
            <td>
             <select name="nav_menu" onchange="change('nav_name', this)">
              <option value="">请您选择链接项目</option>
                            <option value="1" title="公司简介">- 公司简介</option>
                            <option value="2" title="企业荣誉">-- 企业荣誉</option>
                            <option value="3" title="发展历程">-- 发展历程</option>
                            <option value="4" title="联系我们">-- 联系我们</option>
                            <option value="5" title="人才招聘">- 人才招聘</option>
                            <option value="6" title="营销网络">- 营销网络</option>
                           </select>
            </td>
           </tr>
           <tr>
            <td width="80" height="35" align="right">导航名称</td>
            <td>
             <input type="text" id="nav_name" name="nav_name" value="" size="40" class="inpMain" />
            </td>
           </tr>
              <tr>
                  <td width="80" height="35" align="right">导航图片</td>
                      <td><input type="file" name="photo" class="inpFlie" /></td>
              </tr>
           </tr>
           <tr>
            <td height="35" align="right">排序</td>
            <td>
             <input type="text" name="sort" value="50" size="5" class="inpMain" />
            </td>
              </tr>
           <tr>
            <td></td>
            <td>
             <input class="btn" type="submit" value="提交" />
            </td>
           </tr>
          </table>
         </form>
        </div>
      </div>
    </div>
</div>
@endsection