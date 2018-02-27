<?php
namespace System\Controller;
use Think\Controller;
//用于管理黑名单
class BlackController extends Controller {
    public function black(){
    	$black = M('Black');
    	if($_GET['user_id'] !=''){
    		$user_id=I('user_id');
    		$list = $black -> where('user_id="'.$user_id.'"')->select();
    	}
    	else{
    		$list=$black -> select();
    	}
    	$this->assign('blackList' , $list);
        $this->display();
    }

    public function delblack(){
    	$black = M('Black');
    	$user_id=I('user_id');
        //注意：当表中要删除的数据非主键时只能用where的方式删除
        //$info = $black->where('user_id="'.$user_id.'"')->delete();
        //把表中user_id修改为主键后就可以直接在delete()中写主键值，从而删除一行了。
        $info = $black->delete($user_id);
        if($info){
            $this->success('已将此患者从黑名单中移除');
        }
        else{
            $this->error('移除失败');
        }
    }
}