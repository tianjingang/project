<?php
namespace Admin\Model;
use Think\Model;
class EcsBrandModel extends Model{
    protected $table='ecs_brand';
    //查询
    function looks(){
        return M($this->table)->select();
    }
}