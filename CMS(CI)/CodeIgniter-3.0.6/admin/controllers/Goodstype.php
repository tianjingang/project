<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Goodstype extends MY_Controller {
	/*
		*@Name Wyf.
		*@Date 2016/5/17.
		*@商品属性控制器
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Anature_model");
		$this->load->model("Agoodsattr_model");
	}
	public function goodstype()  //跳转商品类型页面
	{
		$res['list'] = $this->Anature_model->sel_all();  //查询商品属性表中的所有内容
		$this->load->view("Goods/goods_type_list.html",$res);
	}
	public function upgoods_type()  //几点几改（修改商品属性名称）
	{
		$nid = $this->input->post('id');
		$n_name = $this->input->post('n_name');
		$data = array(
			'n_name'  =>$n_name,
			);
		$arr = $this->Anature_model->up("nid='$nid'",$data);
		if($arr){echo 1;}else{echo 1;}
	}
	public function upstate()  //修改状态 （图片对错号）
	{
		$id = $this->input->post('id');
		$res = $this->Anature_model->sel_where("nid='$id'");
		if($res['n_state']==1)
		{
			$this->Anature_model->up("nid='$id'",array("n_state"=>0));
			echo 0;
		}
		else
		{
			$this->Anature_model->up("nid='$id'",array("n_state"=>1));
			echo 1;
		}
	}
	public function compiletype()  //调到编辑页面
	{
		$nid = $this->input->get('nid');
		$res['list'] = $this->Anature_model->sel_where("nid='$nid'");
		$this->load->view('Goods/goods_type_edit.html',$res);
	}
	public function editgoodstype()  //修改商品属性功能
	{
		$nid = $this->input->post('nid');
		$n_name = $this->input->post('n_name');
		$n_state = $this->input->post('n_state');
		$n_team = $this->input->post('n_team');
		$arr = array(
			'n_name' =>$n_name,
			'n_team' =>$n_team,
			'n_state' =>$n_state
			);
		$res = $this->Anature_model->up("nid='$nid'",$arr);
		if($res)
		{
			echo "<script>alert('修改商品属性成功！');location.href='goodstype'</script>";
		}
		else
		{
			echo "<script>alert('修改商品属性失败！');location.href='goodstype'</script>";
		}
	}
	public function goodsattr()  //跳转属性列表页面
	{
		$nid = $this->input->get('nid');
		$find = $this->Anature_model->sel_where("nid='$nid'");  //查询单条取出商品类型名称
		$all = $this->Anature_model->sel_all();
		$n_name = $find['n_name'];
		$res['list'] = $this->Agoodsattr_model->sel_where("nid='$nid'");  //根据条件查询所有
		$res['n_name'] = $n_name;
		$res['all'] = $all;
		$this->load->view('Goods/goods_attr_list.html',$res);
	}
	public function search_goodsattr()   //搜索商品类型功能
	{
		$val = $this->input->get('val');
		$find = $this->Anature_model->sel_where("nid='$val'");  //查询单条取出商品类型名称
		$n_name = $find['n_name'];
		$res = $this->Agoodsattr_model->sel_where("nid='$val'");  //根据id查询所有属性
		$arr['n_name'] = $n_name;    //把属性名称和属性列表的所有内容放到一个数组中
		$arr['res'] = $res;
		echo json_encode($arr);	
	}
}
?>