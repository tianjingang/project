<?php
namespace Home\Model;
use Think\Model;
class PrivilegeModel extends Model{
    protected $table='Privilege';
    //添加
    function add($data){
        return M($this->table)->add($data);
    }
    //查询所有数据
    public function sel(){
        //return M($this->table)->select();
        return $this->Table('Privilege')->select();
    }
}