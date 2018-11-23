@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="/addrRead" class="actionBtn">地区分类</a>添加分类</h3>
    <form action="/addrAdd" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       {{csrf_field()}}
       <td width="80" align="right">地区名称</td>
       <td>
        <input type="text" name="address" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">添加时间</td>
       <td>
        <input type="date" name="create_time" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">上级分类</td>
       <td>
        <select name="parent_id">
         <option value="0">无</option>
         @foreach($list as $k=>$v)
          <option value="{{$v->id}}">{{str_repeat('&nbsp;',$v->level*5)}}{{$v->address}}</option>
         @endforeach
        </select>
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