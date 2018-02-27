<?php
namespace Hospital\Controller;
use Think\Controller;
//管理排班信息
class ArrangeController extends Controller {
	//显示排班页面
    public function lst(){
        $arrange = M('Arrange');
        $hos_code=session('id');
        if(IS_POST){
        	$expert_code=I('expert_code');
            $count=$arrange->where('hos_code="'.$hos_code.'"')->count();
            $page=new \Org\Bjy\Page($count,3);
            $show=$page->show();
            $list=$arrange->where('expert_code="'.$expert_code.'" and hos_code="'.$hos_code.'"')->limit($page->firstRow.','.$page->listRows)->select();
            foreach($list as $k=>$val){    
                $expert_code=$list[$k]['expert_code'];
                foreach( $val as $e=>$value){
                    if ($value=='√') {
                        //这个传过去的应该是个字符值不能是变量，不建议使用这种方式因为这样的话路径只能写成绝对路径因为他向前端传入的是一个字符串，需要把字符串改成后端向前端发送时解析好的路径信息才能正常显示
                        $info=str_replace('Array','', $list[$k].$e);
                        $list[$k][$e]="<a href=\"/Hospital/index.php/Hospital/Arrange/changedown/expert_code/".$expert_code."/info/".$info."\" class=\"btn btn-success\" onclick=\"return confirm('请确认是否修改为停诊?')\";>√</a>"; 

                    }elseif($value=='×'){
                        $info=str_replace('Array','', $list[$k].$e);
                        $list[$k][$e]="<a href=\"/Hospital/index.php/Hospital/Arrange/changeup/expert_code/".$expert_code."/info/".$info."\" class=\"btn btn-danger\" onclick=\"return confirm('请确认是否修改为在诊?')\";>×</a>";
                    }
                    else{
                        $list[$k][$e]=$list[$k][$e];
                    }
                }
            }
            $this->assign('arrangeList', $list);
            $this->assign('page',$show);
        	$this->display();
        }else{
        	
        	$count=$arrange->where('hos_code="'.$hos_code.'"')->count();
        	$page=new \Org\Bjy\Page($count,3);
        	$show=$page->show();
        	$list=$arrange->where('hos_code="'.$hos_code.'"')->limit($page->firstRow.','.$page->listRows)->select();
        	foreach($list as $k=>$val){    
                $expert_code=$list[$k]['expert_code'];
            	foreach( $val as $e=>$value){
                    if ($value=='√') {
                        $info=str_replace('Array','', $list[$k].$e);
   						$list[$k][$e]="<a href=\"/Hospital/index.php/Hospital/Arrange/changedown/expert_code/".$expert_code."/info/".$info."\" class=\"btn btn-success\" onclick=\"return confirm('请确认是否修改为停诊?')\";>√</a>"; 

   					}elseif($value=='×'){
                        $info=str_replace('Array','', $list[$k].$e);
   						$list[$k][$e]="<a href=\"/Hospital/index.php/Hospital/Arrange/changeup/expert_code/".$expert_code."/info/".$info."\" class=\"btn btn-danger\" onclick=\"return confirm('请确认是否修改为在诊?')\";>×</a>";
   					}
                    else{
                        $list[$k][$e]=$list[$k][$e];
                    }
   				}
			}
        	$this->assign('arrangeList', $list);
        	$this->assign('page',$show);
        	$this->display();
        }
    }
    
    
//添加排班功能
    public function add(){
    	$hos_code=session('id');
    	if(IS_POST){
            $data['hos_code']=$hos_code;
            $data['expert_code']=I('expert_code');
            $data['monday']=I('monday');
            $data['tuesday']=I('tuesday');
            $data['wednesday']=I('wednesday');
            $data['thursday']=I('thursday');
            $data['friday']=I('friday');
            $data['saturday']=I('saturday');
            $data['sunday']=I('sunday');
            $data['monday2']=I('monday2');
            $data['tuesday2']=I('tuesday2');
            $data['wednesday2']=I('wednesday2');
            $data['thursday2']=I('thursday2');
            $data['friday2']=I('friday2');
            $data['saturday2']=I('saturday2');
            $data['sunday2']=I('sunday2');
            foreach ($data as $key => $value) {
                if($value==''){
                    $data[$key]='×';
                }
            }
            //var_dump($data['monday']);
            //var_dump($data['monday2']);
            $expert=M('Expert');
            $department=$expert->where('expert_code="'.I('expert_code').'"')->find();
    		$data['department_name']=$department['department_name'];
    		$arrange = M('Arrange');

    		$info=$expert->where('expert_code="'.I('expert_code').'" and hos_code="'.$hos_code.'"')->count();
    		if($info==1){
	    		$count=$arrange->where('expert_code="'.I('expert_code').'"')->count();
	    		if($count==1){
		            $this->error('你已经为此医生安排过值班了，看看是不是搞错了');
	    		}else{
	    			if($arrange->create($data)){
		                if($arrange->add()){
		                    $this->success('添加排班成功');
		        	    }
		            }
		            else{
		                $this->error('添加排班失败');
		            }
	    		}
	    	}else{
	    		$this->error('本医院中没有这个编号的医生，看看是不是搞错了');
	    	}
    	}else{
            $this->display();
        }
    }

//将在诊改为停诊
    public function changedown(){
        $info=I('info');
        $hos_code=session('id');
    	$arrange=M('Arrange');
        
        $arrange->$info="×";
        $arrange->where('expert_code="'.I('expert_code').'"')->save();
        
        //给预约了此医生的用户发消息
        $appointment=M('Appointment');
        $userlist=$appointment->where('expert_code="'.I('expert_code').'" and appointment_date="'.I('stop_date').'"')->delete();
        $this->success('操作成功并且已经将此天预约此医生的用户的预约取消，并短信通知这些患者，也短信通知医生其请假已经批准。');
    }

//将在停诊修改为在诊
    public function changeup(){
        $info=I('info');
        $hos_code=session('id');
        $arrange=M('Arrange');
        
        $arrange->$info="√";
        $arrange->where('expert_code="'.I('expert_code').'"')->save();
        
        $this->success('操作成功');
    }
}