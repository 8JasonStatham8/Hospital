<?php
namespace Hospital\Controller;
use Think\Controller;
//查看数据报表
class DataController extends Controller {
	//显示数据报表页面
    public function lst(){
        $hos_code=session('id');
        $appointment=M('Appointment');
        $arrange=M('Arrange');
        $count=$arrange->where('hos_code="'.$hos_code.'"')->count();
        $expertinfo=$arrange->where('hos_code="'.$hos_code.'"')->select();
        $d=strtotime(date("Y-m-d"));
        $info=strtolower(date("l",$d));
        $info2=$info.'2';




        $dataList=array();
        foreach ($expertinfo as $key => $value) {
            $dataList[$key]['expert_code']=$expertinfo[$key]['expert_code'];
            
            //获取上午数量和信息
            $number1=$appointment->where('expert_code="'.$expertinfo[$key]['expert_code'].'" and appointment_date=curdate() and info="'.$info.'"')->count();
            $appointment_info1=$appointment->where('expert_code="'.$expertinfo[$key]['expert_code'].'" and appointment_date=curdate() and info="'.$info.'"')->select();
            
            //获取下午数量和信息
            $number2=$appointment->where('expert_code="'.$expertinfo[$key]['expert_code'].'" and appointment_date=curdate() and info="'.$info2.'"')->count();
            $appointment_info2=$appointment->where('expert_code="'.$expertinfo[$key]['expert_code'].'" and appointment_date=curdate() and info="'.$info2.'"')->select();


            if($expertinfo[$key][$info]=='×'){
                $dataList[$key]['upnum']=0;
            }else{
                $timeList=array();
                $timeList[0]="09:00:00";
                $timeList[1]="10:00:00";
                $timeList[2]="11:00:00";
                if($number1==1){
                    $dataList[$key]['upnum']=2;
                    $now=$appointment_info1[0]['time'];                    
                    foreach ($timeList as $n=>$k){
            
                        if($k== $now){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                    }
                    $dataList[$key]['up']=$timeList;
                }elseif ($number1==2){
                    $dataList[$key]['upnum']=1;
                    $now=$appointment_info1[0]['time'];
                    $now2=$appointment_info1[1]['time'];
                    foreach ($timeList as $n=>$k){
                        if($k==$now){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                        if($k==$now2){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                    }
                    $dataList[$key]['up']=$timeList;
                }else{
                    $dataList[$key]['upnum']=3;
                    $dataList[$key]['up']=$timeList;
                }
            }

            if($expertinfo[$key][$info2]=='×'){
                $dataList[$key]['downnum']=0;
            }else{
                $timeList=array();
                $timeList[0]="14:00:00";
                $timeList[1]="15:00:00";
                $timeList[2]="16:00:00";
                if($number2==1){
                    $now=$appointment_info2[0]['time'];                    
                    foreach ($timeList as $n=>$k){
            
                        if($k== $now){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                    }
                    $dataList[$key]['down']=$timeList;
                }elseif ($number2==2) {
                    $now=$appointment_info2[0]['time'];
                    $now2=$appointment_info2[1]['time'];
                    foreach ($timeList as $n=>$k){
                        if($k==$now){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                        if($k==$now2){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                    }
                    $dataList[$key]['down']=$timeList;
                } 
            }

            $this->assign('dataList',$dataList);

        }
        $this->display();
        
    }

}