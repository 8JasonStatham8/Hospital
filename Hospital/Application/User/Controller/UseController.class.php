<?php
namespace User\Controller;
use Think\Controller;
//此控制器是进行预约的操作
class UseController extends Controller {
//获取医院信息     
    public function index(){
        $hospital=M('Hospital');
        if(IS_POST){
            if(I('hos_name')==''){
                if(I('hos_area')==''){
                    $count=$hospital->where('hos_rank="'.I('hos_rank').'"')->limit($page->firstRow.','.$page->listRows)->count();
                }else{
                    if(I('hos_rank')==''){
                        $count=$hospital->where('hos_area="'.I('hos_area').'"')->limit($page->firstRow.','.$page->listRows)->count();
                    }else{
                        $count=$hospital->where('hos_area="'.I('hos_area').'" and hos_rank="'.I('hos_rank').'"')->limit($page->firstRow.','.$page->listRows)->count();
                    }
                }
            }else{
                $count=$hospital->where('hos_name="'.I('hos_name').'"')->limit($page->firstRow.','.$page->listRows)->count();
            }
        }else{
            $count=$hospital->limit($page->firstRow.','.$page->listRows)->count();

        }

        $page=new \Org\Bjy\Page($count,3);
        $show=$page->show();

        if(IS_POST){
            if(I('hos_name')==''){
                if(I('hos_area')==''){
                    $list=$hospital->where('hos_rank="'.I('hos_rank').'"')->limit($page->firstRow.','.$page->listRows)->select();
                    $this->assign('hospitalList',$list);
                }else{
                    if(I('hos_rank')==''){
                        $list=$hospital->where('hos_area="'.I('hos_area').'"')->limit($page->firstRow.','.$page->listRows)->select();
                        $this->assign('hospitalList',$list);
                    }else{
                        $list=$hospital->where('hos_area="'.I('hos_area').'" and hos_rank="'.I('hos_rank').'"')->limit($page->firstRow.','.$page->listRows)->select();
                        $this->assign('hospitalList',$list);
                    }
                }
            }else{
                $list=$hospital->where('hos_name="'.I('hos_name').'"')->limit($page->firstRow.','.$page->listRows)->select();
                $this->assign('hospitalList',$list);
            }
        }else{
            $list=$hospital->limit($page->firstRow.','.$page->listRows)->select();
            $this->assign('hospitalList',$list);

        }

        $h = new HeaderController;
        $header=$h->head();
        $this->assign('page',$show);
        $this->assign('header',$header);
        $this->display();
    }

//获取科室信息
    public function department(){

        $hos_name=I('hos_name');
        $hospital=M('Hospital');
        $list=$hospital->where('hos_name="'.$hos_name.'"')->find();
        $this->assign('hospitalList',$list);

        $hos_code=$list['hos_code'];
        $department=M('Department');
        $neike=$department->where('hos_code="'.$hos_code.'" and department_sort=\'内科\'')->select();
        $waike=$department->where('hos_code="'.$hos_code.'" and department_sort=\'外科\'')->select();
        $jizhenke=$department->where('hos_code="'.$hos_code.'" and department_sort=\'急诊科\'')->select();
        $zhongyike=$department->where('hos_code="'.$hos_code.'" and department_sort=\'中医科\'')->select();
        $fuchanke=$department->where('hos_code="'.$hos_code.'" and department_sort=\'妇产科\'')->select();
        $this->assign('neikeList',$neike);
        $this->assign('waikeList',$waike);
        $this->assign('zhongyikeList',$zhongyike);
        $this->assign('jizhenkeList',$jizhenke);
        $this->assign('fuchankeList',$fuchanke);

        $h = new HeaderController;
        $header=$h->head();
        $this->assign('header',$header);
        $this->display();
    }
//获取专家信息
    public function expert(){
        $arrange=M('Arrange');
        $hos_code=I('hos_code');
        $department_name=I('department_name');
        $this->assign('hos_code',$hos_code);
        $this->assign('department_name',$department_name);
        $list=$arrange->where('hos_code="'.$hos_code.'" and department_name="'.$department_name.'"')->select();
        //$list是这个医院这个科室所有的医生排班信息

        //动态显示表头并且得到了未来七天的日期和星期数组
        $date=array();
        $week=array();
        $week2=array();
        for($i=0;$i<7;){
            $d=strtotime("+".++$i." day");
            $week[$i]=strtolower(date("l",$d));
            $week2[$i]=strtolower(date("l",$d)).'2';
            $date[$i]=date('Y-m-d',$d);
        }
        $this->assign('week',$week);
        $this->assign('date',$date);

        //修改排班的内容显示剩余预约号
        $appointment=M('Appointment');
        foreach($list as $k=>$val){    
                $expert_code=$list[$k]['expert_code'];//在第二个foreach前，因为下面是对一行数据中的每一列进行检索
                
                foreach( $val as $e=>$value){
                    if ($value=='√') {
                        $info=str_replace('Array','', $list[$k].$e);//用来记录当前循环中的哪一个星期列
                        for($i=0;$i<7;){
                            if($week[++$i]==$info or $week2[$i]==$info){
                                //这里之前有个错误,原来写的是if($week[++$i]==$info or $week2[++$i]==$info)
                                //因为在week2里边又++了所以就超出范围了
                                $tmp=$i;//这样就知道这一天对应的数组下标了，就可以去找日期了
                            }
                        }
                        $appointment_date=$date[$tmp];
                        $count=$appointment->where('expert_code="'.$expert_code.'" and appointment_date="'.$appointment_date.'" and info="'.$info.'"')->count();
                       
                        if($count==3){
                            $list[$k][$e]="<a href='' class=\"btn btn-danger\" onclick=\"return confirm('这一天已经没有预约号了')\";>0</a>";    
                        }else{
                            $info=str_replace('Array','', $list[$k].$e);
                            $list[$k][$e]="<a href=\"/Hospital/index.php/User/Use/appointment/expert_code/".$expert_code."/info/".$info."\" class=\"btn btn-success\" ;>".(3-$count)."</a>"; 
                        }

                    }elseif($value=='×'){
                        $info=str_replace('Array','', $list[$k].$e);
                        $list[$k][$e]="<a href='' class=\"btn btn-danger\" onclick=\"return confirm('你选的这一天医生不上班呀')\";>×</a>";
                    }
                    else{
                        $list[$k][$e]=$list[$k][$e];
                    }
                }
            }
            //用一个新的数组对其原来的数组做一个顺序的转化，以明天为开始未来七天
            $item=array();
            foreach($list as $k=>$val){    
                foreach( $val as $e=>$value){
                    for($i=1;$i<8;$i++){
                        if($e==$week[$i]){
                            $item[$k][$i]=$list[$k][$e];
                        }
                        if($e==$week2[$i]){
                            $item[$k][7+$i]=$list[$k][$e];   
                        }
                    }
                    $item[$k][15]=$list[$k]['hos_code'];
                    $item[$k][16]=$list[$k]['expert_code'];
                    $item[$k][17]=$list[$k]['department_name'];
                }
            }            
            $this->assign('expertList',$item);
        $h = new HeaderController;
        $header=$h->head();
        $this->assign('header',$header);
        $this->display();
    }

//进行预约
    public function appointment(){

        if(IS_POST){
            if(session('id')==''){
                $this->error('你还没有登录哦，请先登录','/Hospital/index.php/Login/Login/userlogin');
            }else{      

                $user_id=session('id');
                $user=M('User');
                $userone=$user->where('user_id="'.$user_id.'"')->find();
                $user_name=$userone['user_name'];

                $data['user_id']=$user_id;
                $data['user_name']=$user_name;
                $data['hos_code']=I('hos_code');
                $data['hos_name']=I('hos_name');
                $data['expert_code']=I('expert_code');
                $data['expert_name']=I('expert_name');
                $data['department_name']=I('department_name');
                $data['appointment_date']=I('appointment_date');
                $data['time']=I('time');
                $data['info']=I('info');


                $black=M('Black');
                $num=$black->where('user_id="'.$user_id.'"')->count();

	            if($num){
	            	$this->error('你的爽约次数已经到达三次表现很差，不能再预约了，请联系系统管理员');
	            }else{
	                $appointment=M('Appointment');

	                //统计此时间此人的预约数，如果为零说明是第一次做添加操作，如果不为零说明不是第一次做修改操作。
	                $count=$appointment->where('user_id="'.$user_id.'" and expert_code="'.I('expert_code').'" and appointment_date="'.I('appointment_date').'"')->count();
	                
	                if($count==0){
	                	$appnum=$appointment->where('user_id="'.$user_id.'"  and appointment_date > curdate() ')->count();
	                	if($appnum==3){
	                		$this->error('预约次数已达上限');
	                	}else{
		                    $appointment->create($data);
		                    if($appointment->add()){
		                       $this->success('预约成功','/Hospital/index.php/User/Appointment/lst');
		                    }else{
		                        $this->error('预约的人太多，1有点拥挤');
		                    }
		                }
	                }else{
	                    $appointment->time=I('time');
	                    if($appointment->where('user_id="'.$user_id.'" and expert_code="'.I('expert_code').'" and appointment_date="'.I('appointment_date').'"')->save()){
	                        $this->success('预约成功','/Hospital/index.php/User/Appointment/lst');
	                    }else{
	                        $this->error('预约的人太多，有点拥挤');
	                    }
	                }
	            }
            }

            
            
//下面是非提交显示的内容
        }else{


            $expert_code=I('expert_code');
            $info=I('info');
            $expert=M('Expert');
            $hospital=M('Hospital');

            $expertone=$expert->where('expert_code="'.$expert_code.'"')->find();
            $hos_code=$expertone['hos_code'];
            $hospitalone=$hospital->where('hos_code="'.$hos_code.'"')->find();
            $hos_name=$hospitalone['hos_name'];
            $expert_img=$expertone['expert_img'];
            $expert_name=$expertone['expert_name'];
            $expert_skill=$expertone['expert_skill'];
            $department_name=$expertone['department_name'];
            
            $this->assign('expert_name',$expert_name);
            $this->assign('hos_name',$hos_name);
            $this->assign('expert_img',$expert_img);
            $this->assign('expert_skill',$expert_skill);
            $this->assign('department_name',$department_name);
            $this->assign('expert_code',$expert_code);
            $this->assign('info',$info);
            $this->assign('hos_code',$hos_code);





            $date=array();
            $week=array();
            $week2=array();
            for($i=0;$i<7;){
                $d=strtotime("+".++$i." day");
                $week[$i]=strtolower(date("l",$d));
                $week2[$i]=strtolower(date("l",$d)).'2';
                $date[$i]=date('Y-m-d',$d);
                if($week[$i]==$info){
                    $appointment_date=$date[$i];
                }
                if($week2[$i]==$info){
                    $appointment_date=$date[$i];
                }
            }
            $this->assign('appointment_date',$appointment_date);

            $appointment=M('Appointment');
            $count=$appointment->where('expert_code="'.$expert_code.'" and appointment_date="'.$appointment_date.'" and info="'.$info.'"')->count();
            $appointment_info=$appointment->where('expert_code="'.$expert_code.'" and appointment_date="'.$appointment_date.'" and info="'.$info.'"')->select();
            //生成现在拥有的时间表
            $timeList=array();
            if(strpos($info,"2")!=false){
                $timeList[0]="14:00:00";
                $timeList[1]="15:00:00";
                $timeList[2]="16:00:00";
                if($count==1){
                    $now=$appointment_info[0]['time'];
                    foreach ($timeList as $n=>$k){
                        if($k==$now){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                    }
                }elseif ($count==2) {
                    $now=$appointment_info[0]['time'];
                    $now2=$appointment_info[1]['time'];
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
                }
            }else{
                $timeList[0]="09:00:00";
                $timeList[1]="10:00:00";
                $timeList[2]="11:00:00";
                if($count==1){
                    $now=$appointment_info[0]['time'];                    
                    foreach ($timeList as $n=>$k){
            
                        if($k== $now){
                        //删除对应的元素
                        unset($timeList[$n]);
                        }
                    }
                }elseif ($count==2) {
                    $now=$appointment_info[0]['time'];
                    $now2=$appointment_info[1]['time'];
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
                } 
            }
            $this->assign('timeList',$timeList);


            $h = new HeaderController;
            $header=$h->head();
            $this->assign('header',$header);
            $this->display();
        }
    }
}