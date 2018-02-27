<?php
namespace Login\Controller;
use Think\Controller;

class LogoutController extends Controller {
	public function logout(){
		//注销方法，注销时做一个判断，各自的角色返回到不同的初始页面
		$length=strlen(session('id'));
		$admin=session('id');
		session(null);
		if($admin=='admin'){
			$this->success('退出成功',U('Login/Login/adminlogin'));
		}elseif ($length==2) {
			$this->success('退出成功',U('Login/Login/hospitallogin'));
		}elseif ($length==5) {
			$this->success('退出成功',U('Login/Login/expertlogin'));
		}else{
			$this->success('退出成功',U('User/Use/index'));
		}
	}

}