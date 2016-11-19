<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    public function _initialize(){
        if(!session('user')){
            $this->redirect('Login/login', 3, '正在登录...');
        }
    }
}