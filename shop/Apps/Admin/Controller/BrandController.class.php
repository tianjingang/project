<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends Controller(){
	//查看
	function look(){
		$arr=M('ecs_brand')->select();
		//echo $arr;die;
        $this->assign('arrb',$arr);
		$this->display('good_list');
	}
}