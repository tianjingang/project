<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
  public function login(){
       $this->display();
   }
    //生成验证码
    public function yan(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,
           'useNoise'    =>    false, // 关闭验证码杂点
           );
        $Verify =     new \Think\Verify($config);// 设置验证码字符为纯数字
        $Verify->codeSet = '0123456789';
        $Verify->entry();
    }
    public function checklogin()
    {
        $u_name = I("post.u_name");
        $u_pwd = I('post.u_pwd');
        $code = I('post.code');
        $remember = I('post.remember');
        $verify = new \Think\Verify();
        //验证验证码是否正确
        if(!$verify->check($code))
        {
            echo 0;exit;
        }
        $res = D('ecs_user')->select_all("u_name='$u_name'");
        //判断七天免登录是否选中
        if($remember=="checked")
        {
            cookie('user',$res['u_name'],7*24*3600); //持久cookie
        }
        else
        {
            cookie('user');    //会话cookie
        }
        //验证用户名是否存在
        if(!$res)
        {
            echo 1;die;
        }
        //验证密码是否正确
        if($u_pwd!=$res['u_pwd'])
        {
            echo 1;die;
        }
        //设置seesion
        session('user',$res['u_name']);
        session('u_id',$res['u_id']);
        echo "ok";
    }


}
?>