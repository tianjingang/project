<?php
  namespace Admin\Controller;
  use Think\Controller;
  class LoginController extends Controller{
  	  //显示登录表单
  	  public function login(){
  	  	$this->display();
  	  }
  	  //获取验证码
  	  public function code(){
  	  	$Verify =new \Think\Verify();
  	  	$Verify->fontSize = 30;
  	  	$Verify->length   = 4;
  	  	$Verify->entry();
  	  }
     //登录验证
     public function dologin(){
     	 $u=D('User');
     	 if($u->validate($u->rules)->create()){
              $this->success("登录成功",U('Index/index'),2);
     	 }else{
     	 	$this->error($u->getError(),U('Login/login'),2);
     	 }
     }  
    //退出的方法
     public function logout(){
     	session(null);
     	$this->success('退出成功',U('login'));
     }

    }