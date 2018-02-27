<?php
namespace User\Controller;
use Think\Controller;
//此控制器是进行预约的操作
class HeaderController extends Controller {
    public function head(){
        if(session('id')==''){
            $header= "<a style=\"width: 20%\" class=\"btn btn-primary btn-large\" href=\"/Hospital/index.php/Login/Login/userlogin\">登录</a>";
        }else{
            $header= "<a style=\"width: 20%\" class=\"btn btn-primary btn-large\" href=\"/Hospital/index.php/User/Appointment/lst\">个人中心</a>";
        }
    return $header;
    }

}