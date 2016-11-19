<?php
namespace Home\Controller;
use Think\Controller;
class AddressController extends Controller{
    public function address(){
        $arr=D('ecs_address')->select();
        $this->assign('arr',$arr);
        $this->display();
    }
    public function address_edit(){
        $this->display();
    }
    public function address_add(){
        $data=I('post.');
        $m=D('ecs_address');
        $res=$m->add($data);
        if($res){
            $this->success('编辑收货地址成功',U('Flow/flow2'));
        }
        else{
            $this->error('编辑收货地址失败');
        }

    }
    public function del(){
        $a_id=$_POST['a_id'];
        $res=M('ecs_address')->where(array('a_id'=>$a_id))->delete();
        if($res){
            echo 1;
        }
        else{
            echo 0;
        }
    }

}