@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>文章列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;"><h3><a href="/addarticle" class="actionBtn add">添加文章</a>文章列表</h3>
    <div class="filter">
    <form action="article.php" method="post">
     <select name="cat_id" id="checks" onchange="check()">
      <option value="0">未分类</option>
         @foreach($type as $v)
             <option value="{{$v->tid}}">{{$v->type_name}}</option>
         @endforeach
     </select>
         <script>
             function check() {
                 var id = $("#checks").find("option:selected").val();
                 $.ajax({
                     type:'post',
                     url:"/searchs",
                     data:{'id':id,'_token': "{{ csrf_token() }}"},
                     success:function (list){
                        $("#span").html(list);
                     }
                 })
             }
         </script>
     <input name="keyword" type="text" class="inpMain" value="" size="20" />
     <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
    <span>
        <a class="btnGray" href="article.php?rec=sort">开始筛选首页文章</a>
        </span>
    </div>
        <div id="list">
    <form name="action" method="post" action="article.php?rec=action">
        <div id="span">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" id="table">
     <tr>
      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
      <th width="40" align="center">编号</th>
      <th align="left">文章名称</th>
      <th width="150" align="center">文章分类</th>
      <th width="80" align="center">添加日期</th>
      <th width="80" align="center">操作</th>
     </tr>

        @foreach($list as $v)
          <tr>
          <td align="center"><input type="checkbox" name="checkbox[]" value="{{$v->aid}}" /></td>
          <td align="center">{{$v->aid}}</td>
          <td><a href="article.php?rec=edit&id=10">{{$v->article_name}}</a></td>
          <td align="center"><a href="article.php?cat_id=1">{{$v->type_name}}</a></td>
          <td align="center">{{$v->create_time}}</td>
          <td align="center">
          <a href="editarticle/{{$v->aid}}">编辑</a> | <a href="articledel/{{$v->aid}}">删除</a>
          </td>
     </tr>
       @endforeach


        </div>
         </table>
        <div style="text-align: center">{{$list->render()}}</div>
    <div class="action">
     <select name="action" onchange="douAction()">
      <option value="0">请选择...</option>
      <option value="del_all">删除</option>
      <option value="category_move">移动分类至</option>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0">未分类</option>
                  <option value="1"> 公司动态</option>
                        <option value="2"> 行业新闻</option>
                 </select>
     <input name="submit" class="btn" type="submit" value="执行" />
    </div>
    </form>
    </div>
 </div>
@endsection