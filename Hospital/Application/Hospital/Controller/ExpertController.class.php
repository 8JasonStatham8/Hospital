<?php
namespace Hospital\Controller;
use Think\Controller;
//管理专家信息
class ExpertController extends Controller {
	//显示专家页面
    public function lst(){
        $expert = M('Expert');
        $hos_code=session('id');
        if(IS_POST){
        	$expert_code=I('expert_code');
        	$list=$expert->where('expert_code="'.$expert_code.'"')->select();
        	$this->assign('expertList', $list);
        	$this->display();
        }else{
        	
        	$count=$expert->where('hos_code="'.$hos_code.'"')->count();
        	$page=new \Org\Bjy\Page($count,3);
        	$show=$page->show();
        	$list=$expert->where('hos_code="'.$hos_code.'"')->limit($page->firstRow.','.$page->listRows)->select();
        	$this->assign('expertList', $list);
        	$this->assign('page',$show);
        	$this->display();
        }
    }
    

//添加专家功能
    public function add(){
    	$hos_code=session('id');
    	if(IS_POST){
    		$data['expert_name'] = I('expert_name');
    		$data['department_name'] = I('department_name');
    		$data['hos_code']=$hos_code;
    		$expert = M('Expert');
        	if($expert->create($data)){
        		if($expert->add()){
        			$this->success('添加专家成功');
        		}			
        	}else{
        		$this->error('添加专家失败');
        	}
    	}else{
    		$department=M('Department');
    		$list=$department->where('hos_code="'.$hos_code.'"')->select();
    		$this->assign('departmentList',$list);
            $this->display();
        }
    }
//删除专家功能
    public function delexpert(){
    	$expert_code=I('expert_code');
    	$expert=M('Expert');
        $appointment=M('Appointment');
        $user=$appointment->where('expert_code="'.$expert_code.'" and appointment_date > curdate()')->count();
        if($user==0){
        	$info=$expert->delete($expert_code);
        	if($info){
        		$this->success('删除医生成功');
        	}else{
        		$this->error('删除失败');
        	}
        }else{
	        $info = $appointment->where('expert_code="'.$expert_code.'" and appointment_date > curdate()')->delete();
	        if($info){
	            $this->success('删除医生成功，并向已经预约此医生的患者发送短信告知预约已经取消请预约其他医生');
	        }
	        else{
	            $this->error('删除医生失败');
	        }
	    }
    }
}