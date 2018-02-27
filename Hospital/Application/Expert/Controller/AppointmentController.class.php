<?php
namespace Expert\Controller;
use Think\Controller;
class AppointmentController extends Controller {
    //显示当天预约信息
    public function lst(){
    	$expert_code=session('id');

    	$appointment=M('Appointment');

    	$count=$appointment->where('expert_code="'.$expert_code.'" and  appointment_date = curdate()  and  state="没有值" ')->count();
    	$page=new \Org\Bjy\Page($count,3);
        $show=$page->show();
        $this->assign('page',$show);

    	$list=$appointment->where('expert_code="'.$expert_code.'" and  appointment_date = curdate()  and state="没有值" ')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('appointmentList',$list);
        $this->display();
    }

    //患者就诊
    public function agree(){
    	$expert_code=session('id');
		$appointment=M('Appointment');
		$appointment->state='已就诊';
    	$info=$appointment->where('expert_code="'.$expert_code.'" and user_id="'.I('user_id').'" and appointment_date = curdate()')->save();
    	$this->success('患者状态已经改为已就诊');
    }
    public function reject(){
    	$expert_code=session('id');
		$appointment=M('Appointment');
		$appointment->state='已爽约';
    	$info=$appointment->where('expert_code="'.$expert_code.'" and user_id="'.I('user_id').'" and appointment_date = curdate()')->save();

    	$user=M('User');
    	$person=$user->where('user_id="'.I('user_id').'"')->find();
    	$user->user_num=$person['user_num']+1;
    	$user->where('user_id="'.I('user_id').'"')->save();

    	$this->success('患者状态已经改为已爽约');
    }
}