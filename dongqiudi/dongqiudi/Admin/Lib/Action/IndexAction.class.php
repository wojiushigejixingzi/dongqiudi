<?php
// 本类由系统自动生成，仅供测试用途

class IndexAction extends Action {
	public function _initialize(){
		$nologin = array('login');
		$a = ACTION_NAME;
		if(!in_array($a,$nologin)){
			if(!session('account')){
			$this->error('请先登录！', U('user/login'));
				exit();
			}
		}
    }
	 public function index(){
		
		$this->display();
	} 
/* 	public function clear(){//清除球队表里的积分数据
		$m_team=M('Team');
		$data['league_goal'] = 0;
		$data['league_fumble'] = 0;
		$data['goal_difference'] = 0;
		$data['league_win'] = 0;
		$data['league_equal'] = 0;
		$data['league_fail'] = 0;
		$data['league_integral'] = 0;
		$data['matches'] = 0;
		$team_id = $m_team->field('team_id')->select();
		// println($team_id);die();
		foreach($team_id as $k=>$v){
			// print_r($v);
			// echo '-';
			$clear_team_data = $m_team->where('team_id = %d',$v)->setField($data);
		}
		println($clear_team_data);
		// $this->display();
	}  */
	
	/* 首页轮播 */  
	public function adv(){
		
		
		
		
		$this->display();
    }
	// public function info(){
		
		
		// $this->display();
	// }
	public function book(){
		
		
		$this->display();
	}
	public function user(){
		$m_user = M('user');
		$user_data = $m_user->order('user_id desc')->select();
		// println($user_data);die();
		$this->user_data = $user_data;
		if($_GET['admin_id']>=0){
			// die('1111');
			$data['category'] = $_GET['admin_id'];
			if($_GET['user_id']){
				$result = $m_user->where('user_id = %d',$_GET['user_id'])->save($data);
				$this->success("设置成功。。。");
				exit();
			}
		}
		$this->display();
	}

	//内容管理
    public function lists(){
        $m_news = M('news');
        $keywords = trim($_REQUEST['keywords']);
        if($keywords){
            $where['title'] = array('like','%'.$keywords.'%'); 
        }
        import('ORG.Util.Page');// 导入分页类
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
		$result = $m_news ->alias('n')->where($where)->order('n.id desc')->join('fc_news_data as d on n.id = d.id')->page($nowPage,'7')->select();
		// println($result);die();
        $count = $m_news->where($where)->count();
        $Page = new Page($count,7);
        $show = $Page->show();
        $this->page = $show;
		$this->result = $result;
		$this->display();
	}
	//内容删除
	public function lists_delete(){
		$m_news = M('news');
        $m_news_data = M('news_data');
        $id = $_REQUEST['id'];
        if(is_array($id)){   
            $where = 'id in('.implode(',',$id).')';  
        }else{  
            $where = 'id='.$id; 
        }
        $delete_news_result = $m_news->where($where)->delete();
        $delete_news_data_result = $m_news_data->where($where)->delete();
		if($delete_news_result and $delete_news_data_result){
			$this->success('删除成功！');
			exit();
		}else{
			$this->error('删除失败11111');
			exit();
		}
	}
    //添加及修改
	public function add(){
		$m_news = M('news');
		$m_news_data = M('news_data');
        $id = $_GET['id'];
		if($this->isPOST()){
            $content=I('post.content');//获取富文本编辑器内容
			// println($content);die();
			$findme = 'embed';
			$mystring = stripcslashes($content);
			$pos= stripos($mystring,$findme);
			if($pos){
				// println($_FILES);die();
				if (isset($_FILES['video_thumb']['size'])&& $_FILES['video_thumb']['size'] > 0) {
					// die('111');
					import('@.ORG.UploadFile');
					$upload = new UploadFile();
					$upload->maxSize = 20000000;
					$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
					$upload->replace = 'true';
					$dirname = video_thumb.'/';
					if (!is_dir($dirname) && !mkdir($dirname, 0777, true)) {
						$this->error("上载目录的附件不能写入");
						exit();
					}
					$upload->savePath = $dirname;
					if(!$upload->upload()) {
						$this->error($upload->getErrorMsg());
						exit();
					}else{
						$info =  $upload->getUploadFileInfo();
					}
					if(is_array($info[0]) && !empty($info[0])){
						$file_name = $dirname . $info[0]['savename'];
						
					}else{
						$this->error('上传图片失败');
						exit();
					}
					
					$m_user->video_thumb = $file_name;
					$news['thumb'] = $file_name;
					// println($news['video_thumb']);die();
				}
				// die('222');
				/* 获取视频链接 */
				$start1=strpos($mystring,'getflashplayer',0); 
				$end1=strpos($mystring,'wmode',0); 
				$video_url = substr($mystring,$start1+31,$end1-$start1-83);//http://player.youku.com/embed/XMjYyOTc4MzQ4OA==
				/* 获取视频缩略图地址 */
				// $info = str_replace('/dongqiudi/','',getPic($content));
				/*end  */
				/*获取内容除去视频链接 及缩略图*/
						

				$start2=strpos($content,'embed'); //去掉视频  
				$end2=strpos($content,'allowfullscreen'); 
				$html = substr($content,$start2-13,$end2-$start2+63);
				
				$content =stripcslashes(stripslashes(htmlspecialchars_decode(str_replace($html,'',$content))));
				
				
				$title = $_POST['title'];
				$news_level = $_POST['news_level'];
				
				 //计算推荐位
				$position = 0;
				if($_POST['position']){
					foreach($_POST['position'] as $k=>$v){
						$position += $v;
					}
					$news['position'] = $position;
				}
				// println($news['position']);die();
				/* if($_POST['position']){
					$news['position'] = $_POST['position'];
				} */
				$news['inputtime'] = time();
				$news['news_level']=$news_level;
				$news['title']=$title;
				if($_SESSION['user_id']){
					$news['user_id']=$_SESSION['user_id'];
				}
				// println($news);die();
				$news_result = $m_news->add($news);//向news表中插入数据
				if(empty($content)){
					$news_data['content']=$content;
				}else{
					$news_data['content']='<p><span st' . $content;
				}
				
				
				$news_data['video_url']=$video_url;
				// println($news_data);die();
				$news_data_result = $m_news_data->add($news_data);//向news_data表中插入数据
				if($news_result and $news_data_result){
					$this->success('添加成功！');
					exit();
				}else{
					$this->error('添加失败');
					exit();
				}
			}else{
				$info = str_replace('/dongqiudi/','',getPic($content));//使用函数 返回匹配地址 如果不为空则声称缩略图
				// 
				if($id){
					//修改
					$title = $_POST['title'];
					$key_words = $_POST['key_words'];
					$description = $_POST['description'];
					$content = stripcslashes($_POST['content']);
					$add_introduce = $_POST['add_introduce'];
					$introcude_length = $_POST['introcude_length'];
					$auto_thumb = $_POST['auto_thumb'];
					$auto_thumb_no = $_POST['auto_thumb_no'];
					/* if($_POST['position']){
						
						$news['position'] = $_POST['position'];
					}else{
						$news['position'] = 0;
					} */
					
					 //计算推荐位
					$position = 0;
					if($_POST['position']){
						foreach($_POST['position'] as $k=>$v){
							$position += $v;
						}
						$news['position'] = $position;
					}
					
					$news['thumb'] = $info;
					$news['title']=$title;
					$news['key_words']=$key_words;
					$news['description']=$description;
					$news_data['content']=$content;
					$news_result = $m_news->where('id = %d',$id)->save($news);//修改news表中数据
					$news_data_result = $m_news_data->where('id = %d',$id)->save($news_data);//修改news_data表中数据
					if($news_result or $news_data_result){
						$this->success('修改成功',U('index/lists'));
					}
				}else{
					//添加
					$title = $_POST['title'];
					$news_level = $_POST['news_level'];
					$content = stripcslashes($_POST['content']);
					$add_introduce = $_POST['add_introduce'];
					$introcude_length = $_POST['introcude_length'];
					$auto_thumb = $_POST['auto_thumb'];
					$auto_thumb_no = $_POST['auto_thumb_no'];
					$inputtime = time();
					/* if($_POST['position']){
						$news['position'] = $_POST['position'];
					} */
					 //计算推荐位
					$position = 0;
					if($_POST['position']){
						foreach($_POST['position'] as $k=>$v){
							$position += $v;
						}
						$news['position'] = $position;
					}
					// println($news['position']);die();
					$news['thumb'] = $info;
					$news['title']=$title;
					$news['inputtime'] = $inputtime;
					if($_POST['key_words']){
						$news['key_words']=$_POST['key_words'];
					}
					if($_POST['description']){
						$news['description']=$_POST['description'];
					}
					$news['news_level']=$news_level;
					if($_SESSION['user_id']){
						$news['user_id']=$_SESSION['user_id'];
					}
					// println($news);die();
					$news_result = $m_news->add($news);//向news表中插入数据
					//println($news_level);die();
					$news_data['content']=$content;
					$news_data_result = $m_news_data->add($news_data);//向news_data表中插入数据
					if($news_result and $news_data_result){
						$this->success('添加成功！');
						exit();
					}else{
						$this->error('添加失败');
						exit();
					}
				}
			}
		}else{
            $result = $m_news ->alias('n')->where('n.id = %d',$id)->join('fc_news_data as d on n.id = d.id')->find();
            /* echo M()->_sql();die();*/
            //println($result);die();
            $this->result = $result;
        }
		$this->display();
	}
    //添加及修改球队
    public function add_team(){
        $m_team = M('team');
        $team_id = $_GET['team_id'];
        if($this->isPOST()){
            //上传队徽
			// println($_FILES);die();
            if (isset($_FILES['icon']['size'])&& $_FILES['icon']['size'] > 0) {
                import('@.ORG.UploadFile');
                $upload = new UploadFile();
                $upload->maxSize = 20000000;
                $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
                $upload->replace = 'true';
                $dirname = icon.'/';
                if (!is_dir($dirname) && !mkdir($dirname, 0777, true)) {
                    $this->error("上载目录的附件不能写入");
                    exit();
                }
                $upload->savePath = $dirname;
                if(!$upload->upload()) {
                    $this->error($upload->getErrorMsg());
                    exit();
                }else{
                    $info =  $upload->getUploadFileInfo();
                }
                if(is_array($info[0]) && !empty($info[0])){
                    $file_name = $dirname . $info[0]['savename'];
                    
                }else{
                    $this->error('上传图片失败');
                    exit();
                }
                
                $m_user->icon = $file_name;
                $data['icon'] = $file_name;
            }
            if($team_id){
                $data['league'] = $_POST['league'];
                $data['cup'] = $_POST['cup'];
                $data['name'] = $_POST['name'];
                //println($data);die();
                $edit_team = $m_team->where('team_id = %d',$team_id)->save($data);
               /*  var_dump($edit_team);die(); */
                if($edit_team>=0){
                    $this->success('修改成功',U('index/team_manage'));
                }else{
                    $this->error('修改失败，请重新修改');
                    exit();
                }
            }else{
                $data['league'] = $_POST['league'];
                $data['cup'] = $_POST['cup'];
                $data['name'] = $_POST['name'];
                $addteam_result = $m_team->add($data);
               // echo M()->_sql();die();
                if($addteam_result){
                    $this->success('球队添加成功');
                    exit();
                }else{
                    $this->error('球队添加失败，请重新添加');
                    exit();
                }
            }
        }else{
            $edit_team = $m_team->where('team_id = %d',$team_id)->find();
            $this->edit_team = $edit_team;
        }
        //修改球队
        $this->display(); 
    }
    public function team_manage(){
        $m_team = M('team');
        if($_GET['classification']){
            $classification = $_GET['classification'];
            //array('%thinkphp%','%tp')  $where['province'] = array('like','%'.$search.'%');
            $where[$classification] = array('like','%'.$_GET['name'].'%');
        }else{
            $where['name'] = array('like','%'.$_GET['name'].'%');
        }
        
        import('ORG.Util.Page');// 导入分页类
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $league = $m_team->where($where)->order('team_id desc')->page($nowPage,'7')->select();
        //echo M()->_sql();die();
        $count = $m_team->where($where)->count();
        $Page = new Page($count,7);
        $show = $Page->show();
        $this->page = $show;
        $this->league = $league;
        //echo M()->_sql();
        // println($league);
        $this->display();
    }
    public function team_manage_delete(){
        $m_team = M('team');
        $id = $_REQUEST['id'];
         if(is_array($id)){   
            $where = 'team_id in('.implode(',',$id).')';  
        }else{  
            $where = 'team_id='.$id; 
        }
        //println($where);die();
        $delete_team = $m_team->where($where)->delete();
        if($delete_team){
            $this->success("删除成功");
            exit();
        }else{
            
        }
    }
    public function add_match(){
        $m_match = M('match');
        $m_team = M('team');
       
        if($this->isPOST()){
            $user_id = $_POST['user_id'];
            $league_round = $_POST['league_round'];
            $homeTeam_id = $_POST['homeTeam'];
            $vsitingteam_id = $_POST['vsitingTeam'];
            $level = $_POST['level'];
            $start_time = strtotime($_POST['appDateTime']);
            
            $data['league_round'] = $league_round;
            $data['hometeam_id'] = $homeTeam_id;
            
            $data['vsitingteam_id'] = $vsitingteam_id;
            if($_POST['video_url']){
                $data['video_url'] = $_POST['video_url'];
            }
            if($_POST['lick_name']){
                $data['lick_name'] = $_POST['lick_name'];
            }
            //计算推荐位
            $position = 0;
            if($_POST['position']){
                foreach($_POST['position'] as $k=>$v){
                    $position += $v;
                }
                $data['position'] = $position;
            }
            
            
            $data['level'] = $level;
            $data['start_time'] = $start_time;
            // $data['state'] = $state;
            // var_dump($data['position']);die();
            
            $match = $m_match->add($data);
            if($match){
                $this->success('比赛添加成功');
                exit();
            }else{
                $this->error('比赛添加失败');
                exit();
            }
            
        }
        /* 中超 */
        $zhongchao = $m_team->where('league = "%s"',"中超")->select();
        $this->zhongchao = $zhongchao;
        /* 中超 */
        /* 英超 */
        $yingchao = $m_team->where('league = "%s"',"英超")->select();
        $this->yingchao = $yingchao;
        /* 英超 */
        /* 西甲 */
        $xijia = $m_team->where('league = "%s"',"西甲")->select();
        $this->xijia = $xijia;
        /* 西甲 */
        /* 德甲 */
        $dejia = $m_team->where('league = "%s"',"德甲")->select();
        $this->dejia = $dejia;
        /* 德甲 */
        /* 意甲 */
        $yijia = $m_team->where('league = "%s"',"意甲")->select();
        $this->yijia = $yijia;
        /* 意甲 */
        /* 法甲 */
        $fajia = $m_team->where('league = "%s"',"法甲")->select();
        $this->fajia = $fajia;
        /* 法甲 */
       
        $this->display();
    }
    public function match_manage(){
        $m_match = M('match');
        $m_team = M('team');
		if($_GET['keywords']){
            $classification = $_GET['classification'];
            //array('%thinkphp%','%tp')  $where['province'] = array('like','%'.$search.'%');
            $where[$classification] = array('like','%'.$_GET['keywords'].'%');
        }
		import('ORG.Util.Page');// 导入分页类
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $match_data = $m_match->order('match_id desc')->page($nowPage,'8')->select(); 
        foreach($match_data as $key => $value){
            $match_data[$key]['hometeam'] = $m_team->where('team_id = %d ',$value['hometeam_id'])->find();
            $match_data[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
        }
		$count = $m_match->count();
        $Page = new Page($count,8);
        $show = $Page->show();
        $this->page = $show;
        $this->match_data = $match_data;
        
        /* 修改比分 */
         if($_POST['match_id']){
                $match_id = $_POST['match_id'];
                if($_POST['hometeam_score']==null or $_POST['vsitingteam_score']==null){
                    $this->error('需要填写比分哦');
                }else{
                    $score_data['hometeam_score'] = $_POST['hometeam_score'];
                    $score_data['vsitingteam_score'] = $_POST['vsitingteam_score'];
                    $data['hometeam_score'] = $score_data['hometeam_score'];
                    $data['vsitingteam_score'] = $score_data['vsitingteam_score'];
                    $result = $m_match->where('match_id = %d',$match_id)->save($data);
                    if($result){
						$this->success('比分更新成功');
                    }else{
                        $this->error('您没有比分需要修改哦！');
                    }
                }
            }
			/* 提交比分 更新到积分榜 */
			if($_GET['match_id']){
					$match_data = $m_match->where('match_id = %d',$_GET['match_id'])->find();
					//主队
					$home_team = $m_team->where('team_id = %d',$match_data['hometeam_id'])->find();
					$home_data['league_goal'] = $home_team['league_goal'] + $match_data['hometeam_score'];//进球
					$home_data['league_fumble'] = $home_team['league_fumble'] + $match_data['vsitingteam_score'];//失球
					$home_data['matches'] = $home_team['matches'] + 1;//比赛场次
					$home_data['goal_difference'] = $home_data['league_goal'] - $home_data['league_fumble'];//净胜球
					if($match_data['hometeam_score'] > $match_data['vsitingteam_score']){
						$home_data['league_integral'] = $home_team['league_integral'] + 3;
						$home_data['league_win'] = $home_team['league_win'] + 1;
					}elseif($match_data['hometeam_score'] == $match_data['vsitingteam_score']){
						$home_data['league_integral'] = $home_team['league_integral'] + 1;
						$home_data['league_equal'] = $home_team['league_equal'] + 1;
					}else{
						$home_data['league_fail'] = $home_team['league_fail'] + 1;
					}
					$hometeam_result = $m_team->where('team_id = %d',$match_data['hometeam_id'])->save($home_data);
					//主队 
					// 客队
					$vsitingteam = $m_team->where('team_id = %d',$match_data['vsitingteam_id'])->find();
					$vsiting_data['league_goal'] = $vsitingteam['league_goal'] + $match_data['vsitingteam_score'];
					$vsiting_data['league_fumble'] = $vsitingteam['league_fumble'] + $match_data['hometeam_score'];
					$vsiting_data['matches'] = $vsitingteam['matches'] + 1;
					
					$vsiting_data['goal_difference'] = $vsiting_data['league_goal'] - $vsiting_data['league_fumble'];
					if($match_data['hometeam_score'] > $match_data['vsitingteam_score']){
						$vsiting_data['league_fail'] = $vsitingteam['league_fail'] + 1;
						
					}elseif($match_data['hometeam_score'] == $match_data['vsitingteam_score']){
						$vsiting_data['league_integral'] = $vsitingteam['league_integral'] + 1;
						$vsiting_data['league_equal'] = $vsitingteam['league_equal'] + 1;
					}else{
						$vsiting_data['league_integral'] = $vsitingteam['league_integral'] +3;
						$vsiting_data['league_win'] = $vsitingteam['league_win'] + 1;
					}
					$vsitingteam_result = $m_team->where('team_id = %d',$match_data['vsitingteam_id'])->save($vsiting_data);
					//客队
			}
        $this->display();
    }
    public function match_edit(){
        $m_match = M('match');
        $m_team = M('team');
         /* 中超 */
        $zhongchao = $m_team->where('league = "%s"',"中超")->select();
        $this->zhongchao = $zhongchao;
        /* 中超 */
        /* 英超 */
        $yingchao = $m_team->where('league = "%s"',"英超")->select();
        $this->yingchao = $yingchao;
        /* 英超 */
        /* 西甲 */
        $xijia = $m_team->where('league = "%s"',"西甲")->select();
        $this->xijia = $xijia;
        /* 西甲 */
        /* 德甲 */
        $dejia = $m_team->where('league = "%s"',"德甲")->select();
        $this->dejia = $dejia;
        /* 德甲 */
        /* 意甲 */
        $yijia = $m_team->where('league = "%s"',"意甲")->select();
        $this->yijia = $yijia;
        /* 意甲 */
        /* 法甲 */
        $fajia = $m_team->where('league = "%s"',"法甲")->select();
        $this->fajia = $fajia;
        /* 法甲 */
        if($this->isPOST()){
            if($_POST['league_round']){
                $data['league_round'] = $_POST['league_round'];
            }
            if($_POST['homeTeam'] and $_POST['vsitingTeam']){
                $data['hometeam_id'] = $_POST['homeTeam'];
                $data['vsitingteam_id'] = $_POST['vsitingTeam'];
                $data['start_time'] = strtotime($_POST['appDateTime']);
                //
                if($_POST['video_url']){
                    $data['video_url'] = $_POST['video_url'];
                }
                if($_POST['lick_name']){
                    $data['lick_name'] = $_POST['lick_name'];
                }
                //计算推荐位
                $position = 0;
                if($_POST['position']){
                    foreach($_POST['position'] as $k=>$v){
                        $position += $v;
                    }
                    $data['position'] = $position;
                }
                //println($data);die();
                $result = $m_match->where('match_id = %d',$_GET['match_id'])->save($data);
                //println($result);die();
                if($result>=0){
                    $this->success('编辑成功');
                    exit();
                }else{
                    $this->error('编辑失败');
                    exit();
                }
            }else{
                $this->error('请选择主客队！');
                exit();
            }
        }
        if($_GET['match_id']){
            $match = $m_match->where('match_id = %d',$_GET['match_id'])->find();
           
            $hometeam = $m_team->where('team_id = %d',$match['hometeam_id'])->find();
            $vsitingteam = $m_team->where('team_id = %d',$match['vsitingteam_id'])->find();
            $match_team = array();
            $match_team['match'] = $match;
            $match_team['hometeam'] = $hometeam;
            $match_team['vsitingteam'] = $vsitingteam;
            //println($match_team);die();
            $this->match_team = $match_team;
           // println($match_team);die();
        }
        $this->display();
    }
    public function match_delete(){
        $m_match = M('match');
        if($_GET['match_id']){
            $result = $m_match->where('match_id = %d',$_GET['match_id'])->delete();
            if($result){
                $this->success('删除成功');
                exit();
            }else{
                $this->error('删除失败');
                exit();
            }
        }else{
            $this->error('无法获取赛事编号，无法删除');
        }
        $this->display();
    }
    
}