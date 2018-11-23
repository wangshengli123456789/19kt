@extends('layouts.master')

@section('content')
<div id="urHere">DouPHP 管理中心<b>></b><strong>七牛云上传</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="/uploadshow" class="actionBtn">返回列表</a>七牛云上传</h3>
            <script type="text/javascript">
     
     $(function(){ $(".idTabs").idTabs(); });
     
    </script>
    <div class="idTabs">
      <ul class="tab">
        <li><a href="/upload">上传</a></li>
      </ul>
      <div class="items">
        <div id="nav_add">
         <form action="/upload" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
          <table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableBasic">
              <tr>
                  <td width="90" align="right">视频名称</td>
                  <td>
                      <input type="text" name="video_name" value="" size="80" class="inpMain" />
                  </td>
              </tr>
              <tr>
                  <td width="90" align="right">添加时间</td>
                  <td>
                      <input type="date" name="create_time" value="" size="80" class="inpMain" />
                  </td>
              </tr>
              <td align="right">所属目录</td>
              <td>
                  <select name="dir_id">
                      @foreach($type as $k=>$v)
                          <option value="{{$v->id}}">{{$v->unit}}</option>
                      @endforeach
                  </select>
              </td>
              </tr>
              <tr>
                  <td width="80" height="35" align="right">选择文件</td>
                      <td><input type="file" name="file" class="inpFlie" /></td>
              </tr>
          </table>
             <input type="hidden" name="class_id" value="{{$id}}">
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