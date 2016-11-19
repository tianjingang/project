<?php 
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model {
	//定义一个表名
	protected $table = 'Category';
	//添加
	public function add($data){
		return M($this->table)->add($data);
	}
	//单项查询
	public function find($where){
		return M($this->table)->where($where)->find();
	}
	//多项查询
	public function look(){
		return M($this->table)->select();
	}
	//修改
	public function update($where,$data){
		return M($this->table)->where($where)->save($data);
	}
	//删除
	public function del($where){
		return M($this->table)->where($where)->delete();
	}
}


 ?>