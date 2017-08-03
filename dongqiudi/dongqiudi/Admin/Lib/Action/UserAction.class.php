<?php
class UserAction extends Action{
	public function _initialize(){
		$nologin = array('login','logout');
		$a = ACTION_NAME;
		if(!in_array($a,$nologin)){
			if(!session('user_id')){
				$this->error('请先登录！', U('user/login'));
				exit();
			}
		}
    }
	public function login(){
		$m_user = M('user');
		if($this->isPost()){
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(empty($username)){
				$this->error('请输入用户名');
				exit();
			}
			if(empty($password)){
				$this->error('请输入密码');
				exit();
			}
			$result = $m_user->where('username = "%s"',$username)->find();
		/* 	println($result);
			println("--"); */
			//echo M()->_sql();die();
			if(session('verify') != md5($_POST['code'])){
				$this->error('验证码错误！');
				exit();
			}else{
				if($result){
					if($result['category'] != 0){
						if($result['password']==md5($password)){
							$_SESSION['username'] = $username;
							$_SESSION['account'] = $result['account'];
							$_SESSION['user_id'] = $result['user_id'];
							$_SESSION['headimg'] = $result['headimg'];
							$_SESSION['category'] = $result['category'];
							//println($_SESSION['account']);die();
							$this->success('登陆成功，正在跳转...',U('Index/index'));
							exit();
						}else{
							$this->error('密码错误');
							exit();
						}
					}else{
						$this->error('您不是管理员没有权限登陆');
						exit();
					}
				}else{
					$this->error('未找到此用户');
					exit();
				}
			}
		}
		$this->display();
	}
	public function logout(){
		session('account',null);
		session('username',null);
		session('headimg',null);
		session('user_id',null);
		$this->success('退出成功',U('user/login'));
	}
	/* 修改会员密码 */
	public function pass(){
		$m_user = M('user'); 
		$user_id = $_POST['user_id'];
		$result = $m_user->where('user_id=%d',$user_id)->find();
		$original_password = md5($_POST['mpass']);//原始密码
		$data['password'] = md5($_POST['newpass']);//新密码
		$confirm_password = md5($_POST['renewpass']);//重新输入的新密码
		/* println("--"); */
		//println($result);
		//die();
		if($result['password'] == $original_password){
			if($original_password == $data['password']){
				$this->error('不要使用原密码哦');
				exit();
			}else{
				if($data['password'] == $confirm_password){
					$modify_pass = $m_user->where('user_id = %d',$user_id)->save($data);
					if($modify_pass){
						session('account',null);
						session('username',null);
						session('headimg',null);
						session('user_id',null);
						 $this->success('修改成功正在返回登陆',U('user/login'));
					}else{
						$this->error('密码修改失败');
						exit();
					}
				}else{
					$this->error('两次密码输入不一致');
				}
			}
		}else{
			$this->error('原始密码不正确');
			exit();
		}
	}
	
	
}

?>