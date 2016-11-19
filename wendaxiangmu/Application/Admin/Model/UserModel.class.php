<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    protected $table='User';
    //添加
    function add($data){
        return M($this->table)->add($data);
    }
    //查询
    function look($where){
        return M($this->table)->where($where)->select();
    }
    //修改
    function update($where,$data){
        return M($this->table)->where($where)->save($data);
    }
    //删除
    function delete($where){
        return M($this->table)->where($where)->delete();
    }
}