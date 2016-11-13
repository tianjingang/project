<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Anature_model extends CI_Model {
	public function sel_all()  //根据条件查询所有
	{
		return $this->db->get("a_nature")->result_array();
	}
	public function sel_where($where)  //根据条件查询单条
	{
		return $this->db->where($where)->get('a_nature')->row_array();
	}
	public function up($where,$data)  //修改
	{
		return $this->db->where($where)->update('a_nature',$data);
	}
}
