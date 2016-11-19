<?php
namespace Home\Model;
use Think\Model;
class HDUserModel extends Model
{
    protected $tableName='hd_user';
   //添加
    function add($data){
        return M($this->table)->add($data);
    }
    //查询
    function look($where){
        return M($this->table)->where($where)->find();
    }
}