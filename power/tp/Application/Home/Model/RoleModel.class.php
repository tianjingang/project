<?php
namespace Home\Model;
use Think\Model;
class RoleModel extends Model {
    protected $table='role';
    //添加
    function add($data){
        return M($this->table)->add($data);
    }
    //查询所有数据
    public function selete(){
        //return M($this->table)->select();
        return $this->Table('role')->select();
    }

}