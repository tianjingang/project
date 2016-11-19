<?php
namespace Admin\Model;
use Think\Model;
class EcsUserModel extends Model{
    protected $tablename = "ecs_user";
   public function select_all($where){
       return M($this->tablename)->where($where)->find();
   }
}
