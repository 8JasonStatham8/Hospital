<?php
namespace Expert\Controller;
use Think\Controller;
class ExpertController extends Controller {
    public function update(){
    	$expert=M('Expert');
    	$expert_code=session('id');
    	$list=$expert->where('expert_code="'.$expert_code.'"')->find();
    	$this->assign('expert',$list);
        $this->display();
    }

    public function change(){
        	$expert=M('Expert');
    		$expert_code=session('id');
	    	$data=$expert->where('expert_code="'.$expert_code.'"')->find();
        	$data['expert_phone']=I('expert_phone');
        	$data['expert_password']=I('expert_password');
        	$data['expert_skill']=I('expert_skill');
        	if($_FILES['expert_img']['name']!=''){
	        	$upload = new \Think\Upload();// 实例化上传类    
	        	$upload->maxSize   =     3145728 ;// 设置附件上传大小    
	        	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
                $upload->rootPath = "./"; //文件上传保存的根路径
	        	$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传单个文件     
	        	$upload->replace=true;
                $upload->autoSub=false; 
	        	$info = $upload->uploadOne($_FILES['expert_img']);    
	        	
	        	if(!$info) {// 上传错误提示错误信息        
	        		$this->error($upload->getError());    
	        	}else{// 上传成功 获取上传文件信息         
	        		$data['expert_img']="/Hospital/Public/Uploads/".$info['savename'];    
	        	}
	        }
	        if($expert->create($data)){   
		        $info=$expert->save($data);
		        if($info){
		        	$this->success('修改成功');
		        }else{
		        	$this->error('修改失败');
		        }
		    }else{
		    	$this->error('$expert->getError()');
		    }
        
    }

}