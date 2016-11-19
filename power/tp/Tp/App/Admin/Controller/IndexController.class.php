<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class IndexController extends Controller {
    public function index(){
    	$this->display();
    }
    //添加
    public function add(){
    	$data = $_POST;
    	$obj = D('demo');
    	$obj2 = $obj ->Add($data);
    	//查询sqlyuju
    	//echo $obj->getLastSql();die;
    	//echo $obj->_sql();die;
    	if($obj2){
    		$this->success('添加成功！','look',3);
    	}else{
    		$this->error('添加失败');
    	}
    }

    function look(){
    	$obj = M('demo');
    	$arr = $obj->select();
    	$this->assign('arr',$arr);
    	//如果display不谢，默认方法名
    	$this->display();
    }
}