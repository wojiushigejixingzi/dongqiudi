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
        <div id="top" class="cf">
        <div id="show">
			<div class="demo">
				<a class="control prev"></a><a class="control next abs"></a>
				<div class="slider">
					<ul>
						<?php if(is_array($focus_img)): $i = 0; $__LIST__ = $focus_img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
								<a href="<?php echo U('index/show',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>" target="_blank">
                                    <img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" >
                                </a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
        </div>
			<ul id="list">
            <?php if(is_array($match_data)): $i = 0; $__LIST__ = $match_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li rel="2392954" id="match_2392954" style="  height: 134px;" class="cf">
                    <a href="<?php echo U('march/index');?>" target="_blank">
                        <div class="away" style="height: 100px;">
                            <img src="<?php echo ($vo["hometeam"]["icon"]); ?>">
							<?php echo ($vo["hometeam"]["name"]); ?>
                        </div>
                        <?php
 if($vo['start_time'] > (time())){ $state = '直播'; $score = '-'; }elseif(($vo['start_time']<= time()) AND ($vo['start_time'] >(time() - 6300))){ $state = '直播中'; $score = $vo['hometeam_score'].':'.$vo['vsitingteam_score']; } else{ $state = '视频集锦'; $score = $vo['hometeam_score'].':'.$vo['vsitingteam_score']; } ?>
                        <div class="stat" style="height: 100px;">
                            <h2><?php echo ($vo["level"]); ?></h2>
                            <h3><?php echo ($score); ?>  </h3>
                            <p video="true">
                            <?php
 $weekday = array('周日','周一','周二','周三','周四','周五','周六'); $week = $weekday[date('w', $vo['start_time'])]; $start_time = date("Y-m-d H:i:s",$vo['start_time']); $month = substr($start_time,5,5); $hour = substr($start_time,-8,5); $month_data = str_replace("-","/",$month); ?>
                            <?php if($state == '直播'): echo ($month_data); echo ($week); ?><br/><?php echo ($hour); ?>
                            <?php else: endif; ?>
                            <i><?php echo ($state); ?></i>
                            </p>
                        </div>
                        <div class="home" style="height: 100px;">
                                <img src="<?php echo ($vo["vsitingteam"]["icon"]); ?>">
                                <?php echo ($vo["vsitingteam"]["name"]); ?>
                        </div>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>    
			</ul>
    </div>
	<script>
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
    <div id="con" class="cf">
		<div class="left" id="pjax-container">
			<div id="tab">
				<a href="<?php echo U('index/index');?>" rel="1" class="toutiao">头条</a>
				<a href="<?php echo U('index/jijin');?>" rel="11" class="jijin ">集锦</a>
                <a href="<?php echo U('index/shipin');?>" rel="43" class="shipin ">视频</a>
				<a href="<?php echo U('index/guonei');?>" rel="56" class="guonei ">国内</a>
				<a href="<?php echo U('index/shendu');?>" rel="55" class="shendu ">深度</a>
				<a href="<?php echo U('index/xianqing');?>" rel="37" class="xianqing ">闲情</a>
				<a href="<?php echo U('index/yingchao');?>" rel="3" class="yingchao ">英超</a>
				<a href="<?php echo U('index/xijia');?>" rel="5" class="xijia ">西甲</a>
				<a href="<?php echo U('index/dejia');?>" rel="6" class="dejia ">德甲</a>
				<a href="<?php echo U('index/yijia');?>" rel="4" class="yijia ">意甲</a>
				<a href="<?php echo U('index/wuzhou');?>" rel="57" class="wuzhou ">五洲</a>
				<a href="<?php echo U('index/zhuanti');?>" rel="99" class="zhuanti ">专题</a>
				<a href="<?php echo U('index/zhuangbei');?>" rel="68" class="zhuangbei last  ">装备</a>
			</div>
	<div id="news_list">
		<ol id="JJ">
			<?php if(is_array($xijia)): $i = 0; $__LIST__ = $xijia;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<h2>
						<a href="<?php echo U('index/show',array('id'=>$vo['id']));?>" style="font-size:23px;font-size:20px;" target="_blank">
						<img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a>
					</h2>
					<div class="info" style="margin-top:-46px;">
						<p><?php echo ($vo["description"]); ?></p>
						<span class="time"><?php echo (date('Y-m-d H:i:s',$vo["inputtime"])); ?></span>
						<a class="comment" href="<?php echo U('index/show',array('id'=>$vo['id']));?>" target="_blank"><?php echo ($vo["num"]); ?></a>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ol>
	</div>
			<ul class="pagination">
				<li class="disabled"><span>«</span></li> 
				<li class="active"><span>1</span></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=2">2</a></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=3">3</a></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=4">4</a></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=5">5</a></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=6">6</a></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=7">7</a></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=8">8</a></li>
				<li class="disabled"><span>...</span></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=6290">6290</a></li>
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=6291">6291</a></li> 
				<li><a href="https://www.dongqiudi.com/?tab=1&amp;page=2" rel="next">»</a></li>
			</ul>
		</div>
		<style>
			#infscr-loading {
				text-align:center;
				margin: 10px;
			}
		</style>
	
       
 <div class="right">
            <div id="rank_list" class="conFrame">
                <div class="title cf">
                    <span>积分榜</span>
                    <a href="<?php echo U('data/index');?>" target="_blank">更多</a>
                </div>
                <div class="tab" id="rank">
					<a href="javascript:void(0)" rel="23" class="zc_data sel">中超</a>
					<a href="javascript:void(0)" rel="13" class="yc_data">英超</a>
					<a href="javascript:void(0)" rel="15" class="xj_data">西甲</a>
					<a href="javascript:void(0)" rel="16" class="dj_data">德甲</a>
					<a href="javascript:void(0)" rel="14" class="yj_data">意甲</a>
				</div>
				<table class="cell_rank"  rel="23" style="display:">
					<tbody>
						<tr>
                            <th class="rank">排名</th>
                            <th class="team_name">球队</th>
                            <th class="rel">胜/平/负</th>
                            <th class="stat">积分</th>
                        </tr>
						<?php if(is_array($zhongchao_league_integral)): $i = 0; $__LIST__ = $zhongchao_league_integral;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><span class="top_<?php echo ($key+1); ?>"><?php echo ($key+1); ?></span></td>
								<td class="team_name">
									<img src="<?php echo ($vo["icon"]); ?>" alt="">
									<?php echo ($vo["name"]); ?>
								</td>
								<td><?php echo ($vo["league_win"]); ?>/ <?php echo ($vo["league_equal"]); ?>
									/<?php echo ($vo["league_fail"]); ?></td>
								<td><?php echo ($vo["league_integral"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
                <table class="cell_rank" rel="13" style="display:none">
					<tbody>
						<tr>
							<th class="rank">排名</th>
							<th class="team_name">球队</th>
							<th class="rel">胜/平/负</th>
							<th class="stat">积分</th>
						</tr>
						<tr>
							<td><span class="top_1">1</span></td>
							<td class="team_name">
								<img src="__PUBLIC__/image/661.png" alt="">
								切尔西
							</td>
							<td>16 / 1
								/ 3</td>
							<td>49</td>
						</tr>
					</tbody>
				</table>
				<table class="cell_rank" rel="15" style="display:none">
						<tbody>
						<tr>
							<th class="rank">排名</th>
							<th class="team_name">球队</th>
							<th class="rel">胜/平/负</th>
							<th class="stat">积分</th>
						</tr>
						<tr>
							<td><span class="top_1">1</span></td>
							<td class="team_name">
								<img src="__PUBLIC__/image/2016.png" alt="">
								皇家马德里
							</td>
							<td>12 / 4
								/ 0</td>
							<td>40</td>
						</tr>
					</tbody>
				</table>
				<table class="cell_rank" rel="16" style="display:none">
					<tbody>
						<tr>
							<th class="rank">排名</th>
							<th class="team_name">球队</th>
							<th class="rel">胜/平/负</th>
							<th class="stat">积分</th>
						</tr>
						<tr>
							<td><span class="top_1">1</span></td>
							<td class="team_name">
								<img src="__PUBLIC__/image/961.png" alt="">
								拜仁慕尼黑
							</td>
							<td>12 / 3
								/ 1</td>
							<td>39</td>
						</tr>
					</tbody>
				</table>
				<table class="cell_rank" rel="14" style="display:none">
					<tbody>
						<tr>
							<th class="rank">排名</th>
							<th class="team_name">球队</th>
							<th class="rel">胜/平/负</th>
							<th class="stat">积分</th>
						</tr>
						<tr>
							<td><span class="top_1">1</span></td>
							<td class="team_name">
								<img src="__PUBLIC__/image/1242.png" alt="">
								尤文图斯
							</td>
							<td>15 / 0
								/ 3</td>
							<td>45</td>
						</tr>
													   
					 </tbody>
				 </table>
		</div>
            <div id="hot_list" class="conFrame">
                <div class="title cf">
                    <span>新闻热评</span>
                </div>
                <dl>
					<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dt class="cf">
							<img src="<?php echo ($vo["headimg"]); ?>" alt="">
							<h4><?php echo ($vo["username"]); ?></h4>
							<span class="time"><?php echo (date('Y-m-d H:i:s',$vo["updatetime"])); ?></span>
							<?php if($_SESSION['username'] != ''): ?><a href="javascript:void(0);" onclick="up(<?php echo ($vo["comment_id"]); ?>)" class="zan" name="up_<?php echo ($vo["comment_id"]); ?>">赞（<?php echo ($vo["fabulous"]); ?>）</a>
							<?php else: ?>
								<a href="javascript:void(0);" onclick="maskShow('unlogin')" class="zan" name="up_<?php echo ($vo["comment_id"]); ?>">赞（<?php echo ($vo["fabulous"]); ?>）</a><?php endif; ?>
						</dt>
						<dd>
							<p><?php echo ($vo["content"]); ?></p>
							<span>评论于 <a href="<?php echo U('index/show',array('id'=>$vo['news_id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a></span>
						</dd><?php endforeach; endif; else: echo "" ;endif; ?>
				</dl>
            </div>
        </div>
    </div>
</div>
<script>
<!-- 积分榜 -->
	$(function(){
		$(".tab a").click(function(){
			$(this).addClass("sel").siblings().removeClass("sel");
			var index=$(this).index();
			$("table").not(index).hide();
			$("table").eq(index).show();
			
		});
	});
</script>
<script>
var news_id = getUrlParam('id');
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
</script>
<script src="__PUBLIC__/js/YuxiSlider.jQuery.min.js"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
           <!-- src = "https://hm.baidu.com/hm.js?662abe3e1ab2558f09503989c9076934"; -->
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
	
	$(".slider").YuxiSlider({
	width:640, //容器宽度
	height:400, //容器高度
	control:$('.control'), //绑定控制按钮
	during:4000, //间隔4秒自动滑动
	speed:800, //移动速度0.8秒
	mousewheel:false, //是否开启鼠标滚轮控制
	direkey:true //是否开启左右箭头方向控制
});
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