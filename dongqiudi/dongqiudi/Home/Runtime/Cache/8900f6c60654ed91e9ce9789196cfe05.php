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


<div id="main" class="cf">
	<div class="thumb">
        <a href="http://www.dongqiudisport.top/dongqiudi/">懂球帝首页</a> &gt; <span>新闻正文</span>
    </div>
    <div id="con" class="cf">
        <div class="left">
            <div class="detail">
                <h1 style="font-size: 2em;"><?php echo ($result["title"]); ?></h1>
                <h4>
                    <span class="name"><?php echo ($result["username"]); ?></span>
                    <span class="time"><?php echo (date('Y-m-d H:i:s',$result["inputtime"])); ?></span>
                    <a class="comm" href="javascript:void(0);" onclick="javascript:document.getElementById('pinglun').scrollIntoView()">评论</a>
                </h4>
					<div>
						<?php if($result['video_url'] != ''): ?><div class="video" mode="player" site="youku" src="<?php echo ($result["video_url"]); ?>" title="freekickerz vs Hakan Calhanoglu - Ultimate Free Kick Challenge" thumb="<?php echo ($result["thumb"]); ?>" hash="f657b07efadf87a78d6389b87bc14723" style="background: url(&quot;<?php echo ($result["thumb"]); ?>;) center center / 100% no-repeat rgba(0, 0, 0, 0.701961);">
							<a href="<?php echo ($result["video_url"]); ?>" target="_blank" class="icon_play"></a>
							</div>
						<?php else: endif; ?>
						<?php echo ($result["content"]); ?>
					</div>
            </div>
            <div id="comment">
				<h2 id="pinglun">我要评论</h2>
				<?php if($_SESSION['username'] != ''): ?><textarea placeholder="说点什么？" id="conBox"></textarea>
				<?php else: ?>
				<textarea placeholder="请登录哦" onclick="maskShow('unlogin')"></textarea><?php endif; ?>
				<div class="info cf"> 
					<?php if($_SESSION['username'] != ''): ?><img src="<?php echo ($_SESSION['headimg']); ?>" class="heade_s" alt="<?php echo ($_SESSION['username']); ?>">
					<a href="javascript:void(0);" onclick="comment()" class="btn" id="comm_send">提交评论</a>
					<input type="hidden" id="loginStat" value="1">
					<?php else: ?>
					<a href="javascript:void(0);" onclick="maskShow('unlogin')" class="btn btn_disable">提交评论</a><?php endif; ?>
				</div>
				<div class="pjax-container">

				</div>
            </div>
        </div>
        <div class="right">
			<div id="news_s_list" class="conFrame">
				<div class="title cf">
					<span>相关新闻</span>
				</div>
			</div>
		</div>
    </div>
</div>
<script>
	var news_id = getUrlParam('id');
	var to_user_str = null;
	var to_user_id = 0;
	<!-- 赞 -->
	var up = function (id) {
			var url = "<?php echo U('Index/up');?>";
			var comment_id = id;
			
			var _data = {
                'comment_id': comment_id,
				'news_id': news_id,
            };
            $.ajax({
                type: "post",
                url: url,
				data: _data,
                success: function (data) {
                    if (data.errCode) {
                        blinkShow(data.errMsg);
                        return;
                    }
                    blinkShow("赞 +1");
                    var name = "[name=up_" + id + "]";
                    $(name).html("赞（" + data + "）");
                },
                error: function (data) {
                    if (data.status == 401) {
                        maskShow("unlogin");
                        return;
                    }
                }
            });

        }
	
	<!-- 评论 -->
        var comment = function () {
			<!-- alert('11'); -->
            var url = "<?php echo U('Index/comment');?>";
            var content =  $.trim($('#conBox').val());
			
			if (to_user_str != null && content.startWith(to_user_str)) {
                url = "<?php echo U('Index/comment','parent_id');?>" + to_user_id;
            }
			var _data = {
                'content': content.replace(to_user_str, ""),
				'news_id': news_id,
            };
			if(""==content){
				maskShow('评论不能为空哦！');
			}else{
				$.ajax({
					type: "post",
					url: url,
					data: _data,
					success: function (data) {
						if (data.errCode) {
							if (data.errCode == 401) {
								maskShow('未登录');
								return;
							}
							maskShow(data.errMsg);
							return;
						}
						blinkShow("评论成功");
                        $("#conBox").val('');
						var news_id = getUrlParam('id');
						var id = 1;
						$.get("index.php",{m:"index",a:"comment",p:id,news_id:news_id},function (data) {
							$(".pjax-container").html(data.content);
						})

						/*$('#conBox').val('');
						$('#pjax-container').val('');

						$('#pjax-container').html(data);*/
					},
					error: function (data) {
						if (data.status == 401) {
							maskShow('未登录');
						}
						else if (data.responseJSON) {
							msg = data.responseJSON.errMsg;
							if (data.responseJSON.errCode == 40008) {
								msg = '您当前处于封禁状态，不能发言';
							}

							maskShow(msg);
						}
						else {
							mastShow('评论失败');
						}
					}
				});
			};
        }
		var setCommentInfo = function (comment_id, user_name) {
            to_user_str = '回复@' + user_name + '的评论:';
            to_user_id = comment_id;
            $('#conBox').focus().val(to_user_str);
        }
		
		String.prototype.startWith = function (str) {
            var reg = new RegExp("^" + str);
            return reg.test(this);
        }
		
		$('#comment').delegate('a.recom', 'click', function () {
                var comment_id = $(this).closest('.ctr').attr('rel');
                var user_name = $(this).closest('.ctr').attr('res');
                var logined = $('#loginStat').val();
                if (logined) {
                    setCommentInfo(comment_id, user_name)
                } else {
                    maskShow('unlogin');
                    return false;
                }
            });
    $(function(){
        var init_id = 1;
        index(init_id);	//初始化页面 init_id==1
    });
    function index(id){
        var news_id = getUrlParam('id');
        var id = id;
			$.get("index.php",{m:"index",a:"comment",p:id,news_id:news_id},function (data) {
			    debugger;
            $(".pjax-container").html(data.content);
       	 })
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