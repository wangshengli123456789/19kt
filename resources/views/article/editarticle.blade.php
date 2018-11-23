@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>修改文章</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="/article" class="actionBtn">文章列表</a>修改文章</h3>
    <form action="/editarticle/{{$data->aid}}" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
          {{csrf_field()}}
       <td width="90" align="right">文章名称</td>
       <td>
        <input type="text" name="article_name" value="{{$data->article_name}}" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">文章分类</td>
       <td>
        <select name="article_type">
          <option value="0">未分类</option>
            @foreach($type as $v)
             <option value="{{$v->tid}}" @if($v->tid==$data->article_type)selected="selected"@endif>{{$v->type_name}}</option>
            @endforeach
    </select>
       </td>
      </tr>
            <tr>
       <td align="right" valign="top">文章描述</td>
       <td>
        <!-- KindEditor -->
        <link rel="stylesheet" href="{{asset('rbac')}}/js/kindeditor/themes/default/default.css" />
			<link rel="stylesheet" href="{{asset('rbac')}}/js/kindeditor/plugins/code/prettify.css" />
			<script charset="utf-8" src="{{asset('rbac')}}/js/kindeditor/kindeditor.js"></script>
			<script charset="utf-8" src="{{asset('rbac')}}/js/kindeditor/lang/zh_CN.js"></script>
			<script charset="utf-8" src="{{asset('rbac')}}/js/kindeditor/plugins/code/prettify.js"></script>
        <script>
					KindEditor.ready(function(K) {
						var editor1 = K.create('textarea[name="article_bywrite"]', {
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
        <textarea id="content" name="article_bywrite" style="width:780px;height:400px;" class="textArea">{{$data->article_bywrite}}</textarea>
       </td>
      </tr>
      <tr>
       <td align="right">来源</td>
       <td>
        <input type="text" name="article_from" size="38" class="inpMain" value="{{$data->article_from}}"/>
        <img src="{{asset('rbac')}}/images/icon_no.png"></td>
      </tr>
      <tr>
       <td align="right">关键字</td>
       <td>
        <input type="text" name="keyword" value="{{$data->keyword}}" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">简单描述</td>
       <td>
        <input type="text" name="description" value="{{$data->description}}" size="50" class="inpMain" />
       </td>
      </tr>
      <tr>
          <td></td>
       <td><input type="date" name="create_time" value="{{$data->create_time}}"></td>
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
@endsection