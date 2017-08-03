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


<style>
h2{
	font-size:1.5em;
}
#news_list li {
    position: relative;
    overflow: hidden;
    padding: 20px 0;
    height: 160px;
    border-bottom: 1px solid #e6eaed;
    color: #818b97;
}
#news_list a.tag_video {
    top: 105px;
    left: 126px;
}
#news_list li img {
    float: left;
	margin-top:-1px;
    display: block;
    margin-right: 25px;
    width: 160px;
    height: 120px;
    line-height: 120px;
}
#vList dd .video {
    bottom: 8px;
    left: 98px;
}
</style>
<div id="main" class="cf">
        <div id="top" class="cf">
        <div id="vShow">
            <ul style="margin-left: -1280px;">
				<?php if(is_array($focus_img)): $i = 0; $__LIST__ = $focus_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('video/show',array('id'=>$vo['id']));?>" target="_blank">
							<img src="<?php echo ($vo["thumb"]); ?>" alt="" href="<?php echo U('video/show',array('id'=>$vo['id']));?>">
							<h3><?php echo ($vo["title"]); ?></h3>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
        </div>
        <dl id="vList">
            <dt>重要视频</dt>
				<?php if(is_array($focus_img)): $i = 0; $__LIST__ = $focus_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd class="" style="height:73px;">
						<a href="<?php echo U('video/show',array('id'=>$vo['id']));?>" target="_blank">
							<span class="video"></span>
							<img src="<?php echo ($vo["thumb"]); ?>">
							<p><?php echo ($vo["title"]); ?></p>
						</a>
					</dd><?php endforeach; endif; else: echo "" ;endif; ?>
		</dl>
    </div>
    <div id="con" class="cf">
        <div class="left" id="pjax-container">
    <div id="tab">
		<a href="<?php echo U('video/jijin');?>" rel="11" class=" ">集锦</a>
		<a href="<?php echo U('video/index');?>" rel="43" class=" last  sel">视频</a>
	</div>
	<script type="text/javascript">
  $(document).ready(function(){
    $("#tab a").each(function(){
        $this = $(this);
        if($this[0].href==String(window.location)){  
            $("#tab a").removeClass("sel");		
            $this.addClass("sel");  
        }  
    });  
}); 


</script>
    <div id="news_list">
		<ol>
			<?php if(is_array($shipin)): $i = 0; $__LIST__ = $shipin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('video/show',array('id'=>$vo['id']));?>" target="_blank" class="tag_video"></a>
					<a href="<?php echo U('video/show',array('id'=>$vo['id']));?>" target="_blank">
						<img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>">
					</a>
					<h2>
						<a href="<?php echo U('video/show',array('id'=>$vo['id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a>
					</h2>
					<p></p>
					<div class="info">
						<span class="time"><?php echo (date('Y-m-d H:i:s',$vo["inputtime"])); ?></span>
						<a class="comment" href="<?php echo U('video/show',array('id'=>$vo['id']));?>" target="_blank"><?php echo ($vo["num"]); ?></a>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ol>
		<div class="loading"><span class="load"></span> 正在加载... </div>
	</div>
	<ul class="pagination">
		<li class="disabled"><span>«</span></li> 
		<li class="active"><span>1</span></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=2">2</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=3">3</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=4">4</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=5">5</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=6">6</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=7">7</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=8">8</a></li>
		<li class="disabled"><span>...</span></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=171">171</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=172">172</a></li>
		<li><a href="http://www.dongqiudi.com/video?tab=11&amp;page=2" rel="next">»</a></li>
	</ul>
</div>

<style>
    #infscr-loading {
        text-align:center;
        margin: 10px;
    }
</style>
        <div class="right">

        </div>
    </div>

</div>
<script type="text/javascript" src="__PUBLIC__/js/jsrender.min.js"></script>/
<script type="text/javascript" src="__PUBLIC__/js/jquery.pjax.js"></script>/
<script type="text/javascript" src="__PUBLIC__/js/main.js"></script>//
 <script id="archiveTemplate" type="text/x-jsrender">
        <li>
            <a href="/article/{<?php echo id;?>}" target="_blank" class="tag_video"></a>
            <a href="/article/{<?php echo id;?>}" target="_blank">
                <img src="{<?php echo thumb;?>}" alt="{<?php echo title;?>}">
            </a>
            <h2>
                <a href="/article/{<?php echo id;?>}" target="_blank">{<?php echo title ;?>}</a>
            </h2>
            <p>{<?php echo description;?>}</p>
            <div class="info">
                <span class="time">{<?php echo display_time;?>}</span>
                <a class="comment" href="#">{<?php echo comments_total;?>}</a>
            </div>
        </li>
    </script>
    <script>
        $(document).pjax('#tab a', '#pjax-container', {scrollTo: false});

        var scroll_locked = false;
        var scroll_times = 1;
        $(function () {
            $(document).scroll(function () {
                window.setTimeout(function () {
                    if (scroll_times < 3 && !scroll_locked) {
                        var allHeight = document.body.scrollHeight;
                        var sHeight = document.documentElement.scrollTop || document.body.scrollTop;
                        var winHeight = document.documentElement.clientHeight;
                        var margin = allHeight - sHeight - winHeight;

                        if (margin < 100) {
                            scroll_locked = true;
                            var page = 1;
                            var tab = 43;
                            if (request('page')) {
                                page = parseInt(request('page'));
                            }
                            if (request('tab')) {
                                tab = request('tab');
                            }
                            page = page + scroll_times;
                            scroll_times = scroll_times + 1;
                            loadPage(tab, page);

                        }
                    }
                }, 100)
            });
        });

        function loadPage(id, page) {
            $('.loading').css({visibility: 'visible'});
            $.getJSON('/archives/' + id + '?page=' + page, function (data) {
                $.views.converters("time", function (val) {
                    return val.substr(5, 11);
                });
                var html = $("#archiveTemplate").render(data.data);
                if (data.current_page == 1) {
                    $('#news_list ol').empty();
                }
                $(html).appendTo('#news_list ol');
                $('.pagination').replaceWith(data.render);

                $('.loading').css({visibility: 'hidden'});
                scroll_locked = false;
                if (scroll_times === 3) {
                    $('.pagination').css('visibility', 'visible')
                }
            });
        }
    </script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?662abe3e1ab2558f09503989c9076934";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
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