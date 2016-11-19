<?php 
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
	protected $tablename = 'demo';

	public function Add($data){
	 	return M('demo')->add($data);

	}
}