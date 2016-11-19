<?php
namespace Home\Model;
use Think\Model;
class LoginModel extends Model{
    protected $table='user';
    //查询
    function look($where){
        return M($this->table)->where($where)->find();
    }
}