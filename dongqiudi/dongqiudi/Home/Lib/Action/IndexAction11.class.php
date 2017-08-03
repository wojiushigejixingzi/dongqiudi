<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	public function _initialize(){
		$refer = 'http://' . $_SERVER ['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// println($refer);die();
		$_SESSION['refer'] = $refer;
		
    }
    public function index(){
		$m_news = M('news');
        /* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        // println($focus_img);die(); 
        $this->focus_img = $focus_img;
        /* end */
		/*首页头条  */
		// $toutiao = $m_news ->alias('n')->where('n.position = 1')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		$toutiao = $m_news ->alias('n')->where('n.position =%d or n.position =%d',1,3)->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		
		// $arr = array();
		foreach($toutiao as $k=>$v){
			$toutiao[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->toutiao = $toutiao;
        /* 首页头条end */
		// $num =  M('comment')->where('news_id = %d',$_GET['id'])->count(); //获取评论总数
		
    	$this->assign('num',$num);
        /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
			// echo M()->_sql();die();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
		// println($match_data);die();
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		// println($comment);die();
		$this->comment=$comment;
		// println($comment);die();
        $this->display();
        /* 焦点图右侧推荐赛事对战表 */
    }
	public function jijin(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
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
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function shipin(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		/* 视频 */
        $shipin = $m_news ->alias('n')->where('n.news_level = 3')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($shipin as $k=>$v){
			$shipin[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->shipin = $shipin;
        /* 视频end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function guonei(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		/* 国内 */
        $guonei = $m_news ->alias('n')->where('n.news_level = 4')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($guonei as $k=>$v){
			$guonei[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->guonei = $guonei;
        /* 国内 */
        /* 视频end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function shendu(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		/* 深度 */
        $shendu = $m_news ->alias('n')->where('n.news_level = 5')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($shendu as $k=>$v){
			$shendu[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->shendu = $shendu;
        /* 深度end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function xianqing(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		 /* 闲情 */
        $xianqing = $m_news ->alias('n')->where('n.news_level = 6')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($xianqing as $k=>$v){
			$xianqing[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->xianqing = $xianqing;
        /* 闲情end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function yingchao(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		  /* 英超 */
        $yingchao = $m_news ->alias('n')->where('n.news_level = %d',7)->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($yingchao as $k=>$v){
			$yingchao[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->yingchao = $yingchao;
        /* 英超end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function xijia(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		  /* 西甲 */
        $xijia = $m_news ->alias('n')->where('n.news_level = 8')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($xijia as $k=>$v){
			$xijia[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->xijia = $xijia;
        /* 西甲end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function dejia(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		  /* 德甲 */
        $dejia = $m_news ->alias('n')->where('n.news_level = 9')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($dejia as $k=>$v){
			$dejia[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->dejia = $dejia;
        /* 德甲end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function yijia(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		 /* 意甲 */
        $yijia = $m_news ->alias('n')->where('n.news_level = 10')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($yijia as $k=>$v){
			$yijia[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->yijia = $yijia;
        /* 意甲end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function wuzhou(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		 /* 五洲 */
        $wuzhou = $m_news ->alias('n')->where('n.news_level = 11')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($wuzhou as $k=>$v){
			$wuzhou[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->wuzhou = $wuzhou;
        /* 五洲end */  
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function zhuanti(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		/* 专题 */
        $zhuanti = $m_news ->alias('n')->where('n.news_level = 12')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($zhuanti as $k=>$v){
			$zhuanti[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->zhuanti = $zhuanti;
        /* 专题end */ 
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		// echo M()->_sql();die();
		// println($zhongchao);die();
		$this->zhongchao_league_integral = $zhongchao_league_integral;
		/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function zhuangbei(){
		$m_news = M('news');
		/* 首页焦点图推荐 */
        $focus_img  = $m_news ->alias('n')->join('fc_news_data as d on n.id = d.id')->limit('5')->where('position =%d or position =%d',2,3)->order('n.id desc')->select();
        /* println($focus_img);die(); */
        $this->focus_img = $focus_img;
        /* end */
		/* 装备 */
        $zhuangbei = $m_news ->alias('n')->where('n.news_level = 13')->join('fc_news_data as d on n.id = d.id')->order('n.id desc')->select();
		foreach($zhuangbei as $k=>$v){
			$zhuangbei[$k]['num'] = M('comment')->where('news_id = %d',$v['id'])->count();
		}
		$this->zhuangbei = $zhuangbei;
        /* 装备end */
		 /* 焦点图右侧推荐赛事对战表 */
        $m_match = M('match');
        $m_team = M('team');
        $match_data = $m_match->where('position = %d or position =%d',1,3)->limit(5)->order('match_id desc')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
        $this->match_data = $match_data;
		$zhongchao_league_integral = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->limit('10')->select();
		$this->zhongchao_league_integral = $zhongchao_league_integral;/* 评论 */
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->order('fabulous desc')->limit(5)->select();
		$this->comment=$comment;
		$this->display();
	}
	public function show(){
        $m_news = M('news');
        $where['n.id'] = $_GET['id'];
        $where['d.id'] = $_GET['id'];
        $result = $m_news ->alias('n')->where($where)->join('fc_news_data as d on n.id = d.id')->join('fc_user as u on n.user_id = u.user_id')->find();
		
		if(empty($result)){
			$this->error('抱歉，暂无此条新闻','index/index');
			exit();
		}
		$num =  M('comment')->where('news_id = %d',$_GET['id'])->count(); //获取评论总数
		// echo M()->_sql();die();
    	$this->assign('num',$num);
		// $data=$this->getCommlist();//获取评论列表
		import('ORG.Util.Page');// 导入分页类
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
		$data = M('comment') ->alias('n')->where('news_id = %d',$_GET['id'])->join('fc_user as d on n.user_id = d.user_id')->page($nowPage,'7')->order('n.updatetime desc')->select();
		// println($data);die();
		foreach($data as $k=>$v){
			if($v['parent_id'] != 0){
				 // M('comment')->where('comment_id = %d',$v['parent_id'])->find();
				$data[$k]['parent'] = M('comment') ->alias('n')->where('comment_id = %d',$v['parent_id'])->join('fc_user as d on n.user_id = d.user_id')->page($nowPage,'7')->order('n.updatetime desc')->find();
			}else{
				$data[$k] = $v;
			}
		}
		 // println($data);die();
		$count = M('comment')->where('news_id = %d',$_GET['id'])->count();
        $Page = new Page($count,7);
        $show = $Page->show();
        $this->page = $show;
    	
		/* 精彩评论 */
		$comment_data['id'] = $_GET['id'];
		$comment_data['fabulous'] = array('egt','3');
		$d_comment_Model = D('CommentView');
		$comment = $d_comment_Model->where($comment_data)->order('fabulous desc')->select();
		$this->comment=$comment;
		
		$this->assign("commlist",$data);
        $this->result = $result;
		$this->display();
	}
	/* 获取评论总数 */
	public function comment_count(){
		$num =  M('comment')->where('news_id = %d',$_GET['id'])->count(); //获取评论总数
		$count = "<h3 id=\"count\">全部评论（".$num."）</h3>";
		echo json_encode($count);
	}
	/*ajax异步加载向数据库中添加评论*/
	public function comment(){
		$m_comment = M('comment');
		if($_GET['parent_id']){
			$data['parent_id'] = $_GET['parent_id'];
		}
		$data['content'] = $_POST['content'];
		$data['news_id'] = $_POST['news_id'];
		$data['user_id'] = $_SESSION['user_id'];
		$data['updatetime'] = time();
		$result = $m_comment->add($data);

        import('ORG.Util.Page');// 导入分页类
        $nowPage = isset($_GET['p'])?$_GET['p']:1;

        $comment_data = M('comment') ->alias('n')->where('news_id = %d',$_POST['news_id'])->join('fc_user as d on n.user_id = d.user_id')->order('n.updatetime desc')->page($nowPage,'7')->select();
        $data = "";
        foreach($comment_data as $k=>$v){
            if($v['parent_id'] != 0){
                $comment_data[$k]['parent_data'] =  M('comment') ->alias('n')->join('fc_user as d on n.user_id = d.user_id')->where('comment_id = %d',$v['parent_id'])->order('n.updatetime desc')->find();

            }
        }
        $count = M('comment')->where('news_id = %d',$_POST['news_id'])->count();
        $Page = new Page($count,7);
        $show = $Page->show();
        $this->page = $show;

        $this->assign('comments',$count);
        $this->assign('comments',$comment_data);

        $this->display("comment");


//		return $this->comment_rerurn($data['news_id']);
	}
	/* getjson 异步加载评论列表 */
	public function comment_rerurn($newId=0){
		if($newId==0){
			$newId=$_GET['id'];
		}
		import('ORG.Util.Page');// 导入分页类
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
		
		$comment_data = M('comment') ->alias('n')->where('news_id = %d',$newId)->join('fc_user as d on n.user_id = d.user_id')->order('n.updatetime desc')->page($nowPage,'7')->select();
		$data = "";
		foreach($comment_data as $k=>$v){
			if($v['parent_id'] != 0){
				$comment_data[$k]['parent_data'] =  M('comment') ->alias('n')->join('fc_user as d on n.user_id = d.user_id')->where('comment_id = %d',$v['parent_id'])->order('n.updatetime desc')->find();

			}
		}
        $count = M('comment')->where('news_id = %d',$newId)->count();
		$Page = new Page($count,7);
        $show = $Page->show();
        $this->page = $show;

		$this->assign('comments',$comment_data);

		$this->display("comment");
	}
	
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
    public function ajax(){
        $name = $_GET['name'];
        echo '1';
    }
}