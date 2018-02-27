<?php
namespace System\Controller;
use Think\Controller;
//用于添加医院

class HospitalController extends Controller {
    public function lst(){
        $hos = M('Hospital');
        //这个地方不知道为什么如果list在上边的话就不能正常显示，show完之后在list就可以正常显示
        if($_GET['hos_name'] !=''){
            $count=$hos->where('hos_name ="'.I('hos_name').'"')->count();
        }else if ( ($_GET['hos_area']!='') and ($_GET['hos_rank'] !='')) {
            $count=$hos->where('hos_area ="'.I('hos_area').'"AND hos_rank ="'.I('hos_rank').'" ')->count();

        }else if ( ($_GET['hos_area']=='') and ($_GET['hos_rank'] !='')) {
            $count=$hos->where('hos_rank ="'.I('hos_rank').'" ')->count();

        }else if ( ($_GET['hos_area']!='') and ($_GET['hos_rank'] =='')) {
            $count=$hos->where('hos_area ="'.I('hos_area').'"')->count();

        }else{
            $count=$hos->count();
        }

        $page=new \Org\Bjy\Page($count,3);
        $show=$page->show();

        //if之内的语句用于判断表单中的值是什么然后做出相应的输出
        
        if($_GET['hos_name'] !=''){
            //var_dump(I('hos_name'));
            $list = $hos->where('hos_name ="'.I('hos_name').'"')->limit($page->firstRow.','.$page->listRows)->select();
        }else if ( ($_GET['hos_area']!='') and ($_GET['hos_rank'] !='')) {
            $list = $hos->where('hos_area ="'.I('hos_area').'"AND hos_rank ="'.I('hos_rank').'" ')->limit($page->firstRow.','.$page->listRows)->select();

        }else if ( ($_GET['hos_area']=='') and ($_GET['hos_rank'] !='')) {
            $list = $hos->where('hos_rank ="'.I('hos_rank').'" ')->limit($page->firstRow.','.$page->listRows)->select();

        }else if ( ($_GET['hos_area']!='') and ($_GET['hos_rank'] =='')) {
            $list = $hos->where('hos_area ="'.I('hos_area').'"')->limit($page->firstRow.','.$page->listRows)->select();

        }else{
            $list=$hos->limit($page->firstRow.','.$page->listRows)->select();
        }

        $this->assign('hosList', $list);
        $this->assign('page',$show);
        $this->display();
    }
    


    public function add(){
    	if(IS_POST){
    		$data['hos_name'] = I('hos_name');
    		$data['hos_area'] = I('hos_area');
    		$data['hos_rank'] = I('hos_rank');

    		$hos = M('Hospital');
            $name=$hos->where('hos_name="'.$data['hos_name'].'"')->count();
            if($name==0){
        		if($hos->create($data)){
        			if($hos->add()){
        				$this->success('添加医院成功');
        			}
        			
        		}
        		else{
        			$this->error('添加医院失败');
        		}
            }else{
                $this->error('添加失败，这家医院已经存在，看看是不是搞错了');
            }
    	}else{
            $this->display();
        }
    }

    public function delhos(){
        $expert=M('Expert');
        $hos_code=I('hos_code');
        $a=$expert->where('hos_code="'.$hos_code.'"')->count();
        if($a==0){
            $hos=M('Hospital');
            $info = $hos->delete($hos_code);
            if($info){
                $this->success('删除医院成功');
            }
            else{
                $this->error('删除医院失败');
            }

        }else{
            $this->error('还有医生在此医院上班呢,不能删除此医院');
        }
    }

}