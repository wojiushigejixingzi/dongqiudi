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
table.list_2 th{
	text-align: center;
}



</style>
<div id="main" class="cf">
	<div id="stat_list">
	<?php if(ACTION_NAME == 'index'): ?><a rel="51" href="<?php echo U('data/index');?>" class="sel">中超 <span class="hover"></span></a>
	<?php else: ?>
		<a rel="51" href="<?php echo U('data/index');?>">中超 <span class="hover"></span></a><?php endif; ?>
	<?php if(ACTION_NAME == 'yingchao'): ?><a rel="8" href="<?php echo U('data/yingchao');?>" class="sel">英超 <span class="hover"></span></a>
	<?php else: ?>
		<a rel="8" href="<?php echo U('data/yingchao');?>">英超 <span class="hover"></span></a><?php endif; ?>
	<?php if(ACTION_NAME == 'xijia'): ?><a rel="7" href="<?php echo U('data/xijia');?>" class="sel">西甲 <span class="hover"></span></a>
	<?php else: ?>
		<a rel="7" href="<?php echo U('data/xijia');?>">西甲 <span class="hover"></span></a><?php endif; ?>
	<?php if(ACTION_NAME == 'dejia'): ?><a rel="9" href="<?php echo U('data/dejia');?>" class="sel">德甲 <span class="hover"></span></a>
	<?php else: ?>
		<a rel="9" href="<?php echo U('data/dejia');?>">德甲 <span class="hover"></span></a><?php endif; ?>
	<?php if(ACTION_NAME == 'yijia'): ?><a rel="13" href="<?php echo U('data/yijia');?>" class="sel">意甲 <span class="hover"></span></a>
	<?php else: ?>
		<a rel="13" href="<?php echo U('data/yijia');?>">意甲 <span class="hover"></span></a><?php endif; ?>
	<?php if(ACTION_NAME == 'fajia'): ?><a rel="16" href="<?php echo U('data/fajia');?>" class="sel">法甲 <span class="hover"></span></a>
	<?php else: ?>
		<a rel="16" href="<?php echo U('data/fajia');?>">法甲 <span class="hover"></span></a><?php endif; ?>
	</div>
        
<div id="stat_detail">
            <div id="stat_tab">
			<?php if($_GET['type'] == ''): ?><a href="<?php echo U('data/yijia');?>" class="sel">积分榜</a>
			<?php else: ?>
                <a href="<?php echo U('data/yijia');?>" >积分榜</a><?php endif; ?>	
			<?php if($_GET['type'] == 'schedule'): ?><a href="<?php echo U('data/yijia',array('type'=>'schedule'));?>" id="schdule" class="sel">赛程表</a>
			<?php else: ?>
				<a href="<?php echo U('data/yijia',array('type'=>'schedule'));?>" id="schdule">赛程表</a><?php endif; ?>
            </div>
			<?php if($_GET['type'] == 'schedule'): ?><table class="list_2" id="schedule">
				<thead>
					<tr>
						<th class="prev" width="30%">
							<a style="color: #fff;" href="http://www.dongqiudi.com/data?type=schedule&amp;competition=51&amp;round=39713&amp;gameweek=1">&lt; 上一轮</a>
						</th>
						<th colspan="2" id="schedule_title" width="40%">常规赛第2轮</th>
						<th class="next" width="30%">
							<a style="color: #fff;" href="http://www.dongqiudi.com/data?type=schedule&amp;competition=51&amp;round=39713&amp;gameweek=3">下一轮 &gt;</a>
						</th>
					</tr>
				</thead>
				<tbody id="schduleContent">
					<tr>
						<td class="time" utc="1489145700">2017-03-10 19:35</td>
						<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/441.png" alt="">江苏苏宁易购</td>
						<td class="status">VS</td>
						<td class="home">天津亿利<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/431.png" alt=""></td>
					</tr>
						<tr>
							<td class="time" utc="1489145700">2017-03-10 19:35</td>
							<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/10655.png" alt="">上海上港</td>
							<td class="status">VS</td>
							<td class="home">延边富德<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/3826.png" alt=""></td>
						</tr>
						<tr>
							<td class="time" utc="1489217400">2017-03-11 15:30</td>
							<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/18584.png" alt="">贵州恒丰智诚</td>
							<td class="status">VS</td>
							<td class="home">北京中赫国安<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/429.png" alt=""></td>
						</tr>
						<tr>
							<td class="time" utc="1489217400">2017-03-11 15:30</td>
							<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/432.png" alt="">重庆当代力帆</td>
							<td class="status">VS</td>
							<td class="home">河北华夏幸福<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/21563.png" alt=""></td>
						</tr>
						<tr>
							<td class="time" utc="1489232100">2017-03-11 19:35</td>
							<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/433.png" alt="">上海绿地申花</td>
							<td class="status">VS</td>
							<td class="home">天津权健<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/18583.png" alt=""></td>
						</tr>
						<tr>
							<td class="time" utc="1489232100">2017-03-11 19:35</td>
							<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/434.png" alt="">山东鲁能泰山</td>
							<td class="status">VS</td>
							<td class="home">广州恒大淘宝<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/6648.png" alt=""></td>
						</tr>
						<tr>
							<td class="time" utc="1489303800">2017-03-12 15:30</td>
							<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/425.png" alt="">广州富力</td>
							<td class="status">VS</td>
							<td class="home">长春亚泰<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/437.png" alt=""></td>
						</tr>
						<tr>		
							<td class="time" utc="1489318500">2017-03-12 19:35</td>
							<td class="away"><img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/442.png" alt="">河南建业</td>
							<td class="status">VS</td>
							<td class="home">辽宁沈阳开新<img onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;" src="./中超积分射手榜 — 数据_懂球帝_files/3139.png" alt=""></td>
						</tr>
				</tbody>
			</table>
			<?php else: ?>
			<table class="list_1">
				<tbody>
					<tr>
						<th colspan="10" style="text-align: center;" class="top_2">常规赛积分榜</th>
					</tr>
					<tr>
						<th>排名</th>
						<th class="team">球队</th>
						<th>场次</th>
						<th>胜</th>
						<th>平</th>
						<th>负</th>
						<th>进球</th>
						<th>失球</th>
						<th>净胜球</th>
						<th>积分</th>
					</tr>
					<?php if(is_array($zhongchao)): $i = 0; $__LIST__ = $zhongchao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key <= 2): ?><tr class="top_rank">
						<?php elseif($key >= 14): ?>
							<tr class="bottom_rank">
						<?php else: ?>
							<tr><?php endif; ?>
								<td><?php echo ($key + 1); ?></td>
								<td class="team"><img src="<?php echo ($vo["icon"]); ?>" alt=""><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["matches"]); ?></td>
								<td><?php echo ($vo["league_win"]); ?></td>
								<td><?php echo ($vo["league_equal"]); ?></td>
								<td><?php echo ($vo["league_fail"]); ?></td>
								<td><?php echo ($vo["league_goal"]); ?></td>
								<td><?php echo ($vo["league_fumble"]); ?></td>
								<td><?php echo ($vo["goal_difference"]); ?></td>
								<td><?php echo ($vo["league_integral"]); ?></td>
								<!-- <td><?php echo ($vo["league_equal"]); ?></td> -->
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table><?php endif; ?>
		<div class="loading"><span class="load"></span> 正在加载... </div>
</div>
<script>
    $(function(){
        setLocalTime();

        $('.list').delegate('span.more','mouseenter',function(){
            $(this).closest('td').find('.more_list').show();
        });
        $('.list').delegate('td.link','mouseleave',function(){
            $(this).find('.more_list').hide();
        });
        var comp = getUrlParam('competition');
        $('#stat_list a').each(function(){
            if($(this).attr('rel') === comp ){
                $(this).addClass('sel')
            }
        });
        $('#other_list').click(function () {
            if ($('#stat_list .other').is(':visible')) {
                $('#stat_list .other').hide();
                $('#other_list span').html("展开");
                $('#other_list img').attr('src',"/web/images/data_spread.png");
            } else {
                $('#stat_list .other').toggle(true);
                $('#other_list span').html("收起");
                $('#other_list img').attr('src',"/web/images/data_retract.png");
            }
        });
    });

    function setLocalTime() {
        date = new Date();
        $("td.time").each(function () {
            var str = $(this).attr('utc');
            if (str != 0) {
                date.setTime(str * 1000);
                display = date.format('yyyy-MM-dd hh:mm');
                $(this).text(display);
            }
        });
    }


    Date.prototype.format = function (format) {
        var o = {
            "M+": this.getMonth() + 1, //month
            "d+": this.getDate(), //day
            "h+": this.getHours(), //hour
            "m+": this.getMinutes(), //minute
            "s+": this.getSeconds(), //second
            "q+": Math.floor((this.getMonth() + 3) / 3), //quarter
            "S": this.getMilliseconds() //millisecond
        }
        if (/(y+)/.test(format)) format = format.replace(RegExp.$1,
                (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)if (new RegExp("(" + k + ")").test(format))
            format = format.replace(RegExp.$1,
                    RegExp.$1.length == 1 ? o[k] :
                            ("00" + o[k]).substr(("" + o[k]).length));
        return format;
    };

</script>

</div>






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