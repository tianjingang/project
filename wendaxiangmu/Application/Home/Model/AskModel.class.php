<?php
namespace Home\Model;
use Think\Model;
class AskModel extends Model{
    protected $table='hd_ask';
    //添加
    function add($data){
        return M($this->table)->add($data);
    }
    //查询
    function look($where){
        return M($this->table)->where($where)->find();
    }
    /*//全部查询
    function show(){
        return M($this->table)->select();
    }*/
}
