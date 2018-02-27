<?php
namespace Hospital\Model;
use Think\Model;
class ChangeModel extends Model {
    protected $_validate = array(
        array('hos_password','number','密码不能为空且是不超过六位的数字',1,6,3),
    );
}