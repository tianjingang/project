<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
	$this->display();
	}

	//退出
	public function loginOut(){
		session(null);
		$this->redirect('Login/login','',1,'退出登录。。。');
	}
	//个人信息，登录时间，登录IP
	public function show(){
		$username=session('user');
		$res=D('Login')->find("username='$username'");
        $this->assign('arr',$res);
		$this->display();
	}


}