<?php
  namespace Admin\Controller;
  use Think\Controller;
  class CommonController extends Controller{
  	/*
  	 public function __construct(){
  	 	parent::__construct();
  	 	if(!session('u_id')){
           $this->error("请先登录",U("Login/login"),2);
  	 	}
  	 }
   */
  	 public function __construct(){
      parent::__construct();
       $u_id=session('u_id');
  	 	if(!session('u_id')){
           $this->error("请先登录",U("Login/login"),2);
  	 	 }
      $u=D("User");
      /*
      $data=$u->field("concat(p.controller_name,'-',p.action_name) url")->join("u join user_role ur on u.u_id=ur.u_id join role_privilege rp on rp.r_id=ur.r_id join privilege p on p.p_id=rp.p_id")->
      where("u.u_id=$u_id")->group("p.p_id")->select();
      */
       $url=explode('-',cookie('url'));

        //var_dump($url);exit;
      //var_dump($data);exit;
      /*
      foreach ($data as $key => $value) {
         $arr[]=$value['url'];
      }  
      */
	  //var_dump($arr);exit;
      $str=CONTROLLER_NAME.'/'.ACTION_NAME;
      if(CONTROLLER_NAME=='Index'){
        return true;
      }
      if($u_id==1){
        return true;
      }
      if(in_array($str,$url)){
        return true;
      }else{
        $this->error("您没有权限",U("Index/index"),2);
      }
  	 }
  }