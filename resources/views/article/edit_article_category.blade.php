@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>修改分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="/article_category" class="actionBtn">文章分类</a>修改分类</h3>
    <form action="/articleedit/{{$data->tid}}" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       {{csrf_field()}}
       <td width="80" align="right">分类名称</td>
       <td>
        <input type="text" name="type_name" value="{{$data->type_name}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">别名</td>
       <td>
        <input type="text" name="byname" value="{{$data->byname}}" size="40" class="inpMain" />
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
        <input type="text" name="keywords" value="{{$data->keywords}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">简单描述</td>
       <td>
        <textarea name="description" cols="60" rows="4" class="textArea">{{$data->description}}</textarea>
       </td>
      </tr>
      <tr>
       <td align="right">排序</td>
       <td>
        <input type="text" name="sort" value="{{$data->sort}}" size="5" class="inpMain" />
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