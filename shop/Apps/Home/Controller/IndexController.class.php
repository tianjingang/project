<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $m=M('ecs_good');
        $ar=$m->limit(6)->select();
        //var_dump($ar);die;
        $this->assign('ar',$ar);
        $this->display();
//        $db=M('ecs_good');
//        $cate=$db->where(array('p_id'=>0))->select();
//        foreach($cate as $k=>$v){
//            $cate[$k]['child']=$db->where(array('p_id'=>$v['id']))->select();
//        }
//        $this->assign('cate',$cate);
//        $this->display();
    }
    function goods(){
        $id=$_GET['id'];
        $ar=M('ecs_good')->where("g_id='$id'")->select();
        $this->assign('ara',$ar);
        $this->display('Goods/goods');
    }


}