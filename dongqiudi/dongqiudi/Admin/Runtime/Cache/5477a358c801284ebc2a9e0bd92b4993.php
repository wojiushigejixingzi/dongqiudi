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

<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>账号</th>       
        <th>用户类型</th>
        <th>昵称</th>
        <th>手机号</th>
        <th width="25%">邮箱</th>
         <!-- <th width="120">留言时间</th> -->
        <th>操作</th>       
      </tr> 
		<?php if(is_array($user_data)): $i = 0; $__LIST__ = $user_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			  <td><input type="checkbox" name="id[]" value="<?php echo ($vo["user_id"]); ?>" />
				<?php echo ($vo["user_id"]); ?></td>
			  <td><?php echo ($vo["account"]); ?></td>
			  <td>
				<?php if($vo['category'] == '0'): ?>普通用户
				<?php else: ?>
				管理员<?php endif; ?>
			  </td>
			  <td><?php echo ($vo["username"]); ?></td>  
			  <td><?php echo ($vo["phone_number"]); ?></td>         
			  <td><?php echo ($vo["email"]); ?></td>
			  <td><div class="button-group">
				  <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> </div>
				<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					设置成 <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('Index/user',array('admin_id'=>'0','user_id'=>$vo['user_id']));?>">普通用户</a></li>
						<li><a href="<?php echo U('Index/user',array('admin_id'=>2,'user_id'=>$vo['user_id']));?>">英超管理员</a></li>
						<li><a href="<?php echo U('Index/user',array('admin_id'=>3,'user_id'=>$vo['user_id']));?>">西甲管理员</a></li>
						<!-- <li role="separator" class="divider">意甲管理员</li> -->
						<li><a href="<?php echo U('Index/user',array('admin_id'=>4,'user_id'=>$vo['user_id']));?>">意甲管理员</a></li>
						<li><a href="<?php echo U('Index/user',array('admin_id'=>5,'user_id'=>$vo['user_id']));?>">德甲管理员</a></li>
						<li><a href="<?php echo U('Index/user',array('admin_id'=>6,'user_id'=>$vo['user_id']));?>">法甲管理员</a></li>
						<li><a href="<?php echo U('Index/user',array('admin_id'=>7,'user_id'=>$vo['user_id']));?>">中超管理员</a></li>
					</ul>
				</div>
			  </td>
			  
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body>
</html>