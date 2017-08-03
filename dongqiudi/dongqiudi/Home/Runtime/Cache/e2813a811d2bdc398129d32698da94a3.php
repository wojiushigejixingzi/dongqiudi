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
    <div id="match_list">
		<a href="<?php echo U('march/index');?>" rel="63" class=" sel">重要</a>
		<a href="<?php echo U('march/zhongchao');?>" rel="63" class=" ">中超</a>
		<a href="<?php echo U('march/yingchao');?>" rel="63" class=" ">英超</a>
		<a href="<?php echo U('march/xijia');?>" rel="63" class=" ">西甲</a>
		<a href="<?php echo U('march/dejia');?>" rel="63" class=" ">德甲</a>
		<a href="<?php echo U('march/yijia');?>" rel="63" class=" ">意甲</a>
		<a href="<?php echo U('march/fajia');?>" rel="63" class=" ">法甲</a>
	</div>
	<script type="text/javascript">
		  $(document).ready(function(){
			$("#match_list a").each(function(){
				$this = $(this);
				if($this[0].href==String(window.location)){  
					$("#match_list a").removeClass("sel");		
					$this.addClass("sel");  
				}  
			});  
		}); 
	</script>
    <div id="match_detail">
        <h3 class="cf">
            <span class="left">比赛列表
</span>
            <span class="Zebra_DatePicker_Icon_Wrapper" style="display: inline-block; position: relative; float: none; top: auto; right: auto; bottom: auto; left: auto;"><input type="text" id="date_input" placeholder="按日期查询比赛" name="dateSel" class="date" readonly="readonly" style="position: relative; top: auto; right: auto; bottom: auto; left: auto;"><button type="button" class="Zebra_DatePicker_Icon Zebra_DatePicker_Icon_Inside" style="top: 0px; left: 121px;">Pick a date</button></span>
        </h3>
            <div id="match_info">
                <table class="list">
                    <tbody>
                    <?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <th colspan="6">
                        <?php
 if(strtotime($key) == strtotime(date('Y-m-d', time()))-86400){ $day = "昨天"; }elseif(strtotime($key) == strtotime(date('Y-m-d', time()))){ $day = "今天"; }elseif(strtotime($key) == strtotime(date('Y-m-d', time()))+86400){ $day = "明天"; }else{ $weekday = array('周日','周一','周二','周三','周四','周五','周六'); $day = $weekday[date('w', strtotime($key))]; } ?>
                       <?php echo ($key); ?> <?php echo ($day); ?>
                        </th>
                        </tr>
                        <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr rel="2388735" id="match_2388735" class="matchItem">
                                
                                <td class="times">
                                <?php
 if($v['start_time'] > time()){ $state = substr(date("Y-m-d H:i:s",$v['start_time']),-8,5); $score = "--"; }elseif(($v['start_time']<= time()) AND ($v['start_time'] >(time() - 6300))){ $state = '比赛进行中'; $score = $v['hometeam_score'].':'.$v['vsitingteam_score']; }else{ $state = '完场'; $score = $v['hometeam_score'].':'.$v['vsitingteam_score']; } echo ($state); ?>
                                </td>
                                <td class="round">
                                <?php echo ($v["level"]); ?>
                                </td>
                                <td class="away">
                                <img src="<?php echo ($v["hometeam"]["icon"]); ?>">
                                <?php echo ($v["hometeam"]["name"]); ?>
                                </td>
                                <td class="stat"><?php echo ($score); ?></td>
                                <td class="home">
                                <?php echo ($v["vsitingteam"]["name"]); ?>
                                <img src="<?php echo ($v["vsitingteam"]["icon"]); ?>" >
                                </td>
                                <td class="link">
                                    <a href="<?php echo ($v["video_url"]); ?>" target="_blank"><?php echo ($v["lick_name"]); ?></a>&nbsp;
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        <!-- <tr>
                            <th colspan="6">2017-01-14 今天</th>
                        </tr>
                        <tr rel="2283077" id="match_2283077" class="matchItem">
                            <td class="times">20:00</td>
                            <td class="round">
                            西甲
                            </td>
                            <td class="away">
                            <img src="__PUBLIC__/image/march/2053.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            莱加内斯
                            </td>
                            <td class="vs">VS</td>
                            <td class="home">
                            毕尔巴鄂竞技
                            <img src="__PUBLIC__/image/march/2019.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            </td>
                            <td class="link">
                            <a href="http://v.pptv.com/show/rUyrKZH3Z6WSJY70ZA.html?rcc_id=wap_dongqiudi" target="_blank">PPTV(北京西甲1)</a>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th colspan="6">2017-01-15 明天</th>
                        </tr>
                        <tr rel="2366078" id="match_2366078" class="matchItem">
                            <td class="times">00:00</td>
                            <td class="round">
                            非洲杯
                            </td>
                            <td class="away">
                            <img src="__PUBLIC__/image/march/945.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            加蓬
                            </td>
                            <td class="vs">VS</td>
                            <td class="home">
                            几内亚比绍
                            <img src="__PUBLIC__/image/march/1096.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            </td>
                            <td class="link">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="6">2017-01-16 周一</th>
                        </tr>

                        <tr rel="2237105" id="match_2237105" class="matchItem">
                            <td class="times">00:00</td>

                            <td class="round">
                            法甲
                            </td>

                            <td class="away">
                            <img src="__PUBLIC__/image/march/902.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            卡昂
                            </td>

                            <td class="vs">VS</td>

                            <td class="home">
                            里昂
                            <img src="__PUBLIC__/image/march/884.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            </td>

                            <td class="link">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="6">2017-01-17 周二</th>
                        </tr>

                        <tr rel="2366095" id="match_2366095" class="matchItem">
                            <td class="times">00:00</td>
                            <td class="round">
                            非洲杯
                            </td>
                            <td class="away">
                            <img src="__PUBLIC__/image/march/598.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            科特迪瓦
                            </td>
                            <td class="vs">VS</td>

                            <td class="home">
                            多哥
                            <img src="__PUBLIC__/image/march/2208.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            </td>

                            <td class="link">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="6">2017-01-18 周三</th>
                        </tr>
                        <tr rel="2366101" id="match_2366101" class="matchItem">
                            <td class="times">00:00</td>
                            <td class="round">
                            非洲杯
                            </td>
                            <td class="away">
                            <img src="__PUBLIC__/image/march/1038.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            加纳
                            </td>
                            <td class="vs">VS</td>
                            <td class="home">
                            乌干达
                            <img src="__PUBLIC__/image/march/2252.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            </td>
                            <td class="link">
                            </td>
                        </tr>
                        <tr>
                            <th colspan="6">2017-01-19 周四</th>
                        </tr>
                        <tr rel="2366080" id="match_2366080" class="matchItem">
                            <td class="times">00:00</td>
                            <td class="round">
                            非洲杯
                            </td>
                            <td class="away">
                            <img src="__PUBLIC__/image/march/945.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            加蓬
                            </td>
                            <td class="vs">VS</td>
                            <td class="home">
                            布基纳法索
                            <img src="__PUBLIC__/image/march/383.png" onerror="this.src=&#39;http://static1.dongqiudi.com/web-new/web/images/defaultTeam.png&#39;">
                            </td>
                            <td class="link">
                            </td>
                        </tr>  -->
                    </tbody>
                </table>
            </div>
        <div class="loading" style="visibility: hidden;"><span class="load"></span> 正在加载...</div>
    </div>
</div>

<script type="text/javascript" src="__PUBLIC__/js/march/zebra_datepicker.js"></script>
    <script>
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

        var scroll_locked = false;
        var scroll_times = 0;
        var next_date = (new Date).format("yyyy-MM-dd");
        var tz = (new Date()).getTimezoneOffset() / 60;
        var times = 1;

        function getTabMatch(date) {
            $('.loading').css({visibility: 'visible'});
            var tab = getUrlParam('tab');
            url = "/match/fetch?tab=" + tab + "&date=" + date + "&scroll_times=" + scroll_times + "&tz=" + tz;
            $.ajax({
                url: url,
                success: function (data) {
                    if (data.errCode) {
                        scroll_locked = false;
                        $('.loading').css({visibility: 'hidden'});
                        return;
                    }
                    if (data) {

                        if (data.html == "") {
                            blinkShow("近期没有更多比赛");
                        }

                        if (scroll_times == 0) {
                            $('#match_info').html(data.html);
                        } else {
                            $('#match_info').append(data.html);
                        }

                        next_date = data.next_date;
                        scroll_times++;
                        scroll_locked = false;
                    }
                    $('.loading').css({visibility: 'hidden'});
                }
            });
        }

        getTabMatch(next_date);

        $(function () {
            $('.list').delegate('span.more', 'mouseenter', function () {
                $(this).closest('td').find('.more_list').show();
            });
            $('.list').delegate('td.link', 'mouseleave', function () {
                $(this).find('.more_list').hide();
            })

            $('#date_input').DatePicker({
                onSelect: function () {
                    scroll_locked = true;
                    scroll_times = 1;
                    next_date = this[0].value;
                    $('#match_info').empty();
                    getTabMatch(next_date);
                }
            });
            $(document).scroll(function () {
                window.setTimeout(function () {
                    if (!scroll_locked && scroll_times > 0) {
                        var allHeight = document.body.scrollHeight;
                        var sHeight = document.documentElement.scrollTop || document.body.scrollTop;
                        var winHeight = document.documentElement.clientHeight;
                        var margin = allHeight - sHeight - winHeight;

                        if (margin < 1000) {
                            scroll_locked = true;
                            getTabMatch(next_date);
                        }
                    }
                }, 2000)
            });
            $('#match_info').delegate('span.more', 'mouseenter', function () {
                $(this).closest('td').find('.more_list').show()
            }).delegate('td.link', 'mouseleave', function () {
                $(this).find('.more_list').hide()
            }).delegate('.more_list', 'mouseleave', function () {
                $(this).hide()
            })

        });

        window.setInterval(function () {
            updateMatches();
        }, 15000);

        function updateMatches() {
            var i = $('#match_info').find('tr.matchItem').length;
            var match_ids = [];
            for (var q = 0; q < i; q++) {
                var item = $('#match_info tr.matchItem').eq(q);
                if (item.find('td').eq(0).text() != '完场') {
                    match_ids.push(item.attr('rel'))
                }
            }

            if (match_ids.length > 0) {
                $.ajax({
                    url: '/match/query',
                    type: 'POST',
                    data: {'ids': match_ids, 'times':times},
                    success: function (data) {
                        for (i in data) {
                            var match = data[i];
                            var id = match.match_id;
                            if (match.status == 'Playing') {
                                var time = match.minute;
                                if (!match.minute) {
                                    time = 0;
                                }
                                var playing_status = "<i>" + time + "' 直播中</i>";
                                $('#match_' + id).find('td').eq(0).html(playing_status);
                                $('#match_' + id).find('td').eq(3).addClass(" live");
                            }
                            else if (match.status == 'Played') {
                                $('#match_' + id).find('td').eq(0).html("完场");
                                $('#match_' + id).find('td').eq(3).removeClass('live');
                            }
                            $('#match_' + id).find('td').eq(3).html(match.result);
                        }
                    }
                });

                times++;
            }
        }

        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
            return null;
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

<div class="Zebra_DatePicker" style="left: -1000px; display: none;">
	<table class="dp_header" style="width: 218px;">
		<tbody><tr><td class="dp_previous">?</td><td class="dp_caption">F, Y</td><td class="dp_next">?</td></tr></tbody>
	</table>
	<table class="dp_daypicker">
		<tbody>
			<tr>	
				<th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th><th>日</th>
			</tr>
			<tr>
				<td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td class="dp_weekend">NaN</td><td class="dp_weekend">NaN</td>
			</tr>
			<tr>
				<td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td class="dp_weekend">NaN</td><td class="dp_weekend">NaN</td>
			</tr>
			<tr>
				<td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td class="dp_weekend">NaN</td><td class="dp_weekend">NaN</td>
			</tr>
			<tr>
				<td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td class="dp_weekend">NaN</td><td class="dp_weekend">NaN</td>
			</tr>
			<tr>
				<td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td class="dp_weekend">NaN</td><td class="dp_weekend">NaN</td>
			</tr>
			<tr>
				<td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td>NaN</td><td class="dp_weekend">NaN</td><td class="dp_weekend">NaN</td>
			</tr>
		</tbody>
	</table>
	<table class="dp_monthpicker" style="width: 218px; height: 190px; display: none;"></table>
	<table class="dp_yearpicker" style="width: 218px; height: 190px; display: none;"></table>
	<table class="dp_footer" style="width: 218px;">
		<tbody>
			<tr><td class="dp_today" style="width: 100%;">今天</td><td class="dp_clear" style="width: 50%; display: none;">清空</td></tr>
		</tbody>
	</table>
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