<?php
namespace Home\Controller;
use Think\Controller;
class PrivilegeController extends Controller{
    function Privilege(){
        $this->display('add');
    }
    //添加
    function add_privilege(){
        $data=I('post.');
        $res=D('Privilege')->add($data);
        if($res){
            $this->error('添加成功',U('lst'));
        }
        else{
            $this->error('添加失败');
        }

    }
    //给角色分配权限
    function allot_privilege(){
        if(!IS_POST){
            $role=D('Role');
            $privilege=D('Privilege');
            $arr=$privilege->sel();
            $data=$role->selete();
            $this->assign('arr',$arr);
            $this->assign('data',$data);
            $this->display();
        }else{
           $r_id=I('post.r_id');
            $p_id=I('post.p_id');
            $Role_Privilege=D('role_privilege');
            foreach($p_id as $key=>$val){
                $data[$key][r_id]=$r_id;
                $data[$key][p_id]=$val;
            }
           $res=$Role_Privilege->id_del($r_id);
            $arr=$Role_Privilege->RolePrivilege($data);
             if($arr){
                 $this->success('添加成功');
             }


        }
    }
    //查询
    function lst(){
        $arr=D('Privilege')->sel();
        //alert($arr);die;
        //echo $arr;die;
        //var_dump($arr);die;
        $this->assign('arr',$arr);
        $this->display('lst');
    }
    //选泽
    public function mo()
    {
        $rid = I('post.rid');
        $res = D('RolePrivilege')->select_all("r_id='$rid'");
        if($res)
        {
            echo json_encode($res);
        }
        else{
            echo 0;
        }
    }

}