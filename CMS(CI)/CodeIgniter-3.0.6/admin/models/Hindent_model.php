<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hindent_model extends CI_Model {
	public function sel_all()
	{
		return $this->db->get("h_indent")->result_array();
	}
}
