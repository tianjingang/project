<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function add(){
    	$res = D('Index')->insert($_POST);
    	if($res){
    		$this->success('添加成功',U('Index/show'));
    	}else{
    		$this->error('添加失败');
    	}
    }

    function show(){
    	$arr = D('Index')->look();
    	$this->assign('arr',$arr);
    	$this->display('show');
    }

    function show_one(){
    	$id = $_GET['id'];
    	$arr = D('Index')->find("id='$id'");
    	$this->assign('arr',$arr);
    	$this->display('show_one');
    }

    function update(){
    	$id= $_POST['id'];
    	$res = D('Index')->update("id='$id'",$_POST);
    	if($res){
    		$this->success('修改成功！',U('Index/show'));
    	}else{
    		$this->error('修改失败！');
    	}
    }
}