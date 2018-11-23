@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>修改课程</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="/proindex" class="actionBtn">课程列表</a>修改课程</h3>
    <form action="/proedit/{{$data->cid}}" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right">课程名称</td>
       <td>
        <input type="text" name="classname" value="{{$data->classname}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">交流群组</td>
       <td>
        <input type="text" name="writegroup" value="{{$data->writegroup}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">开始有效时间</td>
       <td>
        <input type="date" name="useful_time" value="{{$data->useful_time}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">结束有效时间</td>
       <td>
        <input type="date" name="useful_time" value="{{$data->useful_time}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">原价</td>
       <td>
        <input type="text" name="old_price" value="{{$data->old_price}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">现价</td>
       <td>
        <input type="text" name="new_price" value="{{$data->new_price}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">地区分类</td>
       <td>
        <select name="address_id">
         @foreach($typess as $k=>$v)
          <option value="{{$v->id}}"@if($data->address_id==$v->id)selected="selected"@endif>{{str_repeat('&nbsp;',$v->level*5)}}{{$v->address}}</option>
         @endforeach
        </select>
       </td>
      </tr>
      <tr>
       <td align="right">课程分类</td>
       <td>
        <select name="cat_id">
         @foreach($types as $k=>$v)
          <option value="{{$v->id}}" @if($data->cat_id==$v->id)selected="selected"@endif>{{$v->class_type}}</option>
         @endforeach
        </select>
       </td>
      </tr>
      <tr>
       <td align="right">考试分类</td>
       <td>
        <select name="exam_type">
         @foreach($type as $k=>$v)
          <option value="{{$v->id}}" @if($data->exam_type==$v->id)selected="selected"@endif>{{$v->exam_type1}}</option>
         @endforeach
        </select>
       </td>
      </tr>
            <tr>
       <td align="right" valign="top">课程简介</td>
       <td>
        <!-- KindEditor -->
			<link rel="stylesheet" href="{{asset('rbac')}}/js/kindeditor/themes/default/default.css" />
			<link rel="stylesheet" href="{{asset('rbac')}}/js/kindeditor/plugins/code/prettify.css" />
			<script charset="utf-8" src="{{asset('rbac')}}/js/kindeditor/kindeditor.js"></script>
			<script charset="utf-8" src="{{asset('rbac')}}/js/kindeditor/lang/zh_CN.js"></script>
			<script charset="utf-8" src="{{asset('rbac')}}/js/kindeditor/plugins/code/prettify.js"></script>
        <script>
					KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="content"]', {
							cssPath : '../plugins/code/prettify.css',
							uploadJson : '../php/upload_json.php',
							fileManagerJson : '../php/file_manager_json.php',
							allowFileManager : true,
							afterCreate : function() {
								var self = this;
								K.ctrl(document, 13, function() {
									self.sync();
									K('form[name=example]')[0].submit();
								});
								K.ctrl(self.edit.doc, 13, function() {
									self.sync();
									K('form[name=example]')[0].submit();
								});
							}
						});
						prettyPrint();
					});
			</script>
        <!-- /KindEditor -->
        <textarea id="content" name="content" style="width:780px;height:400px;" class="textArea">{{$data->content}}</textarea>
       </td>
      </tr>
      <tr>
       <td align="right">缩略图</td>
       <td>
        <input type="file" name="img" size="38" class="inpFlie" />
        <img src="{{asset('rbac')}}/images/icon_no.png"></td>
      </tr>
      <tr>
       <td></td>
       <td>
        {{csrf_field()}}
        <input name="submit" class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
</div>
@endsection
