<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
    function index(){
        $this->display('User');
    }
    //添加
    function add(){
        $number=I('post.number');
        $user=I('post.user');
        $pwd1=I('post.pwd1');
        $pwd2=I('post.pwd2');
        $answer=I('post.answer');
        $require=I('post.require');
        $ask=I('post.ask');
        $gold=I('post.gold');
        $rich=I('post.rich');
        $logintime=date("Y-m-d H:i:s");
        $loginip=get_client_ip();
        $registertime=date("Y-m-d H:i:s");
        $data=array(
            "number"=>$number,
            "user"=>$user,
            "pwd1"=>$pwd1,
            "pwd2"=>$pwd2,
            "answer"=>$answer,
            "require"=>$require,
            "ask"=>$ask,
            "gold"=>$gold,
            "rich"=>$rich,
            "logintime"=>$logintime,
            "loginip"=>$loginip,
            "registertime"=>$registertime,
        );
        $res=D('User')->add($data);
        if($res){
            $this->success('添加成功',U('Index/show'));
        }
    }
    //展示
    function show(){
        $arr=D('User')->look("statue=0");
        $this->assign('arr',$arr);
        $this->display();
    }
    //将状态改为 1 默认0
    function up1(){
        $id=$_GET['id'];
        $ar=array(
            'statue'=>1
        );
        $res=D('User')->update("id='$id'",$ar);
        if($res){
            $this->success('账号已锁定',U('User/show1'));
        } else {
            $this->error('账号锁定失败');
        }
    }
    //已禁止用户列表
    function show1(){
        $id =1;
        $arr=D('User')->look("statue='$id'");
        $this->assign('arr',$arr);
        $this->display();
    }
    //解锁
    function open_user(){
        $id=$_GET['id'];
        $data=array(
            'statue'=> 0,
        );
        $re=D('User')->update("id='$id'",$data);
        if($re){
            $this->success('解锁成功',U('User/show'));
        }
        else{
            $this->error('解锁失败');
        }
    }
    //永久删除用户
    function del(){
        $id=$_GET['id'];
        $res=D('User')->delete("id='$id'");
        if($res){
            $this->success('永久删除成功',U('User/show1'));
        }
        else{
            $this->error('永久删除失败');
        }
    }
}