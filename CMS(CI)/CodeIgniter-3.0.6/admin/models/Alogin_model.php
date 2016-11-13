<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alogin_model extends CI_Model {
	public function sel($where)
	{
		return $this->db->where($where)->get("a_login")->row_array();
	}
}
