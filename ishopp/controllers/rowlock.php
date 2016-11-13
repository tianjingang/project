<?php
/**
 * @brief 商品模块
 * @class Goods
 * @note  后台
 */
class Rowlock extends IController
{
    public $checkRight  = 'all';
    public $layout = 'admin';
    private $data = array();

    public function init()
    {
        IInterceptor::reg('CheckRights@onCreateAction');
    }

    function minutes(){
        $id=$_GET['id'];
        //$id   = IFilter::act(IReq::get("id"),'int');
        $db=new PDO("mysql:host=localhost;dbname=ishop",'root','root');
        $sql="select * from iwebshop_goods where id='$id' and store_nums>0";
        $arr=$db->query($sql);
        //var_dump($arr);die;
        $re=$arr->fetch();
        //var_dump($re);die;
        if($re){
            $sql1="update iwebshop_goods set store_nums=store_nums-1 where id='$id'";
            $flag=$db->exec($sql1);
            if($flag){
                echo "<script>alert('秒杀成功');location.href=('site/index')</script>";
            }
            else{
                echo "false";
            }

        }
        else{
            echo "store_nums not enough";
        }

    }
}