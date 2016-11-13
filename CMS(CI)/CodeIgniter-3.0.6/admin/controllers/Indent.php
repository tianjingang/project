<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indent extends MY_Controller {
    /*
    *@Name Wyf.
    *@Date 2016/5/24.
    *@订单控制器
    */
   public function __construct()
   {
   		parent::__construct();
   		$this->load->model("Hindent_model");
   }
   public function indentlist()  //订单列表
   {
   		$res['list'] = $this->Hindent_model->sel_all();
   		$this->load->view("Indent/indentlist.html",$res);
   }
}
?>