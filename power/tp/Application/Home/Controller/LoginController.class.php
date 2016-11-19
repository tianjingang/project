<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    function login(){
        $this->display();
    }
    //验证登录
    function login_check(){

    /*  //  var_dump(M('user'));die;
       $username=I('post.username');
       $password=md5(I('post.password'));
      $arr=M('user')->where("u_name='$username'")->select();
        $arr2=M('user')->where("u_pwd='$password'")->select();
     if(!$arr){
            $this->success('用户名不正确',U('Login/login'));
        }
       if(!$arr2){
           $this->success('密码不正确',U('Login/login'));
       }*/
        $this->redirect('Index/index');
    }
public function checkcodeimg(){
    $Verify =     new \Think\Verify();
    $Verify->fontSize = 30;
    $Verify->length   = 3;
    $Verify->useNoise = false;
    $Verify->entry();

    }
}