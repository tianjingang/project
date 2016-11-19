<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
    function _initialize(){
        if(empty($_SESSION['u_id'])){
            $this->redirect("Login/login",'',2,'请先登录');
        }
    }
}