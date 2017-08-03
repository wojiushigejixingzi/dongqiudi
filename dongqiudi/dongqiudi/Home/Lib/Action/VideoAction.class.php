<?php
class VideoAction extends Action{
	public function _initialize(){
		$refer = 'http://' . $_SERVER ['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// println($refer);die();
		$_SESSION['refer'] = $refer;
		
    }
	public function index(){
		$m_news = M('news');
        /* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',4,9)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		 /* 集锦 */
        // $jijin = $m_news ->alias('n')->where('n.news_level = 2')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		// $this->jijin = $jijin;
        /* 集锦end */
        /* 视频 */
        $shipin = $m_news ->alias('n')->where('n.news_level = 3')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($shipin as $k=>$v){
			$shipin[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->shipin = $shipin;
        /* 视频end */
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		// println($comment);die();
		
		$this->comment=$comment;
		$this->display();
	}
	public function jijin(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',5,9)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		/* 集锦 */
        $jijin = $m_news ->alias('n')->where('n.news_level = 2')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($jijin as $k=>$v){
			$jijin[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->jijin = $jijin;
        /* 集锦end */
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		// println($comment);die();
		$this->comment=$comment;
		$this->display();
	}
    public function show(){
        /*$m_news = M('news');
        //$id = $_GET['id'];
        $where['n.id'] = $_GET['id'];
        $where['d.id'] = $_GET['id'];
        $result = $m_news ->alias('n')->where($where)->join('fc_news_data as d on n.id = d.id')->join('fc_user as u on n.user_id = u.user_id')->find();

		if(empty($result)){
			$this->error('抱歉，暂无此条新闻','index/index');
			exit();
		}
		$num =  M('comment')->where('news_id = %d',$_GET['id'])->count(); //获取评论总数
    	$this->assign('num',$num);
		import('ORG.Util.Page');// 导入分页类
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
		$data = M('comment') ->alias('n')->where('news_id = %d',$_GET['id'])->join('fc_user as d on n.user_id = d.user_id')->page($nowPage,'7')->order('n.updatetime desc')->select();
		foreach($data as $k=>$v){
			if($v['parent_id'] != 0){
				$data[$k]['parent'] = M('comment') ->alias('n')->where('comment_id = %d',$v['parent_id'])->join('fc_user as d on n.user_id = d.user_id')->page($nowPage,'7')->order('n.updatetime desc')->find();
			}else{
				$data[$k] = $v;
			}
		}
		$count = M('comment')->where('news_id = %d',$_GET['id'])->count();
        $Page = new Page($count,7);
        $show = $Page->show();
        $this->page = $show;

		/* 精彩评论 */
		/*$comment_data['id'] = $_GET['id'];
		$comment_data['fabulous'] = array('egt','3');
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->where($comment_data)->order('fabulous desc')->select();
		$this->comment=$comment;

		$this->assign("commlist",$data);
        $this->result = $result;
		$this->display();*/
        $m_news = M('news');
        $where['n.id'] = $_GET['id'];
        $where['d.id'] = $_GET['id'];
        $result = $m_news ->alias('n')->where($where)->join('fc_news_data as d on n.id = d.id')->join('fc_user as u on n.user_id = u.user_id')->find();
        if(empty($result)){
            $this->error('抱歉，暂无此条新闻','index/index');
            exit();
        }
        $this->result = $result;

        $this->display();
	}
    /*ajax异步加载向数据库中添加评论*/
    public function comment(){
        // die('123');
        $new_id = I('get.news_id');
        if(I('post.content')){
            if($_GET['parent_id']){
                $data['parent_id'] = I('get.parent_id');
            }
            $data['content'] = I('post.content');
            $data['user_id'] = $_SESSION['user_id'];
            $data['updatetime'] = time();
            $data['news_id'] = I('post.news_id');
            $result = M('comment')->add($data);
        }
        //$p = I('get.p');
        import('ORG.Util.Ajaxpage');// 导入分页类
        $count = M('comment')->where('news_id = %d',$new_id)->count();
        $p = new \Common\Common\AjaxPage($count,7,'index');
        $page = $p->show();
        $data = M('comment') ->alias('n')->where('news_id = %d',$new_id)
            ->limit($p->firstRow.','.$p->listRows)
            ->join('fc_user as d on n.user_id = d.user_id')
            ->order('n.updatetime desc')->select();
        $data = getTree($data,'parent_id',0);
        $this->count=$count;
        $this->commlist=$data;
        $this->page=$page;
        $res['content'] = $this->fetch('comment');
        $this->ajaxReturn ($res);
    }
    /*public function comment_count(){
        $num =  M('comment')->where('news_id = %d',$_GET['id'])->count(); //获取评论总数
        $count = "<h3 id=\"count\">全部评论（".$num."）</h3>";
        echo json_encode($count);
    }*/
    /* getjson 异步加载评论列表 */
    /*public function comment_rerurn(){
        $comment_data = M('comment') ->alias('n')->where('news_id = %d',$_GET['id'])->join('fc_user as d on n.user_id = d.user_id')->order('n.updatetime desc')->select();
        $data = "";
        foreach($comment_data as $k=>$v){
            if($v['parent_id'] == 0){
                $comment_data = "<li>\n            <img src=\"".$v['headimg']."\" class=\"head\" alt=\"\">\n\n        <p class=\"nameCon\">\n            <span class=\"name\">".$v['username']."</span>\n            <span class=\"time\">".date('Y-m-d H:i:s',$v['updatetime'])."</span>\n        </p>\n    \n    <p class=\"comCon\">\n        ".$v['content']."\n        <div class=\"image-view text-center\">\n                    </div>\n    </p>\n    \n            <div class=\"ctr\" rel=\"".$v['comment_id']."\" id=\"com_".$v['comment_id']."\" res=\"".$v['username']."\">\n                        <a href=\"#\" class=\"report\">举报</a>\n            <a href=\"javascript:void(0);\" class=\"recom\">回复</a>\n            <a href=\"javascript:void(0);\" onclick=\"up(".$v['comment_id'].")\" class=\"zan\" name=\"up_".$v['comment_id']."\">赞（".$v['fabulous']."）</a>\n        </div>\n    </li>";
            }else{
                // $parent_data = M('comment')->where('comment_id = %d',$v['parent_id'])->find();
                $parent_data =  M('comment') ->alias('n')->where('comment_id = %d',$v['parent_id'])->join('fc_user as d on n.user_id = d.user_id')->order('n.updatetime desc')->find();
                $comment_data = "<li>\n            <img src=\"".$v['headimg']."\" class=\"head\" alt=\"\">\n\n        <p class=\"nameCon\">\n            <span class=\"name\">".$v['username']."</span>\n            <span class=\"time\">".date('Y-m-d H:i:s',$v['updatetime'])."</span>\n        </p>\n    \n    <p class=\"comCon\">\n        ".$v['content']."\n        <div class=\"image-view text-center\">\n                    </div>\n    </p>\n    \n     <div class=\"recomm\">\n            <p>\n                                    <span class=\"name\">".$parent_data['username']."</span>\n                                <span class=\"time\">".date('Y-m-d H:i:s',$parent_data['updatetime'])."</span>\n            </p>\n\n            <p>\n                ".$parent_data['content']."\n            </p>\n        </div>       <div class=\"ctr\" rel=\"".$v['comment_id']."\" id=\"com_".$v['comment_id']."\" res=\"".$v['username']."\">\n                        <a href=\"#\" class=\"report\">举报</a>\n            <a href=\"javascript:void(0);\" class=\"recom\">回复</a>\n            <a href=\"javascript:void(0);\" onclick=\"up(".$v['comment_id'].")\" class=\"zan\" name=\"up_".$v['comment_id']."\">赞（".$v['fabulous']."）</a>\n        </div>\n    </li>";
            }

            $data = $data.$comment_data;
        }
        echo json_encode($data);
        // println($data);die();
    }*/
	public function up(){
		$ip=$_SERVER["REMOTE_ADDR"]; //获取点赞用户ip
		$comment_id = $_POST['comment_id'];
		$where['user_id'] = $_SESSION['user_id'];
		$where['comment_id'] = $comment_id;
		$ip_count = M('comment_fabulous')->where($where)->select();
		if(empty($ip_count)){//如果没有记录
			$add_fabulous = M('comment')->where('comment_id = %d',$comment_id)->setInc('fabulous');//使赞+1
			$comment_fabulous = M('comment_fabulous')->add($where);
			$comment = M('comment')->where('comment_id = %d',$comment_id)->find();
			$fabulous = $comment['fabulous'];
			echo $fabulous;
		}else{
			echo("赞过了");
		}
	}
}
?>