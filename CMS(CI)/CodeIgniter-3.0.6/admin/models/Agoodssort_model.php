<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agoodssort_model extends CI_Model {
	public function sel_all()
	{
		return $this->db->get("a_goodssort")->result_array();
	}
	public function look_one($where)
	{
		return $this->db->where($where)->get("a_goodssort")->row_array();
	}
	public function sel($where)
	{
		return $this->db->where($where)->get("a_goodssort")->result_array();
	}
	public function add($data)
	{
		return $this->db->insert("a_goodssort",$data);
	}
	public function update($where,$data)   //修改
	{
		return $this->db->where($where)->update("a_goodssort",$data);
	}
	public function del($where)
	{
		return $this->db->where($where)->delete("a_goodssort");
	}
}
