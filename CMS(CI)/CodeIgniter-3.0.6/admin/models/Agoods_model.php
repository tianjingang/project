<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Agoods_model extends CI_Model {
	public function sel($where)  //根据条件查询单条
	{
		return $this->db->where($where)->get("a_goods")->row_array();
	}
	public function sel_find($where) 			//查出数据中最大的一个进行自动生成货号
	{
		return $this->db->order_by($where)->get("a_goods")->row_array();     
	}
	public function add($data)  //添加
	{
		return $this->db->insert("a_goods",$data);
	}
	public function sel_all($where)   //根据条件查询全部内容
	{
		return $this->db->where($where)->get('a_goods')->result_array();
	}
	public function update($where,$data)  //修改
	{
		return $this->db->where($where)->update("a_goods",$data);
	}
	public function del($where)
	{
		return $this->db->where($where)->delete('a_goods');
	}
	public function sel_limit($page_size,$limit,$where)
	{
		return $this->db->limit($page_size,$limit)->where($where)->get('a_goods')->result_array();
	}
	public function look_desc($where)
	{
		return $this->db->order_by("id","desc")->limit(1)->get("a_goods")->row_array();
	}
}
