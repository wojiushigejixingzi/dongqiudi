<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="__PUBLIC__/css/login_register/style.css">
<!-- <style>				  body{background:url(../image/login_register/bg.jpg);background-repeat:no-repeat;}	
</style>  -->
<body style="background-color: #323232;">
<div class="login-container">
	<form action="" method="post" id="loginForm">
		<div>
			<input type="text" name="account" class="username" placeholder="账号" autocomplete="off"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<button id="submit" type="submit">登 陆</button>
	</form>
	<a href="<?php echo U('user/register');?>">
		<button type="button" class="register-tis">还有没有账号？</button>
	</a>
	<a href="<?php echo U('index/index');?>">
		<button type="button" class="register-tis">不弄了</button>
	</a>
</div>
<script src="__PUBLIC__/js/login_register/jquery.min.js"></script>
<script src="__PUBLIC__/js/login_register/common.js"></script>
<!--背景图片自动更换-->
<!-- <script src="__PUBLIC__/js/login_register/supersized.3.2.7.min.js"></script> -->
<!-- <script src="__PUBLIC__/js/login_register/supersized-init.js"></script> -->
<!--表单验证-->
<script src="__PUBLIC__/js/login_register/jquery.validate.min.js?var1.14.0"></script>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>适用浏览器：360、FireFox、Chrome、Safari、Opera、傲游、搜狗、世界之窗. 不支持IE8及以下浏览器。</p>
</div>
</body>
</html>