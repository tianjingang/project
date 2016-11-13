<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    /*
    *@Name Wyf.
    *@Date 2016/5/12.
    *@控制器
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Alogin_model");
	}
	public function login()
	{
        //跳转登录页面
		$this->load->view("Login/login.html");  
	}
	//验证码
	public function verify()
	{
		$this->load->helper('captcha');
		$config =    array(    
			'fontSize'    =>    30,    // 验证码字体大小    
			'length'      =>    4,     // 验证码位数    
			'useNoise'    =>    false, // 关闭验证码杂点
			);
		$Verify =     new Verify($config);
		$Verify->entry();
	}
	//登录验证
    public function checklogin()
    {
    	//加载验证码
    	$this->load->helper('captcha');
    	//加载cookie
    	$this->load->helper('cookie');
    	//接值
    	$username = $this->input->post('username');
    	$pwd = $this->input->post('pwd');
    	$code = $this->input->post('code');
    	$remember = $this->input->post('remember');
    	$verify = new Verify();
    	//验证验证码是否正确    
    	if(!$verify->check($code))
    	{
    	 	echo 0;exit;
    	}
    	//查询单条
        $res = $this->Alogin_model->sel("username='$username'");
    	//判断七天免登录是否选中
    	if($remember=="checked")
    	{
    		setcookie('username',$res['username'],time()+7*24*3600);
    		// cookie('username',$res['username'],7*24*3600); //持久cookie
    	}
    	else
    	{
    		setcookie('username',$res['username']);
    		// cookie('username');    //会话cookie
    	}
    	//验证用户名是否存在
    	if(!$res)
    	{
    		echo 1;die;
    	}
    	//验证密码是否正确
    	if($pwd!=$res['pwd'])
    	{
    		echo 1;die;   
    	}
    	//设置seesion
    	// session('username',$res['username']);
        $_SESSION['username'] = $res['username'];
    	echo "ok";
    }
}
