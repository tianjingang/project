<?php
  namespace Admin\Controller;
  use Think\Controller;
  class IndexController extends CommonController{
    public function index(){
    	$this->display();
    }
    public function top(){
    	$this->display();
    }
     public function left(){
      $u=D("User");
      $this->data=$u->getPri();
      $this->display();
    }
     public function main(){
    	$this->display();
    }
   
  }