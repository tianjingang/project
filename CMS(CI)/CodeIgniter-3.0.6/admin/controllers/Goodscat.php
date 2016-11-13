<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Goodscat extends MY_Controller {
	/*
		*@Name Wyf.
		*@Date 2016/5/14.
		*@商品分类控制器
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Agoodssort_model");
		$this->load->model("Agoods_model");
		$this->load->model("Agoodsattr_model");
	}
	public function goodsorderup()      //几点几改  （修改商品分类 的排序）
	{
		$s_order = $this->input->post('s_order');
		$id = $this->input->post('id');
		$res = $this->Agoodssort_model->update("s_id='$id'",array("s_order"=>$s_order));
		if($res)
		{
			echo 1;
		}     				//成功失败都返回1
		else
		{
			echo 1;
		}
	}
	public function delsort()    //移除分类
	{
		$id = $this->input->post('id');
		$res = $this->Agoodssort_model->sel("parent_id='$id'");
		if($res)
		{
			echo 0;
		}
		else
		{
			$ar = $this->Agoodssort_model->del("s_id='$id'");
			if($ar){echo 1;}
		}
	}
	public function zhuanyi()
	{
		$id = $this->input->post('id');
		$res = $this->Agoodssort_model->look_one("s_id='$id'");
		$parent_id = $res['parent_id'];
		if($parent_id==0)
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	public function zhuangoods()   //跳转转移商品页面
	{
		$id = $_GET['id'];
		$arr = $this->Agoodssort_model->look_one("s_id='$id'");
		$res = $this->Agoodssort_model->sel_all();
		$rs = $this->recursion($res,$s_id=0,$level=0);     //通过递归查询分类然后复制过去
		$info['arr'] = $arr;
		$info['rs'] = $rs;
		$info['id'] = $id;
		$this->load->view("Goods/zhuangoods.html",$info);
	}
	public function recursion($res,$s_id=0,$level=0)  //递归
	{
		static $data = array();
		foreach($res as $key=>$val)
		{
			if($val['parent_id']==$s_id)
			{
				$val['level'] = $level;
				$val['html'] = str_repeat("--",$level);
				$data[] = $val;
				$this->recursion($res,$val['s_id'],$level+1);
			}
		}
		return $data;
	}
	public function zhuan()    //转移商品功能
	{
		$id = $this->input->post('id');
		$sort = $this->input->post('sort');	//前边下拉框的值
		$find = $this->Agoodssort_model->look_one("s_id='$sort'");
		$parent_id = $find['parent_id'];  //获取parent_id的值
		$sort1 = $this->input->post('sort1');
		$find1 = $this->Agoodssort_model->look_one("s_id='$sort1'");
		$p_id = $find1['s_id'];
		if($id == $p_id)
		{
			echo "<script>alert('不能自己移动到自己的位置！');location.href='goodscat'</script>";
		}
		$arr = $this->Agoodssort_model->update("s_id='$id'",array('parent_id'=>$p_id));
		if($arr)
		{
			echo "<script>alert('转移商品成功！');location.href='goodscat'</script>";
		}
		else
		{
			echo "<script>alert('转移商品失败！');location.href='goodscat'</script>";
		}
	}	
	public function goodscat()
	{
		$res = $this->Agoodssort_model->sel_all();    	//查询表中全部的内容
		$arr['list'] = $this->recursion($res,$s_id=0,$level=0);     //通过递归查询分类然后复制过去
		$this->load->view("Goods/cat_list.html",$arr);
	}
	public function search()  //搜索
	{
		$val = $this->input->post('val');
		$res = $this->Agoods_model->sel_all("g_name like '%$val%' and g_rubbish=1");
		echo json_encode($res);
	}
	public function goodsattr()  //进行查询商品属性
	{
		$val = $this->input->post('val');
		$res = $this->Agoodsattr_model->sel_where("nid='$val'");
		echo json_encode($res);
	}
}
?>