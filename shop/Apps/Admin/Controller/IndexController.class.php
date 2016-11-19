<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display('Login/login');
    }
    public function index1(){
        $this->display('index');
    }
    //退出登录
    function login_out(){
        session(null);
        setcookie('user','',time()-1);
        $this->redirect('Login/login', 3, '页面跳转中...');
    }
}