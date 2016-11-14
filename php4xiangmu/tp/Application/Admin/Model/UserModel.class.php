<?php
  namespace Admin\Model;
  use Think\Model;
  class UserModel extends Model{
  	 //动态验证方式
  	  public $rules=array(
        array('u_name','require','用户名不能为空'),
        array('u_pass','require','密码不能为空'),
        array('r_pass','require','确认密码不能为空'),
        array('code','require','验证码不能为空'),
        array('code','checkCode','验证码输入错误',0,'callback'),
        array('u_name','checkName','用户名不正确',0,'callback'),
        array('u_pass','checkPass','密码输入错误',0,'callback')    
  	 );
     //静态验证
     protected $_validate=array(
        array('u_name','require','用户名不能为空'),
        array('u_pass','require','密码不能为空'),
        array('r_pass','require','确认密码不能为空'),
        array('u_name','','用户已经存在！',0,'unique',1),
        array('r_pass','u_pass','两次输入的密码不一致',0,'confirm')
        );
      //验证用户名
     public function checkName(){
     	$u_name=I("post.u_name");
     	$row=$this->table("user")->where("u_name='$u_name'")->find();
     	if($row){
     		return true;
     	}else{
     		return false;
     	}
     }
     //验证密码
     public function checkPass(){
     	$u_name=I("post.u_name");
     	$u_pass=md5(I("post.u_pass"));
     	$row=$this->table("user")->where("u_name='$u_name'")->find();
     	if($row['u_pass']==$u_pass){
     		 session('u_id',$row['u_id']);
             session('u_name',$u_name);
     		return true;
     	}else{
     		return false;
     	}
     }
     //验证验证码
     public function checkCode(){
     	$code=I("post.code");
     	$verify = new \Think\Verify();  
     	if($verify->check($code)){
     		return true;
     	}else{
     		return false;
     	}
     }
    //获取权限
     public function getPri(){
       $u_id=session('u_id');
     // if($u_id==1){
        $data=$this->table("privilege")->where("parent_id=0")->select();
        foreach ($data as $k => $v) {
            $arr=$this->table("privilege")->where("parent_id=".$v['p_id'])->select();
             $data[$k]['son']=$arr;
        }
     // }
      /*
      else{
      $data=$this->join("u join user_role ur on u.u_id=ur.u_id join role_privilege rp on rp.r_id=ur.r_id join privilege p on p.p_id=rp.p_id")->
      where("u.u_id=$u_id and p.parent_id=0")->group("p.p_id")->select();
    foreach ($data as $k => $v) {
      $arr=$this->join("u join user_role ur on u.u_id=ur.u_id join role_privilege rp on rp.r_id=ur.r_id join privilege p on p.p_id=rp.p_id")->
      where("u.u_id=$u_id and p.parent_id=".$v['p_id'])->group("p.p_id")->select();
       $data[$k]['son']=$arr;
       }
    }
    */
       return $data;
     }
   //钩子函数(在完成添加后自动触发的方法),只适合add()方法，不适合addAll()方法
   public function _after_insert($data1){
       //var_dump($data1);
      //exit;
       $ur=M('UserRole');
       $u_id=$data1['u_id'];
       $r_id=I('post.r_id');
       //echo $r_id;exit;
       $data=array('u_id'=>$u_id,'r_id'=>$r_id);
       //var_dump($data);exit;
      $ur->add($data);
   }

  }