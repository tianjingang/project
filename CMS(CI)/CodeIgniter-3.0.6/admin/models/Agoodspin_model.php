<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agoodspin_model extends CI_Model {
	public function add($data)  //添加
	{
		return $this->db->insert("a_goodspin",$data);
	}
	public function sel_all()  //查询全部
	{
		return $this->db->get("a_goodspin")->result_array();
	}
	public function look_one($where)  //根据条件查询单条
	{
		return $this->db->where($where)->get("a_goodspin")->row_array();
	}
	public function sel()   //排序查询全部
	{
		return $this->db->order_by("p_order",'desc')->get('a_goodspin')->result_array();
	}
	public function del($where)  //删除
	{
		return $this->db->where($where)->delete("a_goodspin");
	}
	public function up($where,$data)   //修改
	{
		return $this->db->where($where)->update("a_goodspin",$data);
	}
	public function select($where)  //根据条件查询全部
	{
		return $this->db->where($where)->get('a_goodspin')->result_array();
	}
	public function sel_limit($page_size,$limit)
	{
		return $this->db->limit($page_size,$limit)->get("a_goodspin")->result_array();
	}
}
