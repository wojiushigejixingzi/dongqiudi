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
<script src="__PUBLIC__/js/calendar.js" type="text/javascript"></script>
<link rel="stylesheet" href="__PUBLIC__/css/cxcalendar.css">
<style type="text/css">
#tab a{
    margin-left:20px;
}

    input, select {
        padding: 5px;
        margin: 0px 0;
        border: 1px solid #aaa;
        box-sizing: border-box;
        border-radius: 5px;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -webkit-border-radius: 5px;
    }
    label{
        font-weight: 7 !important;
    }   
</style>
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">添加比赛</strong> </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="100" style="text-align:left; padding-left:20px;">比赛性质</th>
            <th width="100">轮次</th>
            <th width="10%">主队</th>
            <!-- <th width="10%">比分</th> -->
            <th>客队</th>
            <th>比赛开始时间</th>
            <th>直播地址</th>
            <th>信号来源</th>
            <th>推荐位</th>
            <!-- <th>属性</th>
            <th>分类名称</th> -->
            <th width="310"></th>
        </tr>
		<?php if(($_SESSION['category'] == 7)or($_SESSION['category'] == 1)): ?><tr>
                <form method="post" class="form-x" action="">
                    <td style="text-align:left; padding-left:20px;">中超</td>
                    <input type="hidden" name="level" value="中超">
                    <td>    
                        <select name="league_round" data-am-selected="{maxHeight: 10}">
                            <?php $__FOR_START_594419358__=1;$__FOR_END_594419358__=31;for($i=$__FOR_START_594419358__;$i < $__FOR_END_594419358__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
                        </select>
                    </td>
                    <td id="zhongchao">
                        <select data-am-selected name="homeTeam" id='B1other1_1' data-validate="required:请选择主队">
                                <option value=''>--请选择--</option>
                            <?php if(is_array($zhongchao)): $i = 0; $__LIST__ = $zhongchao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["team_id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
                        </select>
                    </td>
                    <td id="zhongchao">
                       <select data-am-selected name="vsitingTeam" id='B1other2_1' data-validate="required:请选择客队">
                                <option value=''>--请选择--</option>
                            <?php if(is_array($zhongchao)): $i = 0; $__LIST__ = $zhongchao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["team_id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select> 
                    </td>
                    <td>
                    <!-- appDateTime -->
                        <input name="appDateTime" type="text" class="input_cxcalendar" style="width:150px;" readonly="readonly" />
                    </td>
                    <td>
                        <input type="text" name="video_url">
                    </td>
                    <td>
                        <input type="text" name="lick_name">
                    </td>
                    <td>
                        <label class="ib" style="width:116px">
                            <input type="checkbox" name='position[]' id="_1"  value="1" <?php if(1 == $result['position']): ?>checked="checked"<?php endif; ?>> 首页比赛推荐
                        </label>  
                        <label class="ib" style="width:134px">
                            <input type="checkbox" name='position[]' id="_2"  value="2" <?php if(2 == $result['position']): ?>checked="checked"<?php endif; ?>> 比赛页重点推荐
                        </label>
                    </td>
                   
                    <td>
                        <button class="button bg-main icon-check-square-o" type="submit" > 提交</button>
                    </td>
                </form>
            </tr><?php endif; ?>
		<?php if(($_SESSION['category'] == 2)or($_SESSION['category'] == 1)): ?><tr>
                <form method="post" class="form-x" action="">
                    <td style="text-align:left; padding-left:20px;">英超</td>
                    <input type="hidden" name="level" value="英超">
                    <td>    
                        <select name="league_round" data-am-selected="{maxHeight: 10}">
                            <?php $__FOR_START_791514598__=1;$__FOR_END_791514598__=37;for($i=$__FOR_START_791514598__;$i < $__FOR_END_791514598__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
                        </select>
                    </td>
                    <td id="yingchao">
                        <select data-am-selected name="homeTeam" id='B1other1_1' data-validate="required:请选择主队">
                                <option value=''>--请选择--</option>
                            <?php if(is_array($yingchao)): $i = 0; $__LIST__ = $yingchao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["team_id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
                        </select>
                    </td>
                    <td id="yingchao">
                       <select data-am-selected name="vsitingTeam" id='B1other2_1' data-validate="required:请选择客队">
                                <option value=''>--请选择--</option>
                            <?php if(is_array($yingchao)): $i = 0; $__LIST__ = $yingchao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["team_id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select> 
                    </td>
                    <td>
                        <input name="appDateTime" type="text" class="input_cxcalendar" style="width:150px; text-align:center;" readonly="readonly" /> 
                    </td>
                    <td>
                        <input type="text" name="video_url">
                    </td>
                    <td>
                        <input type="text" name="lick_name">
                    </td>
                    <td>
                        <label class="ib" style="width:116px">
                            <input type="checkbox" name='position[]' id="_1"  value="1" <?php if(1 == $result['position']): ?>checked="checked"<?php endif; ?>> 首页比赛推荐
                        </label>  
                        <label class="ib" style="width:134px">
                            <input type="checkbox" name='position[]' id="_2"  value="2" <?php if(2 == $result['position']): ?>checked="checked"<?php endif; ?>> 比赛页重点推荐
                        </label>
                    </td>
                   
                    <td>
                        <button class="button bg-main icon-check-square-o" type="submit" > 提交</button>
                    </td>
                </form>
            </tr><?php endif; ?>
            
      <tr>
        <td colspan="9" style="text-align:left;padding-left:20px;"></td>
      </tr>
      <tr>
        <td colspan="8"><div class="pagelist"><?php echo ($page); ?></div></td>
      </tr>
      
    </table>
  </div>
  <!-- 主客队选择不重复   -->
<script type="text/javascript">

$(document).ready(function(){
    $('select').change(function(e){
    
        var td=$(this).parents('td').attr('id');//
        var oldvalue=$(this).attr('old');
        var currentvalue=$(this).find('option:checked').val();
    var id=$(this).attr('id');
        if(oldvalue){
            $('#'+td+' select').not('#'+id).find('option[value='+oldvalue+']').unwrap();//
        }
        $('#'+td+' select').not('#'+id).find('option[value='+currentvalue+']').wrap('<other></other>');//
        $(this).attr('old',currentvalue);
    });
});
</script>
<!-- 日期时间 插件-->
<script>
		$('.input_cxcalendar').each(function(){
			var a = new Calendar({
				targetCls: $(this),
				type: 'yyyy-mm-dd HH:MM',
				wday:2
			},function(val){
				console.log(val);
			});
		});
	</script>　
<script type="text/javascript">

        <!-- $(function () { -->
			<!-- var currYear = (new Date()).getFullYear();	 -->
			<!-- var opt={}; -->
			<!-- opt.date = {preset : 'date'}; -->
			<!-- opt.datetime = {preset : 'datetime'}; -->
			<!-- opt.time = {preset : 'time'}; -->
			<!-- opt.default = { -->
				<!-- theme: 'android-ics light', //皮肤样式 -->
		        <!-- display: 'modal', //显示方式  -->
		        <!-- mode: 'scroller', //日期选择模式 -->
				<!-- dateFormat: 'yyyy-mm-dd', -->
				<!-- lang: 'zh', -->
				<!-- showNow: true, -->
				<!-- nowText: "今天", -->
		        <!-- startYear: currYear, //开始年份 -->
		        <!-- endYear: currYear//结束年份 -->
			<!-- }; -->
		  	<!-- var optDateTime = $.extend(opt['datetime'], opt['default']); -->
		  	<!-- var optTime = $.extend(opt['time'], opt['default']); -->
		    <!-- $("#appDateTime").mobiscroll(optDateTime).datetime(optDateTime); -->
        <!-- }); -->
    </script>
</body>
</html>