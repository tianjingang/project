<?php
class Good_self extends IController
{
    public function self(){
       $id=$_GET['id'];
        //echo $id;
        if(empty($id)){
          $arr=array(
              "status"=>001,
              "data"=>'商品id不能为空',
              "sta"=>'error'
          );
          echo json_encode($arr);
            exit;
        }
        if(!empty($id)){
            $goodObj=new IModel('goods');
            $brr=$goodObj->getObj("id='$id'");
            $arr=array(
                "status"=>200,
                "data"=>$brr,
                "sta"=>'success'
            );
            echo json_encode($arr);
            exit;
        }
    }
}