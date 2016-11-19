<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
//添加
    function add_user(){
        $data=I('post.');
        $data['u_pass']=md5(123);
        $res=D('user')->add($data);
        if($res){
            $this->error('添加成功',U('lst'));
        }
        else{
            $this->error('添加失败');
        }

    }

//展示
  function lst(){
      $arr=M('user')->select();
      //alert($arr);die;
      //echo $arr;die;
      //var_dump($arr);die;
      $this->assign('arr',$arr);
      $this->display('lst');
  }
   /* //即点即改
    public function click(){
        $id=$_GET['id'];
        $connet=$_GET['connet'];
        $User=M('User');
        if($User->where("uid=$id and uname='$connet'")->find()){
            echo 1; die;
        }

        $User=D('User');
        if($User->user_uplade($id,$connet)){
            echo 1;
        }else{
            echo 0;
        }
    }*/

}