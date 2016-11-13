<?php
class Shequ extends IController
{
    public $layout = 'shequ';//继承公共样式

    function init()
    {
        CheckRights::checkUserRights();
    }
    function index(){
        $username=$this->user['username'];
        $id=$this->user['user_id'];
        $userObj=new  IModel('user');
        $userObj->where="id='$id'";
        $userinfo=$userObj->getObj();
        $this->userinfo=$userinfo;
       //从控制器向视图层传值 查询城市表
        $cityObj=new IQuery('ad_city');
        $cityObj->where='city="上海"';
        $cityinfo=$cityObj->find();
        $this->cityinfo=$cityinfo;
        $username=$this->user['username'];
        if($username!=""){
            $this->redirect('index');
        }
        else{
            echo "<script>alert('尊敬的用户,请您先登录');location.href=('simple/login')</script>";
        }
    }

}