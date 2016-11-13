<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class optimize extends CI_Controller {
	/*
		@优化控制器
		@Name Wyf.
		@Date 2016/05/25
	 */
	public function selfdatum() //跳转个人资料页面
	{
		$this->load->view("Optimize/selfdatum.html");
	}
}
