<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">      
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="baidu_union_verify" content="e375dfea1f5937c9114d7fea78c91675">
	<meta name="description" content="懂球帝提供专业足球资讯、足球视频、免费足球直播等内容，一切为了中国足球迷服务。懂不懂足球，都用懂球帝。">
	<title>懂球帝 — 足球第一门户|足球新闻|足球资讯|足球直播</title>
	<script src="__PUBLIC__/js/hm.js"></script>
	<script src="__PUBLIC__/js/jQuery.1.11.min.js"></script>
	<script src="__PUBLIC__/js/common.js"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js"></script>
	<!-- <script src="__PUBLIC__/js/layer.js"></script> -->
	<script type="text/javascript" src="__PUBLIC__/js/jQuery.js"></script>
	<script src="__PUBLIC__/js/login_register/jquery.min.js"></script>
	<script src="__PUBLIC__/js/login_register/common.js"></script>
	<!--表单验证-->
	<script src="__PUBLIC__/js/login_register/jquery.validate.min.js?var1.14.0"></script>
	<link rel="shortcut icon" href="http://tva1.sinaimg.cn/crop.0.0.1152.1152.180/006hkGimjw8exuvbmskfcj30w00w0adi.jpg" type="image/x-icon">
	<!-- <link rel="stylesheet" href="__PUBLIC__/css/login_register/style.css"> -->
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
	
	<link rel="stylesheet" href="__PUBLIC__/css/style.css">
	<link rel="stylesheet" href="__PUBLIC__/css/jPaginate.css">
	<!-- <link type="text/css" href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet" /> -->
	<style>
	#dropdown_menu a.select:hover{
		background: #212121;
		color: #2eaf95;
	}
	.header_left a{
		text-decoration:none;
	}
	</style>
</head>
<body>
<div id="header">
    <div class="header_main">
        <div class="header_left">
			<a href="http://www.dongqiudisport.top/dongqiudi/index.php?m=index&a=index" class="logo"><img src="__PUBLIC__/image/logo.png" alt=""></a>
			<a href="<?php echo U('index/index');?>"class="nav" id="index"<?php if((MODULE_NAME) == "Index"): endif; ?>>首页</a>
			<a href="<?php echo U('march/index');?>"class="nav" <?php if((MODULE_NAME) == "March"): endif; ?>>比赛</a>
			<a href="<?php echo U('video/index');?>"class="nav" <?php if((MODULE_NAME) == "Video"): endif; ?>>视频</a>
			<a href="<?php echo U('data/index');?>"class="nav" <?php if((MODULE_NAME) == "Data"): endif; ?>>数据</a>
        </div>
        <div class="header_right">
		<?php if(!empty($_SESSION['username'])): if(empty($_SESSION['headimg'])): ?><p style="margin:3px 117px 0px 0px;><a href="<?php echo U('user/personal');?>"><img src="__PUBLIC__/image/nofinding.png" style="width:30px; height:30px;"></a></p>
			<?php else: ?>
			<p style="margin:3px 117px 0px 0px;><a href="<?php echo U('user/personal');?>"><img src="<?php echo ($_SESSION['headimg']); ?>" alt="" style="width:30px; height:30px;"></a></p><?php endif; ?>
			
			<p style="margin:-56px 1px 0px 0px;">
				<ul class="nav nav-tabs" style="border-bottom: 0px solid red; margin: 6px -6px 0px 114px;">
					<li class="dropdown">
						<a class="dropdown-toggle" style="padding:0px 0px 0px 0px; background-color:#323232; border-style:none;" data-toggle="dropdown" href="javascript:void(0);"><?php echo ($_SESSION['username']); ?>
							<span class="caret"></span></a>
							<!-- <span class="badge">5</span> -->
						<ul class="dropdown-menu" id="dropdown_menu" style="background-color:#323232; min-width:100px;">
							<li style="width:50px;">
								<a style="background-color:#323232;" class="select" href="<?php echo U('user/personal');?>">个人信息</a>
							</li>
							<li style="width:50px;">
								<a style="background-color:#323232;" class="select" href="<?php echo U('User/logout');?>">退出</a>
							</li>
						</ul>
					</li>
				</ul>
			</p>
		<?php else: ?>
			<p style="margin-top:5px;"><a href="<?php echo U('User/login');?>" class="login">登录</a></p><?php endif; ?>
		</div>
    </div>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
 $(".header_left a").each(function(){ 
       $this = $(this); 
        if($this[0].href==String(window.location)){ 
            $(".header_left a").removeClass("nav_hover");	
            $this.addClass("nav_hover"); 
        }  
   });   
});  


</script> 


<link href="__PUBLIC__/css/geren.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<style>
	#touxiang{
		margin:0 auto;
	}
</style>
</head>
<body>
	<div class="mainContent" style="margin-top:90px; min-height:%60;">
		<aside>
			<div class="avatar" style="background: url(<?php echo ($result["headimg"]); ?>) no-repeat; background-size: 160px 160px">
				<a href="#"><span><?php echo ($result["username"]); ?></span></a>
			</div>
			<button type="button" style="margin-left:78px;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">个人设置</button>
			
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="margin-top:90px;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">个人信息</h4>
						</div>
						
						<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
							<div class="modal-body">
									<div class="form-group" id="touxiang" style="margin-bottom:3%;">
											<label for="inputPassword3" class="col-sm-2 control-label">头像：</label>
										<div class="field">
											<div id="preview">
												<?php if(empty($_SESSION['headimg'])): ?><img id="imghead" border="0" src="__PUBLIC__/image/photo_icon.png" width="90" height="90" onclick="$('#previewImg').click();">
												<?php else: ?>
													<img id="imghead" border="0" src="<?php echo ($result["headimg"]); ?>" width="90" height="90" onclick="$('#previewImg').click();"><?php endif; ?>
											</div>         
											<input type="file" name="headimg" onchange="previewImage(this)" style="display: none;" id="previewImg">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail3" class="col-sm-2 control-label">账号</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputEmail3" name="account" value="<?php echo ($result["account"]); ?>" readonly="readonly" placeholder="账号">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputPassword3" name="username" value="<?php echo ($result["username"]); ?>" placeholder="用户名">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
										<div class="col-sm-10">
											<input type="tel" class="form-control" id="inputPassword3" name="phone_number" value="<?php echo ($result["phone_number"]); ?>" placeholder="手机号">
										</div>
									</div>
									<div class="form-group">
										<label for="inputPassword3" class="col-sm-2 control-label">邮箱</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="inputPassword3" name="email" value="<?php echo ($result["email"]); ?>" placeholder="邮箱">
										</div>
									</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
								<button type="submit" class="btn btn-primary">保存</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</aside>
		<div class="blogitem" style="padding-left:3px;">
			<div>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">发出的评论</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">收到的评论</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" style="padding-left:3px;" id="home">
						<div id="hot_list" style="padding-top:3px;" class="conFrame">
							<dl>
							<?php if(empty($comment_data)): ?>您暂无评论哦！
							<?php else: ?>
								<?php if(is_array($comment_data)): $i = 0; $__LIST__ = $comment_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt class="cf">
										<img src="<?php echo ($vo["headimg"]); ?>" alt="">
										<h4 style="font-weight:bold;color: #000000; font-size:12px;"><?php echo ($vo["username"]); ?></h4>
									</dt>
									<dd>
										<span><?php echo ($vo["content"]); ?></span>
										<p>评论于 <a href="<?php echo U('index/show',array('id'=>$vo['news_id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a></p>
										<span class="time"><?php echo (date('Y-m-d H:i:s',$vo["updatetime"])); ?></span>
									</dd><?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</dl>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="profile" style="padding-left:3px;">
						<div id="hot_list" style="padding-top:3px;" class="conFrame">
							<dl>
							<?php if(empty($comment_replay_array)): ?>暂无收到对您的评论哦！
							<?php else: ?>
								<?php if(is_array($comment_replay_array)): $i = 0; $__LIST__ = $comment_replay_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt class="cf">
										<img src="<?php echo ($vo["parent"]["headimg"]); ?>" alt="">
										<h4 style="font-weight:bold;color: #000000; font-size:12px;"><?php echo ($vo["parent"]["username"]); ?></h4>
									</dt>
									<dd>
										<span><?php echo ($vo["parent"]["content"]); ?></span>
										<p>回复我的评论： <a href="<?php echo U('index/show',array('id'=>$vo['parent']['news_id']));?>" target="_blank"><?php echo ($vo["content"]); ?></a></p>
										<span class="time"><?php echo (date('Y-m-d H:i:s',$vo["updatetime"])); ?></span>
									</dd><?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</dl>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="pages" style="padding-top:10px;">
				<span>1</span>
				<a href="#" hidefocus="">2</a>
				<a href="#" hidefocus="">3</a>
				<a href="#" class="next">下一页&gt;&gt;</a>
			</div> -->
		</div>
	</div>
</body>
<script>
<!-- $('#myTabs a').click(function (e) { -->
  <!-- e.preventDefault() -->
  <!-- $(this).tab('show') -->
<!-- }) -->
</script>

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

<div id="footer">
    <div class="footer_main">
        <dl class="list_1">
			<dt>郑州大学软件光华足球队 | 因为热爱</dt>
				<dd><a href="http://www.dongqiudisport.top/dongqiudi/">关于我们</a></dd>
				<dd><a href="http://www.weibo.com/guanghuazuqiu?refer_flag=1005050005_" target="_blank">加入我们</a></dd>
				<dd><a href="http://www.dongqiudisport.top/dongqiudi/">客户端下载</a></dd>
				<dd><a href="http://www.dongqiudisport.top">广告投放</a></dd>
				<dd>联系方式：17638165937</dd>
		</dl>
        <dl class="list_2">
			<dt>关注</dt>
			<dd><a href="http://www.weibo.com/guanghuazuqiu?refer_flag=1005050005_" target="_balnk">官方微博</a></dd>
		</dl>
        <dl class="list_4">
			<dt>友情链接</dt>
			<dd><a href="http://m.kuaidi100.com/" target="_balnk">快递查询</a></dd>
		</dl>
        <dl class="list_3">
				<a href="" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="__PUBLIC__/image/beian.png" style="float:left;"><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">豫ICP备17002128号</p></a>
			</dd>
			<dd>郑州大学软件光华足球队</dd>
		</dl>
    </div>
</div>
<div id="mask">
    <div id="pop">
        <a href="https://www.dongqiudi.com/#" class="close"></a>
		<h3><span class="icon_sad"></span> 非常抱歉！</h3>
		<p></p>
		<a href="https://www.dongqiudi.com/#" class="btn"></a>
    </div>
</div>
<div id="blink">
    <div id="popUp">
     <p></p>
    </div>
</div>
<div id="ctr">
    <div class="code"></div>
    <span class="icon_qr"></span>
    <a href="#" class="b_t"></a>
</div>
<script src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jsrender.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.pjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/main.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/vote.js"></script>
<script type="text/javascript">
 $(window).scroll(function(){
   var sc=$(window).scrollTop();
   var rwidth=$(window).width()
   if(sc>0){
    $("#ctr").css("display","block");
    <!-- $("#ctr").css("left",(rwidth-36)+"px") -->
   }else{
   $("#ctr").css("display","none");
   }
 })
 $("#ctr").click(function(){
   var sc=$(window).scrollTop();
   $('body,html').animate({scrollTop:0},1000);
 })
</script>
</body>
</html>