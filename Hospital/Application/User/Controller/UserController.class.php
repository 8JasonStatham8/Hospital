<?php
namespace User\Controller;
use Think\Controller;
//此控制器是用于修改个人信息的
class UserController extends Controller {
    public function update(){
    	$header= "<a style=\"width: 20%\" class=\"btn btn-primary btn-large\" href=\"/Hospital/index.php/User/Use/index\">首页</a>";
        $this->assign('header',$header);
    	$user_id=session('id');
    	$user=M('User');
    	$list=$user->where('user_id="'.$user_id.'"')->find();
    	if(IS_POST){
    		$user->user_phone=I('user_phone');
    		//如果用这条的话$user['user_phone']=I('user_phone');会出现一个错误说Cannot use object of type Think\Model as array
    		$info=$user->save();
    		if($info){
    			$this->success('修改成功');
    		}else{
    			$this->error('修改失败');
    		}
    	}else{
    		$this->assign('user_id',$user_id);
    		$this->assign('user_name',$list['user_name']);
    		$this->assign('user_phone',$list['user_phone']);

    		$this->display();	
    	}
        
    }
}