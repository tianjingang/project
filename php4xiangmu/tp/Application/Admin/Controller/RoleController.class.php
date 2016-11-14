<?php
  namespace Admin\Controller;
  use Think\Controller;
  class RoleController extends CommonController{
  	 //添加角色表单
  	  public function add(){
          //$this->success('s',U('Login/login'),2);
  	  	$this->display();
  	  }
  	 //添加角色入库
  	  public function addok(){
  	  	 $role=M("Role");
  	  	 if($role->create()){
  	  	 	if($role->add()){
               $this->success("添加成功",U('lists'),2);
  	  	 	}else{
                $this->success("添加失败",U('add'),2);
  	  	 	}
  	  	 }else{
  	  	 	$role->getError();
  	  	 }
  	  }
    /*
     *角色列表的显示
     * function role_list
     */
   public function role_list(){
      $r=M('Role');
      $this->data=$r->select();
      //var_dump($data);exit;
      $this->display();

   }
   /*
    *删除角色
    *@controller_name   role
    *@action_name      role_del
    */
    public function role_del(){
       $r=M('Role');
       $ur=M('UserRole');
       $rp=M('RolePrivilege');
       $r_id=I('get.id');
        //第一步：如果用户表中有用户对应角色，那么该角色不能被删除
        //第二步：如果角色权限表中有角色对应的权限，那么必须先删除角色权限表中的数据
        $data1=$ur->where("r_id=$r_id")->select();
        if(!$data1){
          //没有用户对应角色，可以删除，但是必须先删除角色权限表中数据
           $data2=$rp->where("r_id=$r_id")->select();
           if($data2){
               //先删除中间表中的数据
              $rp->where("r_id=$r_id")->delete();
              $r->delete($r_id);
           }else{
            //直接删除
             $r->delete($r_id);
           }
        }else{
          //有用户对应角色，不能删除
          echo '有用户对应此角色，不能被删除';
        }
    }

    //给角色分配权限
    public function fen_pri_add(){
       $r=M("Role");
       $p=D("Privilege");
       $this->role_info=$r->select();
       $this->pri_info=$p->getInfo();
       //var_dump($pri_info);
       $this->display();
    }
    //角色权限列表入库
    public function fen_pri_addok(){
        $rp=M("RolePrivilege");
        $rp->create();
        $p_ids=I("post.p_id");
        for($i=0;$i<count($p_ids);$i++){
          $data[$i]['p_id']=$p_ids[$i];
          $data[$i]['r_id']=I("post.r_id");
        }
        if($rp->addAll($data)){
           $this->success('添加成功',U('fen_pri_list'),2);
        }else{
           $this->error("添加失败",U('fen_pri_add'),2);
        }
    }
    //显示角色和权限的对应列表
    public function fen_pri_list(){
         $rp=M("RolePrivilege");
         $this->data=$rp->field("rp.id,r.r_name,group_concat(p.p_name) p_name")->
         join("rp join role r on rp.r_id=r.r_id join privilege p on p.p_id=rp.p_id")
         ->group("r.r_id")->select();
         //var_dump($data);
         $this->display();
    }

  } 