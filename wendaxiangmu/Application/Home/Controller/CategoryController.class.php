<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends Controller{
    //查询
    function look(){
            $db=M('category');
            $cate=$db->where(array('p_id'=>0))->select();
            foreach($cate as $k=>$v){
                $cate[$k]['child']=$db->where(array('p_id'=>$v['id']))->select();
            }
            $this->assign('cate',$cate);
            $start=I('post.start');
            echo $start;
            $arr=M('hd_ask')->limit(5)->select();
            $this->assign('ask',$arr);
            $this->display('category');
    }
    //
    function show(){

        $id=$_GET['id'];
        $ar=M('Category')->where(array('p_id'=>$id))->select();
        $this->assign('ar',$ar);
        $this->display('category');
    }

}