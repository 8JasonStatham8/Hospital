<?php
namespace Hospital\Controller;
use Think\Controller;
//管理科室信息
class DepartmentController extends Controller {
	//显示科室页面
    public function lst(){
        $department = M('Department');
        $hos_code=session('id');
        if(IS_POST){
        	$department_name=I('department_name');
        	$list=$department->where('department_name="'.$department_name.'" and hos_code="'.$hos_code.'"')->limit($page->firstRow.','.$page->listRows)->select();
        	$this->assign('departmentList', $list);
        	$this->display();
        }else{
        	
        	$count=$department->where('hos_code="'.$hos_code.'"')->count();
        	$page=new \Org\Bjy\Page($count,3);
        	$show=$page->show();
        	$list=$department->where('hos_code="'.$hos_code.'"')->limit($page->firstRow.','.$page->listRows)->select();
        	$this->assign('departmentList', $list);
        	$this->assign('page',$show);
        	$this->display();
        }
    }
    

//添加科室功能
    public function add(){
    	$hos_code=session('id');
    	if(IS_POST){
    		$data['department_describe'] = I('department_describe');
    		$data['department_name'] = I('department_name');
    		$data['department_sort'] = I('department_sort');
    		$data['hos_code']=$hos_code;
    		$department = M('Department');
    		$count=$department->where('hos_code="'.$hos_code.'" and department_name="'.I('department_name').'"')->count();
    		if($count==0){
	        	if($department->create($data)){
	        		if($department->add()){
	        			$this->success('添加科室成功');
	        		}			
	        	}else{
	        		$this->error('添加科室失败');
	        	}
	        }else{
	        	$this->error('已经有此科室了');
	        }
    	}else{
            $this->display();
        }
    }
//删除科室功能
    public function deldepartment(){
    	$department_name=I('department_name');
    	$department=M('Department');
        $expert=M('Expert');
        $hos_code=session('id');
        $count=$expert->where('department_name="'.$department_name.'" and hos_code="'.$hos_code.'"')->count();
        if($count==0){
        	$info=  $department->where('department_name="'.$department_name.'" and hos_code="'.$hos_code.'"')->delete();
        	if($info){
        		$this->success('删除科室成功');
        	}else{
        		$this->error('删除科室失败,请联系网站维护人员');
        	}
        }else{
	        $this->error('删除科室失败，还有医生在此科室下工作');
	    }
    }
}