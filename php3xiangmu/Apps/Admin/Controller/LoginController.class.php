<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class LoginController extends Controller{
    //显示模板
    function login(){
        $this->display('login');
    }
    function verify(){
        $Verify =new \Think\Verify();
        // 验证码字体使用
        $Verify->fontttf = '5.ttf';
        $Verify->fontSize = 15;
        $Verify->length   = 4;
        $Verify->entry();
    }
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    /*
         * 1.判断是否是post接值
         * 2.验证用户名，如果用户名不正却，提示
         * 3.验证密码，如果密码不正确，提示
         * 4.登陆成功修改上次登陆的时间和ip
         * 5.保存登录的信息
         * */

    //验证用户名，密码
    function login_check(){
        $verifycode=I('post.verifycode');
        if(!$this->check_verify($verifycode)){
            die('验证码不正确');
        }
        if(!IS_POST)die('非法提交');
        //通过I方法接值
        $username=I('post.username');
        $pwd=I('post.pwd');
        //echo $pwd;
        //echo $username;
        //判断用户名，密码
       $arr=D('Login')->look("username='$username'");
        //var_dump($arr);die;
        if(!$arr)die('用户名不存在');
        if($arr['pwd']!=$pwd)die('密码错误');
        //获取当前时间
        $data=date('Y-m-d H:i:s');
        //获取当前ip
        $ip = get_client_ip();
        $Last_time=$arr['login_time'];
        //echo $Last_time;die;
        /*//获取上一次时间
        $Last_time=$data;*/
        //放到数组里
        $ar=array(
            "Last_time"=>$Last_time,
            "Login_time"=>$data,
            "Last_ip"=>$ip
        );

        //通过后，通过id修改时间和ip
        D('login')->update("id=$arr[id]",$ar);
        //登入成功后设置session
        session('id',$arr['id']);
        session('username',$arr['username']);
        session('pwd',$arr['pwd']);
       session('Last_time',$arr['Last_time']);
        session('login_time',$arr['login_time']);
        session('login_ip',$arr['login_ip']);
        session('photo',$arr['photo']);
        $this->redirect('Index/index','',1,'正在登录,请稍候....');

    }
}




