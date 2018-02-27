<?php
namespace Hospital\Controller;
use Think\Controller;
//修改医院信息
class ChangeController extends Controller {
    public function lst(){
    	$hos=M('Hospital');
    	$hos_code=session('id');
    	$data=$hos->where('hos_code="'.$hos_code.'"')->find();
    	$this->assign('data',$data);
        $this->display();
    }

    public function change(){

        	$hos=M('Hospital');
    		$hos_code=session('id');
	    	$data=$hos->where('hos_code="'.$hos_code.'"')->find();
        	$data['hos_contact']=I('hos_contact');
        	$data['hos_address']=I('hos_address');
        	$data['hos_password']=I('hos_password');
        	$data['hos_introduce']=I('hos_introduce');
        	if($_FILES['hos_pic']['name']!=''){
	        	$upload = new \Think\Upload();// 实例化上传类    
	        	$upload->maxSize   =     3145728 ;// 设置附件上传大小    
	        	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
                $upload->rootPath = "./"; //文件上传保存的根路径
	        	$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传单个文件  
	        	$upload->replace=true;
                $upload->autoSub=false;   
	        	$info   =   $upload->uploadOne($_FILES['hos_pic']);    
	        	if(!$info) {// 上传错误提示错误信息        
	        		$this->error($upload->getError());    
	        	}else{// 上传成功 获取上传文件信息         
	        		$data['hos_pic']="/Hospital/Public/Uploads/".$info['savename']; 
	        	}
	        }
	        if($hos->create($data)){   
		        $info=$hos->save($data);
		        if($info){
		        	$this->success('修改成功',U('lst'));
		        }else{
		        	$this->error('修改失败');
		        }
		    }else{
		    	$this->error('$hos->getError()');
		    }
        
    }



}