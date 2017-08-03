<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="__PUBLIC__/css/pintuer.css">
    <link rel="stylesheet" href="__PUBLIC__/css/admin.css">
    <link rel="stylesheet" href="__PUBLIC__/css/style.css">
    <!-- <link rel="stylesheet" href="__PUBLIC__/css/amazeui/amazeui.min.css"> -->
	
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
    <script src="__PUBLIC__/js/jQuery.js"></script> 
    <script src="__PUBLIC__/js/pintuer.js"></script>  
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/layer/layer.js"></script>
</head>

<style>
.form-horizontal .form-group{
	margin-right: 0px;
	margin-left: 0px;
}
.body-content {
	padding:0px 0px;
}
.admin{
    padding:0px!important; 
}

</style>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x form-horizontal" action="" enctype="multipart/form-data">  
        <input type="hidden" name="user_id" value="<?php echo ($_SESSION['user_id']); ?>">
		<div class="form-group" >
			<div class="form-group" style="margin-top:3%;">
				<div class="label">
					<label>所属类型</label>
				</div>
				<div class="field">
					<select name="news_level" class="form-control" style="width: 20%;">
						<option class="input" value = "2" <?php if($result["news_level"] == '2'): ?>selected<?php endif; ?>>集锦</option>
						<option class="input" value = "3" <?php if($result["news_level"] == '3'): ?>selected<?php endif; ?>>视频</option>
						<option class="input" value = "4" <?php if($result["news_level"] == '4'): ?>selected<?php endif; ?>>国内</option>
						<option class="input" value = "5" <?php if($result["news_level"] == '5'): ?>selected<?php endif; ?>>深度</option>
						<option class="input" value = "6" <?php if($result["news_level"] == '6'): ?>selected<?php endif; ?>>闲情</option>
						<option class="input" value = "7" <?php if($result["news_level"] == '7'): ?>selected<?php endif; ?>>英超</option>
						<option class="input" value = "8" <?php if($result["news_level"] == '8'): ?>selected<?php endif; ?>>西甲</option>
						<option class="input" value = "9" <?php if($result["news_level"] == '9'): ?>selected<?php endif; ?>>德甲</option>
						<option class="input" value = "10" <?php if($result["news_level"] == '10'): ?>selected<?php endif; ?>>意甲</option>
						<option class="input" value = "11" <?php if($result["news_level"] == '11'): ?>selected<?php endif; ?>>五洲</option>
						<option class="input" value = "12" <?php if($result["news_level"] == '12'): ?>selected<?php endif; ?>>专题</option>
						<option class="input" value = "13" <?php if($result["news_level"] == '13'): ?>selected<?php endif; ?>>装备</option>
					</select>
					<div class="tips"></div>
				</div>
			</div>
		  <div class="form-group">
			<div class="label">
			  <label>标题：</label>
			</div>
			<div class="field">
			  <input type="text" class="input w50" value="<?php echo ($result["title"]); ?>" name="title" data-validate="required:请输入标题" />
			  <div class="tips"></div>
			</div>
		  </div>
		  <div class="form-group" >
			<div class="label"style="float:left;">
			  <label>来源：</label>
			</div>
			<div class="field" style="">
			  <input type="text" class="input w50" value="<?php echo ($result["copyfrom"]); ?>"  name="copyfrom" value="" />
			</div>
		  </div>
		  <div class="form-group">
			<div class="label">
			  <label>视频缩略图：</label>
			</div>
			<div class="field">
				<div id="preview">
					<img id="imghead" border="0" src="__PUBLIC__/image/photo_icon.png" width="90" height="90" onclick="$('#previewImg').click();">
				</div>         
				<input type="file" name="video_thumb" onchange="previewImage(this)" style="display: none;" id="previewImg">
			</div>
		  </div> 
		  
		   <div class="form-group">
			<div class="label">
			  <label>内容：</label>
			</div>
			<div class="field" style="padding-left: 10%;">
			  <textarea name="content" value="" id="EditorId" data-validate="required:内容不能为空"><?php echo ($result["content"]); ?> </textarea>
			  <div class="tips"></div>
			</div>
		  </div> 
			<div class="form-group" style="margin:-1% 0% 0% 10%;">
				<label>
					<input name="add_introduce" value="1" checked="" type="checkbox">
					是否截取内容
				</label>
				<input class="input-text" name="introcude_length" value="200" size="3" type="text">
					字符至内容摘要
				<label>
					<input name="auto_thumb" value="1" checked="" type="checkbox">
					是否获取内容第
				</label>
				<input class="input-text" name="auto_thumb_no" value="1" size="2" type="text">
				张图片作为标题图片 
			</div>
			<div class="form-group" style="margin-left:10%;">
				<tr>
					<th width="80"> 推荐位	  </th>&nbsp;&nbsp;&nbsp;&nbsp;
					<td>
					
					
					<?php if(is_array($jis)): $i = 0; $__LIST__ = $jis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["name"]); ?><input type="checkbox" name="syt[]" value="<?php echo ($vo["id"]); ?>" <?php foreach($xz as $v){if($v['jishuid']==$vo['id']){ echo "checked";}} ?>>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
					
					
						<!-- <input type='hidden' name='position' value='-1'> -->
						<label class="ib" style="width:116px">
							<input type="checkbox" name='position[]' id="_1"  value="1" <?php if(1 == $result['position']): ?>checked="checked"<?php endif; ?>> 首页头条推荐
						</label>
						<label class="ib" style="width:134px">
							<input type="checkbox" name='position[]' id="_2"  value="2" <?php if(2 == $result['position']): ?>checked="checked"<?php endif; ?>> 首页焦点图推荐
						</label>
						<label class="ib" style="width:148px">
							<input type="checkbox" name='position[]' id="_3"  value="4" <?php if(3 == $result['position']): ?>checked="checked"<?php endif; ?>> 视频首页头条推荐
						</label>
						<label class="ib" style="width:132px">
							<input type="checkbox" name='position[]' id="_4"  value="5" <?php if(4 == $result['position']): ?>checked="checked"<?php endif; ?>> 视频首页焦点图
						</label>
						<!-- <label class="ib" style="width:125px"> -->
							<!-- <input type="checkbox" name='position' id="_5"  value="5" <?php if(5 == $result['position']): ?>checked="checked"<?php endif; ?>> 栏目首页推荐 -->
						<!-- </label>  -->
					</td>
				</tr>
			</div>
		</div>
		<!-- <div class="form-group" style="border:solid 1px #ddd;float:right; width:30%;height:100%;"> -->
		
		<!-- </div> -->
      <div class="form-group" style="float:left; width:100%;" >
        <div class="field" style="padding-left:20%;">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="__PUBLIC__/ueditor/ueditor.config.js"></script> 
<script src="__PUBLIC__/ueditor/ueditor.all.js"></script> 
<script type="text/javascript" src="__PUBLIC__/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
      /*    UE.getEditor('content',{    //content为要编辑的textarea的id

          initialFrameWidth: 1400,   //初始化宽度

          initialFrameHeight: 500,   //初始化高度

  });*/
  window.UEDITOR_HOME_URL = "__PUBLIC__/ueditor/";//配置路径设定为UEditor所放的位置
     window.onload=function(){
        <!-- window.UEDITOR_CONFIG.initialFrameHeight=300;//编辑器的高度 -->
        <!-- window.UEDITOR_CONFIG.initialFrameWidth=null;//编辑器的宽度 -->
        var editor = new UE.ui.Editor({
            imageUrl : '__APP__/Editor/uploadImage',
            fileUrl : '__APP__/Editor/uploadFile',
            imagePath : '',
            filePath : '',
            imageManagerUrl:'__APP__/Editor/imageManage', //图片在线管理的处理地址
            imageManagerPath:'__ROOT__/'
        });
        editor.render("EditorId");//此处的EditorId与<textarea name="content" id="EditorId">的id值对应 </textarea>
    }

</script>
<!-- 上传视频缩略图 -->
<script>
      //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 90; 
          var MAXHEIGHT = 90;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead onclick=$("#previewImg").click()>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                
                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    </script>
</body>
</html>