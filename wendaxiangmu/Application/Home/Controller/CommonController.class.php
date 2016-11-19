<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller
{
    public function _validate()
    {
        if (!C('WEDSTATUE')) {
            E('网站正在维护中。。。');
        }
        //session值赋给cookie
        if(isset($_COOKIE['user']) && !isset($_SESSION['user'])){
            $arr = array('user'=>$_COOKIE['user']);
            $res = M('user')->where("user='$arr'")->find();
           session('user',$res['user']);
            session('id',$res['id']);
        }
    }
    //取消session
    function login_out(){
        session(null);
        $this->redirect('Index/index','' , 2, '页面跳转中...');
    }


    //登录验证
    function login_check(){
        $number=I('post.number');
        $pwd1=I('post.pwd1');
        $auto=I('post.auto');
        $arr=M('hd_user')->where(array("number"=>$number))->find();
        if($arr){
           if($arr['pwd1']==$pwd1){
               if($auto!=""){
                   cookie('uaer',$arr['user'],7*24*3600);
                   session('user',$arr['user']);
                   session('id',$arr['id']);
                   $this->success('登录成功',U('Index/index'));
               }else{
                   cookie('uaer',$arr['user']);
                   session('user',$arr['user']);
                   session('id',$arr['id']);
                   $this->success('登录成功',U('Index/index'));
               }
           }else{
               $this->error('密码错误');
           }
       }else{
           $this->error('用户名不存在');
       }
        $this->redirect('Index/index','' , 2, '页面跳转中...');

    }

}