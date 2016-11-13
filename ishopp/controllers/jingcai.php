<?php
class Jingcai extends IController
{
    public $checkRight = 'all';
    public $layout = 'site';
    private $data = array();

    public function init()
    {
        IInterceptor::reg('CheckRights@onCreateAction');
    }
    public function adds(){
       // echo 1;die;
        $person=ISafe::get('username');
        $jinpai=$_POST['jinpai'];
        $jiangpai=$_POST['jiangpai'];
        $order=$_POST['order'];
        $arr=array(
            "person"=>$person,
            "jinpai"=> $jinpai,
            "jiangpai"=> $jiangpai,
            "order"=>$order
        );
        $liyueObj=new IModel('jingcai');
        $liyueObj->setData($arr);
        $liyueObj->add();

    }

}