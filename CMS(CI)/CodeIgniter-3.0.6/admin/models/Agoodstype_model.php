<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agoodstype_model extends CI_Model {
	public function add($data)  //添加
	{
		return $this->db->insert_batch("a_goodstype",$data);
	}
}
