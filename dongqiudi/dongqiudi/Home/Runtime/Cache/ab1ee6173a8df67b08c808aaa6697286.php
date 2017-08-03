<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="__PUBLIC__/css/login_register/style.css">
<body style="background-color:#323232;">
<div class="register-container">
	<h1>ShareLink</h1>
	<div class="connect">
		<p>Link the world. Share to world.</p>
	</div>
	<form action="" method="post" id="registerForm">
		<div>
			<input type="text" name="username" class="username" placeholder="昵称" autocomplete="off"/>
		</div>
		<div>
			<input type="password" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="password" name="confirm_password" class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
		</div>
		<div>
			<input type="text" name="phone_number" class="phone_number" placeholder="输入手机号码" autocomplete="off" id="number"/>
		</div>
		<div>
			<input type="email" name="email" class="email" placeholder="输入邮箱地址" oncontextmenu="return false" onpaste="return false" />
		</div>
		<button id="submit" type="submit">注 册</button>
	</form>
	<a href="<?php echo U('user/login');?>">
		<button type="button" class="register-tis">已经有账号？</button>
	</a>
	<a href="<?php echo U('index/index');?>">
		<button type="button" class="register-tis">不弄了</button>
	</a>
</div>
</body>
<script src="__PUBLIC__/js/login_register/jquery.min.js"></script>
<script src="__PUBLIC__/js/login_register/common.js"></script>
<!--表单验证-->
<script src="__PUBLIC__/js/login_register/jquery.validate.min.js?var1.14.0"></script>
</html>