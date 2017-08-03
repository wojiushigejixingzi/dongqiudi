<?php
class UserAction extends Action{
	
	/* 生成随机账号 */
	public function login(){
		$m_user = M('user');
		$refer = session('refer');//在什么地方点击退出，退出成功后就返回到哪
		if($this->isPost()){
			$account = $_POST['account'];
			//print_r($account);die();
			$password = $_POST['password'];
			$result = $m_user->where('account = "%s"',$account)->find();
			if($result){
				if($result['password'] == md5($password)){
					$_SESSION['user_id'] = $result['user_id'];
					$_SESSION['username'] = $result['username'];
					$_SESSION['headimg'] = $result['headimg'];
					$_SESSION['account'] = $account;
					
					//print_r($_SESSION['username']);die();
					$this->success('登陆成功，正在跳转...',$refer);
					exit();
				}else{
					$this->error('密码错误，请重新登陆',U('User/login'));
					exit();
				}
			}else{
				$this->error('未检测到您的账号',U('User/login'));
			}
		}
		$this->display();
	}
	public function register(){
		$m_user = M('user');
		if($this->isPost()){
			if(empty($_POST['username'])){
				$this->error('昵称不能为空','user/register');
			}
			if(strlen($_POST['password'])<3){
				$this->error('密码至少为3个字符','user/register');
			}
			if($_POST['password'] != $_POST['confirm_password']){
				$this->error('两次输入密码不一致','user/register');
			}
			$data['username'] = $_POST['username'];
			$data['password'] = trim(md5($_POST['password']));
			$data['confirm_password'] = $_POST['confirm_password'];
			$data['phone_number'] = $_POST['phone_number'];
			$data['email'] = $_POST['email'];
			$data['category'] = 0;
			$data['account'] = (time() . mt_rand(1,10));//生成唯一随机账号
			
			$result = $m_user->add($data);
			if($result){
				session('account',$data['account']);
				session('username',$data['username']);
				$this->success('注册成功，则正在获取您的账号',U('User/regiser_success'));
			}else{
				$this->error('注册失败，请重新注册',U('user/login'));
			}
		}
		$this->display();
	}
	public function regiser_success(){		
		$this->account=session('account');
		$this->username=session('username');
		$this->register_time=time();
		$this->display();
	}
	public function logout(){
		session('username',null);
		session('headimg',null);
		session('user_id',null);
		session('account',null);
		$this->success('正在退出...',$refer);
	}
	public function personal(){
		$m_user = M('user');
		$result = $m_user->where('account = "%s"',$_SESSION['account'])->find();
		// $comment_data = M('comment') ->alias('n')->where('n.user_id = %d',$result['user_id'])->join('fc_user as d on n.user_id = d.user_id')->order('n.updatetime desc')->select();
		
		$d_comment_Model = D('CommentView');
		$comment_data = $d_comment_Model->where('comment.user_id = %d',$result['user_id'])->order('updatetime desc')->select();//个人中心中获取发出的评论
		
		$personal_comment_id = M('comment')->where('user_id = %d',$result['user_id'])->order('updatetime desc')->select();//收到的评论
		
		foreach($personal_comment_id as $k=>$v){
			$comment_replay = $d_comment_Model->where('comment.parent_id = %d',$v['comment_id'])->find();
			if($comment_replay){
				$personal_comment_id[$k]['parent'] = $comment_replay;
			}
			
		}
		// echo M()->_sql();die();
		$comment_replay_array = array();
		foreach($personal_comment_id as $k=>$v){
			if($v['parent']){
				$comment_replay_array[] = $v;
			}
			
		}
		// println($comment_replay_array);die();
		
		/* $data = M('comment') ->alias('n')->where('news_id = %d',$_GET['id'])->join('fc_user as d on n.user_id = d.user_id')->page($nowPage,'7')->order('n.updatetime desc')->select();
		// println($data);die();
		foreach($data as $k=>$v){
			if($v['parent_id'] != 0){
				 // M('comment')->where('comment_id = %d',$v['parent_id'])->find();
				$data[$k]['parent'] = M('comment') ->alias('n')->where('comment_id = %d',$v['parent_id'])->join('fc_user as d on n.user_id = d.user_id')->page($nowPage,'7')->order('n.updatetime desc')->find();
			}else{
				$data[$k] = $v;
			}
		} */
		
		if($result){
			if($this->isPost()){
                   // println($_FILES);die();
				if (isset($_FILES['headimg']['size'])&& $_FILES['headimg']['size'] > 0) {
						import('@.ORG.UploadFile');
						$upload = new UploadFile();
						$upload->maxSize = 20000000;
						$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
						$upload->replace = 'true';
						$dirname = UPLOAD_PATH . date('Ym', time()).'/'.date('d', time()).'/';
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
						$m_user->headimg = $file_name;
						// println($file_name);die();
						$data['headimg'] = $file_name;
						session('headimg',$data['headimg'],3600);
					}
					if($_POST['username']){
						$data['username'] = $_POST['username'];
						session('username',$data['username'],3600);
					}
					if($_POST['phone_number']){
						$data['phone_number'] = $_POST['phone_number'];
					}
					if($_POST['email']){
						$data['email'] = $_POST['email'];
					}
					$edit_data = $m_user->where('account = "%s"',$result['account'])->setField($data);
					/* echo M()->_sql();die(); */
					if($edit_data!== false){
						/* print_r($data);
						die(); */
						// 
						
						$this->success('用户信息编辑成功');
						exit();
					}else{
						$this->error('用户信息编辑失败');
						exit();
					}
				
			}else{
				$this->result = $result;
				$this->comment_data = $comment_data;
				$this->comment_replay_array = $comment_replay_array;
			}
		}else{
			$this->error('请您先登录',U("user/login"));
			exit();
		}
		
		
		$this->display();
	}
}




?>