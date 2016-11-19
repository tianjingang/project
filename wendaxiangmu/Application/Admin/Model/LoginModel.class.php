<?php 
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model {
	//定义一个表名
	protected $table = 'Login';
   /* protected $table = 'hd_user';*/
	//单项查询
	public function find($where){
		return M($this->table)->where($where)->find();
	}
	//修改
	public function update($where,$data){
		return M($this->table)->where($where)->save($data);
	}
}


 ?>