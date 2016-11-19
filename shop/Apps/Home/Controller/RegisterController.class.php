<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller{
        public function register(){
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
    //注册新用户
    public function register_add(){
        $res=M('ecs_user')->add($_POST);
        if($res){
            $this->redirect('Index/index','','2','跳转中');
        }

    }
}