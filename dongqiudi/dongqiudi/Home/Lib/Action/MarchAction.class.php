<?php
class MarchAction extends Action{
	public function _initialize(){
		$refer = 'http://' . $_SERVER ['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// println($refer);die();
		$_SESSION['refer'] = $refer;
		
    }
    public function index(){
        $m_match = M('match');
        $m_team = M('team'); 
        /* 重要 */
        $importment = $m_match->where('position =%d or position =%d',2,3)->order("start_time asc")->select();
		// println($importment);die();
        /* 重要 */
        foreach($importment as $k=>$v){
            $importment[$k]['hometeam'] = $m_team->where('team_id = %d',$v['hometeam_id'])->find();
            $importment[$k]['vsitingteam'] = $m_team->where('team_id = %d',$v['vsitingteam_id'])->find();
        }
        $item = array();  //date("Y-m-d H:i:s", time()) ;
        foreach($importment as $k=>$v){
            if($v['start_time']>(strtotime(date('Y-m-d', time()))-86400)){
                if(!isset($item[$v['start_time']])){
                $item[date("Y-m-d",$v['start_time'])][] = $v;
                }else{
                    $item[date("Y-m-d",$v['start_time'])][] = $v;
                }
            }
        }
         // println($item);die();
        $this->item=$item;
		// println($item);die();
        $this->display();
    }
	public function zhongchao(){
		$m_match = M('match');
        $m_team = M('team'); //
		$zhongchao = $m_match->where('level = "%s"',"中超")->order('start_time asc')->select();
		// println($zhongchao);die();
		foreach($zhongchao as $key=>$value){
			$zhongchao[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
			$zhongchao[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
		}
		// println($zhongchao);die();
		$item = array();
		foreach($zhongchao as $k=>$v){
			if($v['start_time']>(strtotime(date('Y-m-d',time()))-86400)){
				if(!isset($item[$v['start_time']])){
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}else{
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}
			}
	}
		$this->item=$item;
		// println($item);die();
	
		$this->display();
	}
	public function yingchao(){
		$m_match = M('match');
        $m_team = M('team'); //
		$yingchao = $m_match->where('level = "%s"',"英超")->order('start_time asc')->select();
		// println($yingchao);die();
		foreach($yingchao as $key=>$value){
			$yingchao[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
			$yingchao[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
		}
		// println($yingchao);die();
		$item = array();
		foreach($yingchao as $k=>$v){
			if($v['start_time']>(strtotime(date('Y-m-d',time()))-86400)){
				if(!isset($item[$v['start_time']])){
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}else{
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}
			}
	}
		$this->item=$item;
		$this->display();
	}
	public function xijia(){
		$m_match = M('match');
        $m_team = M('team'); //
		$xijia = $m_match->where('level = "%s"',"西甲")->order('start_time asc')->select();
		// println($xijia);die();
		foreach($xijia as $key=>$value){
			$xijia[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
			$xijia[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
		}
		// println(xijia);die();
		$item = array();
		foreach($xijia as $k=>$v){
			if($v['start_time']>(strtotime(date('Y-m-d',time()))-86400)){
				if(!isset($item[$v['start_time']])){
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}else{
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}
			}
		}
		$this->item=$item;
		$this->display();
	}
	public function dejia(){
		$m_match = M('match');
        $m_team = M('team'); //
		$dejia = $m_match->where('level = "%s"',"德甲")->order('start_time asc')->select();
		// println(dejia);die();
		foreach($dejia as $key=>$value){
			$dejia[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
			$dejia[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
		}
		// println(dejia);die();
		$item = array();
		foreach($dejia as $k=>$v){
			if($v['start_time']>(strtotime(date('Y-m-d',time()))-86400)){
				if(!isset($item[$v['start_time']])){
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}else{
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}
			}
		}
		$this->item=$item;
		$this->display();
	}
	public function yijia(){
		$m_match = M('match');
        $m_team = M('team'); //
		$yijia = $m_match->where('level = "%s"',"德甲")->order('start_time asc')->select();
		// println(yijia);die();
		foreach($yijia as $key=>$value){
			$yijia[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
			$yijia[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
		}
		// println(yijia);die();
		$item = array();
		foreach($yijia as $k=>$v){
			if($v['start_time']>(strtotime(date('Y-m-d',time()))-86400)){
				if(!isset($item[$v['start_time']])){
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}else{
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}
			}
		}
		$this->item=$item;
		$this->display();
	}
	public function fajia(){
		$m_match = M('match');
        $m_team = M('team'); //
		$fajia = $m_match->where('level = "%s"',"法甲")->order('start_time asc')->select();
		// println(yijia);die();
		foreach($fajia as $key=>$value){
			$fajia[$key]['hometeam'] = $m_team->where('team_id = %d',$value['hometeam_id'])->find();
			$fajia[$key]['vsitingteam'] = $m_team->where('team_id = %d',$value['vsitingteam_id'])->find();
		}
		// println(yijia);die();
		$item = array();
		foreach($fajia as $k=>$v){
			if($v['start_time']>(strtotime(date('Y-m-d',time()))-86400)){
				if(!isset($item[$v['start_time']])){
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}else{
					$item[date('Y-m-d',$v['start_time'])][] = $v;
				}
			}
		}
		$this->item=$item;
		$this->display();
	}
    
    
}



?>