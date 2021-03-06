@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="product_category.php" class="actionBtn">商品分类</a>添加分类</h3>
    <form action="/productsave/{{$id}}" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       {{csrf_field()}}
       <td width="80" align="right">分类名称</td>
       <td>
        <input type="text" name="cat_name" value="{{$data->cat_name}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">别名</td>
       <td>
        <input type="text" name="byname" value="{{$data->byname}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">上级分类</td>
       <td>
        <select name="parent_id">
         <option value="0">无</option>
         @foreach($type as $k=>$v)
          <option value="{{$v->id}}"@if($data->parent_id==$v->id)selected="selected"@endif>{{str_repeat('&nbsp;',$v->level*5)}}{{$v->cat_name}}</option>
         @endforeach
        </select>
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
        <input name="submit" class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
       </div>
 </div>
@endsection