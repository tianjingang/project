<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model{
    protected $table='Category';
    //查询
    function show(){
        return M($this->table)->where("p_id=0")->select();
    }
    //单查
    function look($where){
        return M($this->table)->where($where)->find();
    }
}
