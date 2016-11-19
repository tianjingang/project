<?php
namespace Admin\Controller;
use Think\Controller;
class AskController extends Controller{
    //待解决问题
    function Wait(){
        $ar=M('hd_ask')->where("solve=0")->select();
        $this->assign('ar',$ar);
        $this->display();
    }
    //所有问题
    function All(){
        $ar=M('hd_ask')->select();
        $this->assign('ar',$ar);
        $this->display();
    }
}