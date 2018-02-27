<?php
namespace Login\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function adminlogin(){
        if(IS_POST){
            //这里的admin和123456是在这里写死的，这是一个缺点
            if(I('username')=='admin' && I('password')=='123'){

                session('id','admin');
                $this->success('登陆成功',U('System/Hospital/lst'));

            }else{
                $this->error('输入的用户名或密码有误，请重新输入');
            }
        }else{
        	$this->display();
        }        
    }
    public function hospitallogin(){
        //医院管理员登录界面从数据库判断用户名和密码是否一致
        if(IS_POST){
            $hos=M('Hospital');
            $info=$hos->where('hos_code="'.I('username').'" and hos_password="'.I('password').'"')->count();
            if($info){
                session('id',I('username'));
                $this->success('登陆成功',U('Hospital/Apply/lst'));

            }else{
                $this->error('输入的用户名或密码有误，请重新输入');
            }
        }else{
            $this->display();
        }
    }
    public function expertlogin(){
    	if(IS_POST){
            $expert=M('Expert');
            $info=$expert->where('expert_code="'.I('username').'" and expert_password="'.I('password').'"')->count();
            if($info){
                session('id',I('username'));
                $this->success('登陆成功',U('Expert/Appointment/lst'));

            }else{
                $this->error('输入的用户名或密码有误，请重新输入');
            }
        }else{
            $this->display();
        }
    }
    public function userlogin(){
    	if(IS_POST){
            $user=M('User');
            $count=$user->where('user_id="'.I('user_id').'"')->count();
            if($count==1){
            	//说明之前登陆过所以做一个检查
                if($user->where('user_id="'.I('user_id').'" and user_name="'.I('user_name').'"')->count()){
                    session('id',I('user_id'));
                    $this->success('登陆成功',U('User/Use/index'));
                    //如果我是在预约页面登陆的话可不可以登陆上之后跳转到的是登陆之前的页面
                }else{
                    $this->error('输入的姓名和身份证不一致，请重新输入');    
                }
            }else{
            	//此时之前没登陆，为新用户
                $data['user_id']=I('user_id');
                $data['user_name']=I('user_name');
                $data['user_phone']=I('user_phone');
                if($user->create($data)){
                    if($user->add()){
                    	session('id',I('user_id'));
                        $this->success('登录成功',U('User/Use/index'));
                    }else{
	                    $this->error('登录失败');
                    }   
                }
            }
        }else{
            $this->display();
        }
    }  
}