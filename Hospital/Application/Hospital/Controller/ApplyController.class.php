<?php
namespace Hospital\Controller;
use Think\Controller;
//管理申请停诊信息
class ApplyController extends Controller {
	//显示申停页面
    public function lst(){
        $apply = M('Apply');
        $hos_code=session('id');
        $count=$apply->where(' (hos_code="'.$hos_code.'" ) and ( stop_date > curdate() ) and ( state="没有值" )')->count();
        $page=new \Org\Bjy\Page($count,3);
        $show=$page->show();
        $list=$apply->where('hos_code="'.$hos_code.'" and stop_date > curdate() and state="没有值" ')->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('applyList', $list);
        $this->assign('page',$show);
        $this->display();
        
    }
    

//同意请假
    public function agree(){
    	$hos_code=session('id');
    	$newapply=M('Apply');
    	$newapply->state='同意';
    	$newapply->where('expert_code="'.I('expert_code').'" and stop_date="'.I('stop_date').'"')->save();
    	//$weekarray=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六"); //先定义一个数组
    	//echo $weekarray[date("L",strtotime('2018-1-13'))];
    	$date=strtolower(date("l",strtotime(I('stop_date'))));
    	$data2=$data.'2';

    	//修改排班，让用户看不到能够预约
    	$arrange=M('Arrange');
    	$arrange->$date="×";
    	$arrange->$date2="×";
		$arrange->where('expert_code="'.I('expert_code').'"')->save();
		
		//给预约了此医生的用户发消息
		$appointment=M('Appointment');
		$userlist=$appointment->where('expert_code="'.I('expert_code').'" and appointment_date="'.I('stop_date').'"')->delete();
		$this->success('操作成功并且已经将此天预约此医生的用户的预约取消，并短信通知这些患者，也短信通知医生其请假已经批准。');

    	//专家申请时选择上午或者下午然后吧monday或monday2传入

    	//改排班数据库中有个事务看请假的那一天是否到了，如果到了并且状态是同意，应该自动跳回原排班，
    }


//拒绝请假
    public function reject(){
    	$hos_code=session('id');
    	$newapply=M('Apply');
    	$newapply->state='拒绝';
    	$newapply->where('expert_code="'.I('expert_code').'" and stop_date="'.I('stop_date').'"')->save();
    	$this->success('已经拒绝此医生的请假并且发送故短信告知');
    	
    }
}