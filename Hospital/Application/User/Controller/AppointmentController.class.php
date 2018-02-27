<?php
namespace User\Controller;
use Think\Controller;
//查看预约信息的
class AppointmentController extends Controller {
    public function lst(){
        $header= "<a style=\"width: 20%\" class=\"btn btn-primary btn-large\" href=\"/Hospital/index.php/User/Use/index\">首页</a>";
            
    	$appointment=M('Appointment');
    	$user_id=session('id');
    	$list=$appointment->where('user_id="'.$user_id.'" and appointment_date > curdate() ')->select();
    	$this->assign('appointmentList',$list);
        $this->assign('header',$header);
        $this->display();
    }

    //取消预约操作
    public function concel(){
    	$appointment=M('Appointment');
    	$info=$appointment->where('user_id="'.session('id').'" and hos_code="'.I('hos_code').'" and department_name="'.I('department_name').'" and expert_code="'.I('expert_code').'" and appointment_date="'.I('appointment_date').'"')->delete();
    	if($info){
    		$this->success('取消预约成功');
    	}else{
    		$this->error('取消预约失败，请联系网站维护人员');
    	}
    }
}