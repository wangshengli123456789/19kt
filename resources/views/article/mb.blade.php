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
                    <a href="article.php?rec=edit&id=10">编辑</a> | <a href="articledel/{{$v->aid}}">删除</a>
                </td>
            </tr>
        @endforeach