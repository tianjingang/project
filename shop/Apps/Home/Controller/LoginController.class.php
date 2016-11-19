<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function login(){
        $this->display();
    }
    //验证码
    public function verify(){
        ob_clean();
        $Verify =     new \Think\Verify();
        // 设置验证码字符为纯数字
        $Verify->length   ='4';
        $Verify->fontttf = '5.ttf';
        $Verify->entry();
    }
    //验证登录
    function login_check(){
        $data=I('post.');
        $m=D('ecs_user');
        $arr=$m->where("u_name='$data[u_name]' and u_pwd='$data[u_pwd]'")->find();
        if($arr){
            session('u_id',$arr['u_id']);
            session('u_name',$arr['u_name']);
            session('u_pwd',$arr['u_pwd']);
            $this->redirect('Index/index');
        }
        else{
            $this->error('登录失败');
        }

    }
     //退出
    function login_out(){
        session_destroy();
        $this->redirect('Index/index');
    }
}