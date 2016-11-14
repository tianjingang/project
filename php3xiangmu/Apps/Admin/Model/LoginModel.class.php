<?php
namespace Admin\Model;
use Think\Model;
header('content-type:text/html;charset=utf8');
class LoginModel extends Model{
    protected $table='Login';
    function look($where){
        return M($this->table)->where($where)->find();
    }
    //修改
    function update($where,$data){
        return M($this->table)->where($where)->save($data);

    }
    //添加
    function add($where){
        return M($this->table)->where($where)->add();
    }

}
?>