<?php if (!defined('THINK_PATH')) exit();?><div class="comFrame" style="position: relative">
    <div id="comment_anchor" style="position:absolute; top:-55px; z-index:0;"></div>
    <h3 id="count">全部评论（<?php echo ($count); ?>）</h3>
    <ol id="all_comment">
        <?php if(is_array($commlist)): $i = 0; $__LIST__ = $commlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><li>
                <img src="<?php echo ($comment["headimg"]); ?>" class="head" alt="">
                <p class="nameCon">
                    <span class="name"><?php echo ($comment["username"]); ?></span>
                    <span class="time"><?php echo (date('Y-m-d H:i:s',$comment["updatetime"])); ?></span>
                </p>
                <p class="comCon"><?php echo ($comment["content"]); ?></p>
                <div class="image-view text-center"></div>
                <p></p>

                <?php if(is_array($comment['son'])): $i = 0; $__LIST__ = $comment['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="recomm">
                        <p>
                            <span class="name"><?php echo ($vo["username"]); ?></span>
                            <span class="time"><?php echo (date('Y-m-d H:i:s',$vo["updatetime"])); ?></span>
                        </p>
                        <p><?php echo ($vo["content"]); ?></p>
                        <div class="ctr" rel="<?php echo ($vo["comment_id"]); ?>" id="com_<?php echo ($vo["comment_id"]); ?>" res="<?php echo ($vo["username"]); ?>">
                            <a href="javascript:void(0);" onclick="up(<?php echo ($vo["comment_id"]); ?>)" class="zan" name="up_<?php echo ($vo["comment_id"]); ?>">赞（<?php echo ($vo["fabulous"]); ?>）</a>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                <div class="ctr" rel="<?php echo ($comment["comment_id"]); ?>" id="com_<?php echo ($comment["comment_id"]); ?>" res="<?php echo ($comment["username"]); ?>">
                    <a href="javascript:void(0);" class="report">举报</a>
                    <a href="javascript:void(0);" class="recom">回复</a>
                    <a href="javascript:void(0);" onclick="up(<?php echo ($comment["comment_id"]); ?>)" class="zan" name="up_<?php echo ($comment["comment_id"]); ?>">赞（<?php echo ($comment["fabulous"]); ?>）</a>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ol>
</div>
<?php echo ($page); ?>
<script>
    /* function index(id){
         alert('111');
         var id = id;
         //把数据传递到要替换的控制器方法中 url = "<?php echo U('Index/comment','parent_id');?>" + to_user_id;
         $.get("<?php echo U('Index/show','p');?>"+id, function(data){
             //用get方法发送信息到index中的myinfo方法
             $("#pjax-container").replaceWith(data.content);
         });
     }*/
</script>