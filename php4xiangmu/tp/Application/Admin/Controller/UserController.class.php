<?php
  namespace Admin\Controller;
  use Think\Controller;
  class UserController extends CommonController{
      public function getPri(){
        $u=D('User');
        $u_id=session('u_id');
        $pri=$u->join("u join user_role ur on u.u_id=ur.u_id join role_privilege rp on ur.r_id=rp.r_id join privilege p on p.p_id=rp.p_id join role r on r.r_id=ur.r_id")->
        where("u.u_id=$u_id")->group("p.p_id")->select();
        //var_dump($pri);exit;
        //$num=count($pri);
      foreach ($pri as $key => $v) {
         $r_name=$v['r_name'];
         $c_name=$v['controller_name'];
         $p_name=$v['action_name'];
         $str.='-'.$c_name.'/'.$p_name;   
      }
       //echo $str;exit;
       cookie('url',trim($str,'-'));
       //var_dump($_COOKIE['url']);exit;

    }



       /*
        *方法名批量添加用户
        *@function p_add
        */
     public function p_add(){
       $r=M('Role');
       $u=D('User');
       $ur=M('UserRole');
       if(IS_POST){
            //接收用户信息
            $u_info=trim(I('post.u_info'));
            $r_id=I('post.r_id');
            //var_dump($u_info);exit;
            $u_info=explode("\n", $u_info);
            //var_dump($u_info);exit;
            foreach ($u_info as $key => $value) {
               $value=trim($value);
               $data[]=explode("-",$value);
               //var_dump($data);          
            }
          //添加入库无非两种方法，一种是添加一条数据add($data),另外一种是addAll($data)
          // add()中的data  $data=array(
          //                       'u_name'=>'张三',
          //                       'u_pass'=>'123'
          //                    );
          //添加多条数据 addAll() 
          //               $data=array(
          //                 array('u_name'=>'张三','u_pass'=>123),
          //                 array('u_name'=>'张三','u_pass'=>123),
          //                 array('u_name'=>'张三','u_pass'=>123),
          //               );

              //平凑addAll()方法的二维数组
             for($i=0;$i<count($data);$i++){
                $arr[$i]['u_name']=$data[$i][0];
                $arr[$i]['u_pass']=md5($data[$i][1]);
             }
             //把数据插入到user表中，并同时往用户角色中间表中插入用户ID和角色ID
             for($i=0;$i<count($arr);$i++){
                 if($u_id=$u->add($arr[$i])){
                    $u_ids[]=$u_id;
                 }
             }
             //拼凑中间表的addAll()方法中的二维数组
             for($i=0;$i<count($u_ids);$i++){
                $data1[$i]['u_id']=$u_ids[$i];
                $data1[$i]['r_id']=$r_id;
             }
             $ur->addAll($data1);
             //var_dump($arr);exit;
             //$u_id=$u->addAll($arr);
             //echo $u_id;

       }else{
        //查出所有的角色
        $this->data=$r->select();
        //var_dump($data);exit;
        $this->display();
       }

     }

        /*
         * 方法名：添加用户
         * @function add
         */
  	    public function add(){
            $u=D('User');
            $r=M('Role');
            $ur=M('UserRole');
            if(IS_POST){
               if($u->create()){
                  $u_name=I('post.u_name');
                  $u_pass=md5(I('post.u_pass'));
                  $r_id=I('post.r_id');
                  $data=array('u_name'=>$u_name,'u_pass'=>$u_pass);
                  if($u->add($data)){
                    echo '添加成功';
                  }else{
                    echo '添加失败';
                  }
               }

            }else{
              //获取角色信息
              $this->role_info=$r->select();
              //var_dump($role_info);exit;
              $this->display();
            }

        }
   /*
    *显示用户列表
    */
    public function lists(){
        $u=D('User');
        $this->data=$u->where("u_id!=1")->select();
        //var_dump($data);exit;
        $this->display();
    }
   /*
     *删除用户，注意，如果中间表中有用户ID，必须先删除中间表，
     *再删除用户表，如果中间表中没有对应关系，直接删除
    */
    public function user_del(){
       $ur=M('UserRole');
       $u=D('User');
       $u_id=I('get.id');
       //要查出中间表中是否存在u_id的对应关系
       $data=$ur->where("u_id=$u_id")->select();
       if($data){
          //先删除中间表数据
          if($ur->where("u_id=$u_id")->delete()){
            //中间表删除成功,再删除用户表
             $u->delete($u_id);
          }

       }else{ 
         //直接删除
         $u->delete($u_id);
         $this->success('删除成功',U('lists'),2);
     }
       

    }


      /*
       * 方法名：用户分配角色 
       * @function fen_role
       * @access public
       */
      public function fen_role_add(){
         $u=D("User");
         $role=M("Role");
         $ur=M('UserRole');
      $user_info=$u->where("u_id!=1")->select();
      //var_dump($user_info);exit;
      //已经分配过角色的用户不能再分配角色，
      //或者就是在用户列表中不显示已经有角色的用户
       foreach ($user_info as $key => $v) {
           $u_id=$v['u_id'];
           //echo $u_id;
           //查询中间表中是否给该用户分配了角色
           $data=$ur->where("u_id=$u_id")->select();
           if($data){
              unset($user_info[$key]);
              //$arr[]=$user_info[$key];
           }
       }
       //var_dump($arr);exit;
       //var_dump($user_info);
         //$this->user_info;
         $this->assign('user_info',$user_info);
         $this->role_info=$role->select();
         $this->display();
      }
     /*
       * 方法名：用户添加角色 
       * @function  fen_role_addok
       * 
      */
     public function fen_role_addok(){
         $u=D("User");
         $u_r=M("UserRole");
          $rs=I("post.r_id");
          //var_dump($rs);
            for($i=0;$i<count($rs);$i++){
            	$arr[$i]['r_id']=$rs[$i];
            	$arr[$i]['u_id']=I("post.u_id");
            }
            if($u_r->addAll($arr)){
                $this->success("添加成功",U("fen_role_list"),2);
            }else{
                $this->error("添加失败",U("fen_role_add"),2);
            }
         }
       /*
        * 方法名：显示用户列表
        * 显示出所有的用户信息及所对应的角色
        * @function fen_role_list
        */
       public function fen_role_list(){
          $u_r=M("UserRole");
          $this->data=$u_r->field("ur.id,ur.u_id,u.u_name,group_concat(r.r_name) r_name")->
          join("ur join user u on ur.u_id=u.u_id join role r on ur.r_id=r.r_id")->group("u_id")->select();
          //var_dump($data);
          $this->display();
       }
       /*
        *修改用户的角色，如果该用户已经分配角色，
        *那么先删除用户对应的角色，进行重新添加
        */
       public function update(){
           $u=D('User');
           $ur=M('UserRole');
           $r=M('Role');
           if(IS_POST){
              $u_id=I('post.u_id');
              $r_id=I('post.r_id');
              //拼凑成使用addAll()来实现
              for($i=0;$i<count($r_id);$i++){
                  $data[$i]['u_id']=$u_id;
                  $data[$i]['r_id']=$r_id[$i];
              }
              //var_dump($data);exit;
              $ur->where("u_id=$u_id")->delete();
              if($ur->addAll($data)){
                echo '添加成功';
              }else{
                echo '失败';
              }
           }else{
             //提供修改的表单
              $id=I('get.id');
              //echo $id;
              //以记录ID查出该条数据
              $this->data=$ur->where("id=$id")->find();
              //var_dump($data);exit;
             $this->user_info=$u->select();
             $this->role_info=$r->select();
             $this->display();
           }
       }

       
  }