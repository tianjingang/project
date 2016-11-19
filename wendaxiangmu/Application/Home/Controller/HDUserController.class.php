<?php
namespace Home\Controller;
use Think\Controller;
class HDUserController extends Controller
{
    //添加
    public function add(){
        $logintime=date('Y-m-d H:i:s');
        $loginip=get_client_ip();
        $data=array(
            "number"=>I('post.number'),
            "user"=>I('post.user'),
            "pwd1"=>I('post.pwd1'),
            "pwd2"=>I('post.pwd2'),
            "logintime"=>$logintime,
            "loginip"=>$loginip,
            "registime"=>$logintime,

        );
        $res=M('hd_user')->add($data);
        if($res){
            //session('id',$res['id']);
            session('user',I('post.user'));
            $this->success('注册成功',U('Index/index'));
        }
        else{
            $this->error('添加失败');
        }
    }
}