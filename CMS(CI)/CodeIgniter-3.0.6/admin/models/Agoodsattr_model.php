<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agoodsattr_model extends CI_Model {  	//商品属性表
	public function sel_where($where)  //根据条件查询所有
	{
		return $this->db->where($where)->get('a_goodsattr')->result_array();
	}
	
}
