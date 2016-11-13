<?php
class Jinpai extends IController
{
    public $checkRight = 'all';
    public $layout = 'admin';
    private $data = array();

    public function init()
    {
        IInterceptor::reg('CheckRights@onCreateAction');
    }
    public function add_jinpai(){
        $this->redirect('add_jinpai');
    }
    public function adds(){
        $jinpai=$_POST['jinpai'];
        $jiangpai=$_POST['jiangpai'];
        $order=$_POST['order'];
        $arr=array(
            "jinpai"=> $jinpai,
            "jiangpai"=> $jiangpai,
            "order"=>$order
        );
        $liyueObj=new IModel('liyue');
        $liyueObj->setData($arr);
        $liyueObj->add();
        $this->update();
    }
    public function update(){
        $liyueObj=new IModel('liyue');//管理员
        $arr=$liyueObj->getObj();
//        print_r($arr);
        $jin=$arr['jinpai'];
        $jiang=$arr['jiangpai'];
        $or=$arr['order'];
        $jingcaiObj=new IModel('jingcai');//用户
        $brr=$jingcaiObj->query();
       //print_r($brr);die;
        foreach($brr as $val){
            if($val['jinpai'] == $jin){
                $jinpai=40;
            }
            else
            {
                $jinpai = 0;
            }
            if($val['jiangpai'] == $jiang){
                $jiangpai=40;
            }
            else
            {
                $jiangpai=0;
            }
            if($val['order'] == $or){
                $order=20;
            }
            else
            {
                $order=0;
            }
            $sum = $jinpai + $jiangpai + $order;
            $jingcaiObj->setData(array("sum"=>$sum));
            $jingcaiObj->update("id=".$val['id']);
        }
        $this->redirect('add_jinpai');
    }
}