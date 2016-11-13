<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	/*
	*@Name Wyf.
	*@Date 2016/5/12.
	*@页面控制器
	 */
	public function index()
	{
		//跳转后台首页
		$this->load->view("Index/index.html");
	}
	public function menu()
	{
		$this->load->view("Index/menu.html");
	}
	public function drag()
	{
		$this->load->view("Index/drag.html");
	}
	public function top()
	{
		$this->load->view("Index/top.html");
	}
	public function main()
	{
		$this->load->view("Index/main.html");
	}
	//删除session
	public function delsession()
	{
		$this->load->helper('cookie');
		unset($_SESSION['username']);
		delete_cookie('username');
		//跳转登录页面
		redirect("Index/login");
	}
}
