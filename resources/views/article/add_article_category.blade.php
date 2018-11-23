@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="article_category.html" class="actionBtn">文章分类</a>添加分类</h3>
    <form action="/articleadd" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right">分类名称</td>
       <td>
        <input type="text" name="type_name" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">别名</td>
       <td>
        <input type="text" name="byname" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right"></td>
       <td>
       </td>
      </tr>
      <tr>
       <td align="right">关键字</td>
       <td>
        <input type="text" name="keywords" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">简单描述</td>
       <td>
        <textarea name="description" cols="60" rows="4" class="textArea"></textarea>
       </td>
      </tr>
      <tr>
       <td align="right">排序</td>
       <td>
        <input type="text" name="sort" value="" size="5" class="inpMain" />
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
@endsection