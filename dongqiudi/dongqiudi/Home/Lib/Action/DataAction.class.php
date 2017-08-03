<?php
class DataAction extends Action{
	public function _initialize(){
		$refer = 'http://' . $_SERVER ['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// println($refer);die();
		$_SESSION['refer'] = $refer;
		
    }
	public function index(){
		$m_team = M('team');
		$m_match = M('match');
		$zhongchao = $m_team->where('league = "%s"',"中超")->order('league_integral desc , goal_difference desc')->select();
		$this->zhongchao = $zhongchao;
		
		$where['start_time'] = array('elt',time());
		$league_round = $m_match->where($where)->order('match_id desc')->find();
		$this->league_round=$league_round;
		
		// println($_GET['gameweek']);die();
		if($_GET['gameweek']){
			$league_round_index = $m_match->where("level = '%s' and league_round = %d",'中超',$_GET['gameweek'])->select(); 
			
			foreach($league_round_index as $k=>$v){
				$league_round_index[$k]['hometeam'] = $m_team->where('team_id = %d',$v['hometeam_id'])->find();
				$league_round_index[$k]['vsitingteam'] = $m_team->where('team_id = %d',$v['vsitingteam_id'])->find();
			}
			// println($league_round_index);
			$this->league_round_index=$league_round_index;
			
		}
		// echo M()->_sql();die();
		$this->display();
	}
	public function yingchao(){
		
		$this->display();
	}
	public function xijia(){
		
		$this->display();
	}
	public function dejia(){
		
		$this->display();
	}
	public function yijia(){
		
		$this->display();
	}
	public function fajia(){
		
		$this->display();
	}
}
?>