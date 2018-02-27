<?php
namespace Expert\Controller;
use Think\Controller;
class ApplyController extends Controller {
    public function add(){
    	$expert_code=session('id');
    	if(IS_POST){
    		$data['expert_code']=$expert_code;
    		$data['stop_date']=I('stop_date');
            $data['reason']=I('reason');
    		$data['start_date']=date("Y-m-d");
    		$expert=M('Expert');
    		$person=$expert->where('expert_code="'.$expert_code.'"')->find();
    		$expert_name=$person['expert_name'];
    		$hos_code=$person['hos_code'];
    		$data['hos_code']=$hos_code;
    		$data['expert_name']=$expert_name;
    		$apply=M('Apply');

            $arrange=M('Arrange');
            $d=strtotime(I('stop_date'));
            $info=strtolower(date("l",$d));

            $tmp=$arrange->where('expert_code="'.$expert_code.'"')->find();
            if($tmp[$info]=='√'){
                $info=$info.'2';
            }
            $data['info']=$info;
            


    		if($apply->create($data)){
    			$apply->add();
    			$this->success('申请成功');
    		}else{
    			$this->error('申请失败');
    		}
    	}else{
    		$this->assign('expert_code',$expert_code);
        $this->display();	
    	}
    	
    }
}