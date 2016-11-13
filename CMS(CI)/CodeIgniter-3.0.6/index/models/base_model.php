<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model {
	protected $tableName = "";
	public function __construct()
	{
		parent::__construct();
	}
	public function sel_all()     //查询所有
	{
		return $this->db->get($this->tableName)->result_array();
	}
	public function sel_find($where)   //根据条件查询单条
	{
		return $this->db->where($where)->get($this->tableName)->row_array();
	}
	public function add($data)  //添加内容
	{
		return $this->db->insert($this->tableName,$data);
	}
	public function update($where,$data)  //修改
	{
		return $this->db->where($where)->update($this->tableName,$data);
	}
	public function sel_where($where)  //根据条件查询所有
	{
		return $this->db->where($where)->get($this->tableName)->result_array();
	}
	public function del($where)  //删除
	{
		return $this->db->where($where)->delete($this->tableName);
	}
}
