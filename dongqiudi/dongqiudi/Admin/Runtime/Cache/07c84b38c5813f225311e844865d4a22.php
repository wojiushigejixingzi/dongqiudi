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

<!-- <form method="post" action="<?php echo U('index/lists_delete');?>">
    <input type="hidden" name="aa" value="3">
    <button type="submit">提交</button>
</form> -->
<!-- <form> -->
<style>
.tijiao{
background-color:#00B2EE;
}

</style>
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">比赛管理</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
        <form method="get" action="">
          <ul class="search" style="padding-left:10px;">
            <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('index/add_match');?>"> 添加比赛</a> </li>
            <li>搜索： </li>
            <li>
              <select data-am-selected name="classification" class="input" style="width:120px; line-height:17px;display:inline-block" >
                <option value="name"<?php if($_GET['classification'] == 'name'): ?>selected<?php endif; ?>>球队名称</option>
                <option value="league"<?php if($_GET['classification'] == 'league'): ?>selected<?php endif; ?>>比赛性质</option>
				</select>
            </li>
            <li>
              <input type="hidden" name="m" value="index">
              <input type="hidden" name="a" value="match_manage">
              <input type="text" placeholder="请输入搜索新闻题目" name="keywords" value="<?php echo ($_GET['keywords']); ?>" class="input" style="width:250px; line-height:17px;display:inline-block" />
              <button class="button border-main icon-search" type="submit" > 搜索</button>
            </li>
          </ul>
        </form>
    </div>
    <table class="table table-hover text-center">
    
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">比赛场次</th>
        <th width="100">比赛性质</th>
        <th width="10%">主队队徽</th>
        <th>主队名字</th>
        <th>比分</th>
        <th>客队名字</th>
        <th>客队队徽</th>
        <th>比赛时间</th>
        <th width="310">操作</th>
      </tr>
        <?php if(is_array($match_data)): $i = 0; $__LIST__ = $match_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <form method="post" action="" id="listform">
				<input type="hidden" name="match_id" value="<?php echo ($vo["match_id"]); ?>">
                <td style="text-align:left; padding-left:20px;">
                <?php echo ($vo["match_id"]); ?></td>
                <td><?php echo ($vo["level"]); ?>第
                <?php if($vo[league_round] == null ): echo ($vo["cup_round"]); ?>
                <?php else: ?>
                    <?php echo ($vo["league_round"]); endif; ?>
                轮</td>
                <td width="10%"><img src="<?php echo ($vo["hometeam"]["icon"]); ?>" alt="" width="70" height="50" /></td>
                <td><?php echo ($vo["hometeam"]["name"]); ?></td>
                <td><?php
 if($vo['start_time'] > time()){ $state = '--'; }elseif(($vo['start_time']<= time()) AND ($vo['start_time'] >(time() - 6300))){ $state = '直播中'; $live = '直播中'; }else{ $state = ''; $live = '比赛结束'; } ?>
					<?php if($vo['hometeam_score'] == null or $vo['vsitingteam_score'] == null or $state == 直播中): if($state == '' or $state == 直播中): ?><input type="text" value="<?php echo ($vo["hometeam_score"]); ?>" name="hometeam_score" style="width:50px;">:
						<input type="text" value="<?php echo ($vo["vsitingteam_score"]); ?>" name="vsitingteam_score" style="width:50px;">
						<input type="hidden" value="<?php echo ($vo["start_time"]); ?>" name="start_time" style="width:50px;">
						<input type="hidden" value="<?php echo ($vo["hometeam_id"]); ?>" name="hometeam_id" style="width:50px;">
						<input type="hidden" value="<?php echo ($vo["vsitingteam_id"]); ?>" name="vsitingteam_id" style="width:50px;">
						<input type="hidden" value="<?php echo ($vo["level"]); ?>" name="level" style="width:50px;">
						<?php else: ?>
						<?php echo ($state); endif; ?>
					<?php else: ?>
					<?php echo ($vo["hometeam_score"]); ?>:<?php echo ($vo["vsitingteam_score"]); endif; ?>
                </td>
                <td><?php echo ($vo["vsitingteam"]["name"]); ?></td>
                <td width="10%"><img src="<?php echo ($vo["vsitingteam"]["icon"]); ?>" alt="" width="70" height="50" /></td>
                <td><?php echo (date('Y-m-d H:i:s',$vo["start_time"])); ?></td>
                <td>
                    <div class="button-group"> 
                        <!-- <a class="button border-main" href="__ROOT__/index.php?m=index&a=show&id=<?php echo ($vo['id']); ?>" target="_black"><span class="icon-edit"></span> 查看</a> -->
                        <a class="button border-main" href="<?php echo U('index/match_edit',array('match_id'=>$vo['match_id']));?>"><span class="icon-edit"></span> 修改</a>
						<?php if($live == '直播中'): ?><button class="button border-main" type="submit"><span class="icon-edit"></span> 更新比分</button><?php endif; ?>
						<?php if($live == '比赛结束'): ?><a class="button tijiao" id="tijiao" href="<?php echo U('index/match_manage',array('match_id'=>$vo['match_id']));?>" ><span class="icon-edit"></span> 提交比分</a><?php endif; ?>
						
                        <a class="button border-red alone" rel="<?php echo ($vo["match_id"]); ?>" href="javascript:void(0)" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> 
                    </div>
                </td>
			</tr>
			</form><?php endforeach; endif; else: echo "" ;endif; ?>
      <!-- <tr> -->
	 
        <!-- <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/> -->
          <!-- 全选 </td> -->
        <!-- <td colspan="7" style="text-align:left;padding-left:20px;"> -->
            <!-- <a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()">删除</a> -->
            <!-- <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 操作： -->
            <!-- <select name="ishome" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeishome(this)"> -->
                <!-- <option value="">首页</option> -->
                <!-- <option value="1">是</option> -->
                <!-- <option value="0">否</option> -->
            <!-- </select> -->
            <!-- <select name="isvouch" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)"> -->
                <!-- <option value="">推荐</option> -->
                <!-- <option value="1">是</option> -->
                <!-- <option value="0">否</option> -->
            <!-- </select> -->
            <!-- <select name="istop" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeistop(this)"> -->
                <!-- <option value="">置顶</option> -->
                <!-- <option value="1">是</option> -->
                <!-- <option value="0">否</option> -->
            <!-- </select> -->
            <!-- &nbsp;&nbsp;&nbsp; -->

            <!-- 移动到： -->
            <!-- <select name="movecid" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecate(this)"> -->
                <!-- <option value="">请选择分类</option> -->
                <!-- <option value="">产品分类</option> -->
                <!-- <option value="">产品分类</option> -->
                <!-- <option value="">产品分类</option> -->
                <!-- <option value="">产品分类</option> -->
            <!-- </select> -->
            <!-- <select name="copynum" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecopy(this)"> -->
                <!-- <option value="">请选择复制</option> -->
                <!-- <option value="5">复制5条</option> -->
                <!-- <option value="10">复制10条</option> -->
                <!-- <option value="15">复制15条</option> -->
                <!-- <option value="20">复制20条</option> -->
            <!-- </select> -->
        <!-- </td> -->
      <!-- </tr> -->
      <tr>
        <td colspan="8"><div class="pagelist"><?php echo ($page); ?></div></td>
      </tr>
      
    </table>
  </div>
<script type="text/javascript">
//搜索
function changesearch(){	
}
//单个删除


$('.alone').click(function(){
		var match_id = $(this).attr('rel');
		if(match_id <= 0){
			alert('参数错误！');
			return false;
		}
		
		layer.confirm('确定要删除么？', {
			btn: ['确定','取消'] //按钮
		}, function(){
			window.location.href= "<?php echo U('index/match_delete', 'match_id=');?>"+match_id;
		}, function(){
			
		});
	});
//全选
<!-- $("#checkall").click(function(){  -->
  <!-- $("input[name='id[]']").each(function(){ -->
	  <!-- if (this.checked) { -->
		  <!-- this.checked = false; -->
	  <!-- } -->
	  <!-- else { -->
		  <!-- this.checked = true; -->
	  <!-- } -->
  <!-- }); -->
<!-- }) -->

<!-- //批量删除 -->
<!-- function DelSelect(){ -->
	<!-- var Checkbox=false; -->
	 <!-- $("input[name='id[]']").each(function(){ -->
	  <!-- if (this.checked==true) {		 -->
		<!-- Checkbox=true;	 -->
	  <!-- } -->
	<!-- }); -->
	<!-- if (Checkbox){ -->
		<!-- var t=confirm("您确认要删除选中的内容吗？"); -->
		<!-- if (t==false) return false;		 -->
		<!-- $("#listform").submit();		 -->
	<!-- } -->
	<!-- else{ -->
		<!-- alert("请选择您要删除的内容!"); -->
		<!-- return false; -->
	<!-- } -->
<!-- } -->

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>