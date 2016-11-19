<?php
namespace Admin\Model;
use Think\Model;
class EcsTypeModel extends Model{
    protected $table='ecs_type';
    //查询
    function look(){
        return M($this->table)->select();
    }
    //添加
    function add($data){
    	return M($this->table)->add($data);
    }
}