<?php
namespace Home\Controller;
use Think\Controller;
class RoleController extends Controller {
//添加
    function add_role(){
        $data=I('post.');
        $res=D('role')->add($data);
        if($res){
            $this->error('添加成功',U('lst'));
        }
        else{
            $this->error('添加失败');
        }

    }
    //给用户分配角色
   function allot_role(){
      if(!IS_POST){
          $user=D('User');
          $role=D('Role');
          //var_dump($role);die;
          $arr=$user->lst();
          //print_r($arr);die;
         $data=$role->selete();
          $this->assign('arr',$arr);
          $this->assign('data',$data);
       $this->display();
      }else{
          $u_id=I('post.u_id');
          $r_id=I('post.r_id');
          $User_Role=D('UserRole');
          foreach($r_id as $key=>$val){
              $data[$key]['u_id']=$u_id;
              $data[$key]['r_id']=$val;
          }
          $res=$User_Role->id_del($u_id);
          $arr= $User_Role->UserRole($data);
          if($arr){
              $this->error('ok',U('allot_role'));
          }
          else{
              $this->error('败');
          }

      }
   }
    function lst(){
        $arr=D('role')->selete();
        //alert($arr);die;
        //echo $arr;die;
        //var_dump($arr);die;
        $this->assign('arr',$arr);
        $this->display('lst');
    }
    //选泽
    public function choice()
    {
        $uid = I('post.uid');
        $res = D('user_role')->select_all("u_id='$uid'");
        if($res)
        {
            echo json_encode($res);
        }
        else{
            echo 0;
        }
    }

}