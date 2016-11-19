<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
//添加顶级分类
    public function add(){
        $res=D('Category')->add($_POST);
        if($res){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }
    //子分类
    public function addson(){
       $this->display();
    }
    //添加子分类
    public function addsun(){
        $data=array(
            'p_id'=>I('post.pid'),
            'c_name'=>I('post.c_name')
        );
        $res=D('Category')->add($data);
        if($res){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }
  //问题分类列表
    public function category(){
        $res=D('Category')->look();
        $cate=dealArr($res);
        $this->assign('arr',$cate);
        $this->display('category');
    }

    //删除分类列表
    public function del(){
        $id=I('get.id');
        $res=D('Category')->del("id='$id'");
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    //修改1
    function cate(){
       $id=$_GET['id'];
        $arr=D('Category')->find("id='$id'");
        $this->assign('arr',$arr);
        $this->display('cate');
    }
    //修改2
    function update(){
        $id=$_POST['id'];
        $name=I('post.c_name');
        $res=D('Category')->update("id='$id'",array('c_name'=>$name));
        if($res){
            $this->success('修改成功',U('category'));
        }else{
            $this->error('修改失败');
        }

    }
}