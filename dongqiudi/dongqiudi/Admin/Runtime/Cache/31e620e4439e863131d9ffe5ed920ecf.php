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

<style type="text/css">
</style>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加球队</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="" enctype="multipart/form-data">  
        <input type="hidden" name="user_id" value="<?php echo ($_SESSION['user_id']); ?>">
        <div class="form-group">
            <div class="label">
                <label>所属联赛</label>
            </div>
            <div class="field">
                <select name="league" id="league" class="form-control" style="width:8%;" onchange="showOptions(this.value);">
                    <option class="input" value = "0">--请选择--</option>
                    <option class="input" value = "中超" <?php if($edit_team["league"] == '中超'): ?>selected<?php endif; ?>>中超</option>
					
					<option class="input" value = "英超" <?php if($edit_team["league"] == '英超'): ?>selected<?php endif; ?>>英超</option>
                    <option class="input" value = "西甲" <?php if($edit_team["league"] == '西甲'): ?>selected<?php endif; ?>>西甲</option>
                    <option class="input" value = "德甲" <?php if($edit_team["league"] == '德甲'): ?>selected<?php endif; ?>>德甲</option>
                    <option class="input" value = "意甲" <?php if($edit_team["league"] == '意甲'): ?>selected<?php endif; ?>>意甲</option>
                    <option class="input" value = "法甲" <?php if($edit_team["league"] == '法甲'): ?>selected<?php endif; ?>>法甲</option>
                </select>
                <div class="tips"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label>是否参加杯赛</label>
            </div>
            <div class="field">
                <select name="cup" id="cup" class="form-control" style="width:8%;">
                    <option class="input" value = "0" <?php if($edit_team["cup"] == '0'): ?>selected=selected<?php endif; ?>>--请选择--</option>
                    <option class="input" value = "欧冠" <?php if($edit_team["cup"] == '欧冠'): ?>selected=selected<?php endif; ?>>欧冠</option>
                    <option class="input" value = "亚冠" <?php if($edit_team["cup"] == '亚冠'): ?>selected=selected<?php endif; ?>>亚冠</option>
                </select>
                <div class="tips"></div>
            </div>
        </div>
       
      <div class="form-group">
        <div class="label">
          <label>球队名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($edit_team["name"]); ?>" name="name" data-validate="required:请输入球队名称" />
          <div class="tips"></div>
        </div>
      </div>
	  
		<div class="form-group">
			<div class="label">
				<label>球队队徽：</label>
			</div>
			<div class="field">
				<div id="preview">
					<img id="imghead" border="0" src="__PUBLIC__/image/photo_icon.png" width="90" height="90" onclick="$('#previewImg').click();">
				</div>         
				<input type="file" name="icon" onchange="previewImage(this)" style="display: none;" id="previewImg">
			</div>
		</div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<link rel="stylesheet" href="__PUBLIC__/uploadify/uploadify.css"> 
<script src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script> 
<script type="text/javascript"> 
//上传插件 
<!-- $(function() {  -->
    <!-- $('#file_upload').uploadify({  -->
        <!-- 'swf'      : '__PUBLIC__/uploadify/uploadify.swf',  -->
        <!-- 'uploader' : '<?php echo U("index/add_team");?>',  -->
        <!-- 'buttonText' : '缩略图上传',  -->
        <!-- 'onUploadSuccess' : function(file, data, response) {  -->
            <!-- $('#img').attr('src','__ROOT__/uploads/'+ data);  -->
            <!-- $('#images').val(data);  -->
        <!-- },  -->
    <!-- });  -->
    //图二 
     <!-- $('#file_upload2').uploadify({  -->
        <!-- 'swf'      : '__PUBLIC__/uploadify/uploadify.swf',  -->
        <!-- 'uploader' : '<?php echo U("News/uploadify");?>',  -->
        <!-- 'buttonText' : '图片二上传',  -->
        <!-- 'onUploadSuccess' : function(file, data, response) {  -->
            <!-- $('#img2').attr('src','__ROOT__/uploads/'+ data);  -->
            <!-- $('#images2').val(data);  -->
        <!-- },  -->
    <!-- });  -->
<!-- });  -->
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
<script type="text/javascript">
    var arr=new Array();
    arr[0]=["--请选择--"];
    arr[1]=["--请选择--","亚冠"];
    arr[2]=["--请选择--","欧冠"];
    arr[3]=["--请选择--","欧冠"];
    arr[4]=["--请选择--","欧冠"];
    arr[5]=["--请选择--","欧冠"];
    arr[6]=["--请选择--","欧冠"];
function showOptions(str){
    var xmlHttp;
    if(window.XMLHttpRequest){
        xmlHttp=new XMLHttpRequest();
    }else{
        xmlHttp=ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlHttp.onreadystatechange=function(){
        if(xmlHttp.readystate==4&&xmlHttp.status==200){
            document.getElementById("cup").innerHTML=xmlHttp.responseText;
        }
    }
    xmlHttp.open("GET","cup.jsp",true);  
    xmlHttp.send();
    var setObj = document.getElementById("cup");
    while(setObj.childNodes.length>0){
        setObj.removeChild(setObj.firstChild);
    }
    var index=document.getElementById("league").selectedIndex;
    var data=arr[index];
    for(var i=0;i<data.length;i++){
        var obj=document.createElement("option");
        obj.innerHTML = data[i];
        document.getElementById("cup").appendChild(obj);
    }
}
</script>
</body>
</html>