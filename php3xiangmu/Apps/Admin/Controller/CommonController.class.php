<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class CommonController extends Controller{
    function __construct(){
        parent::__construct();
        if(!session('?username')){
            $this->redirect('Login/login','',1,'请先登录');
        }
    }
}







?>