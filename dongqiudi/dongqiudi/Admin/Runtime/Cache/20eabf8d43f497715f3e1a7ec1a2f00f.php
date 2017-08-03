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
h1{
	margin-top:2px;
}
</style>
<body style="background-color:#f2f9fd;">
<div class="header bg-main" style="background-color: #323232; ">
  <div class="logo margin-big-left fadein-top;">
	<?php if(empty($_SESSION['headimg'])): ?><h1><img src="__PUBLIC__/image/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />欢迎<?php if($_SESSION['category'] == 1): ?>超级管理员<?php elseif($_SESSION['category'] == 2): ?>英超管理员<?php elseif($_SESSION['category'] == 3): ?>西甲管理员<?php elseif($_SESSION['category'] == 4): ?>意甲管理员<?php elseif($_SESSION['category'] == 5): ?>德甲管理员<?php elseif($_SESSION['category'] == 6): ?>法甲管理员<?php elseif($_SESSION['category'] == 7): ?>中超管理员<?php endif; ?>"<?php echo ($_SESSION['username']); ?>"进入后台管理中心</h1>
	<?php else: ?>
	<h1><img src="<?php echo ($_SESSION['headimg']); ?>" class="radius-circle rotate-hover" height="50" alt="" />欢迎<?php if($_SESSION['category'] == 1): ?>超级管理员<?php elseif($_SESSION['category'] == 2): ?>英超管理员<?php elseif($_SESSION['category'] == 3): ?>西甲管理员<?php elseif($_SESSION['category'] == 4): ?>意甲管理员<?php elseif($_SESSION['category'] == 5): ?>德甲管理员<?php elseif($_SESSION['category'] == 6): ?>法甲管理员<?php elseif($_SESSION['category'] == 7): ?>中超管理员<?php endif; ?>"<?php echo ($_SESSION['username']); ?>"进入后台管理中心</h1><?php endif; ?>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="http://www.dongqiudisport.top/dongqiudi/" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<!-- <a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp; --><a class="button button-little bg-red" href="<?php echo U('user/logout');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title" style="background-color: #323232; "><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="<?php echo U('index/pass');?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <li><a href="<?php echo U('index/book');?>" target="right"><span class="icon-caret-right"></span>留言管理</a></li>    
	<?php if($_SESSION['category'] == 1): ?><li><a href="<?php echo U('index/user');?>" target="right"><span class="icon-caret-right"></span>用户管理</a></li><?php endif; ?>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>内容设置</h2>
  <ul>
    <li><a href="<?php echo U('index/lists');?>" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="<?php echo U('index/team_manage');?>" target="right"><span class="icon-caret-right"></span>球队管理</a></li>
    <li><a href="<?php echo U('index/match_manage');?>" target="right"><span class="icon-caret-right"></span>比赛管理</a></li>
    <li><a href="<?php echo U('index/add');?>" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="<?php echo U('index/add_team');?>" target="right"><span class="icon-caret-right"></span>添加球队</a></li>
    <li><a href="<?php echo U('index/add_match');?>" target="right"><span class="icon-caret-right"></span>添加比赛</a></li>
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo U('index/pass');?>" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>