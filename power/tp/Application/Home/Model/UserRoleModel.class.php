<?php
namespace Home\Model;
use Think\Model;
class UserRoleModel extends Model{
    public function UserRole($data){
       return $this->table('User_Role')->addAll($data);
    }
    //角色唯一性
    public function id_del($id){
        return $this->table('User_Role')->where("u_id=$id")->delete();

    }
    public function select_all($where)
    {
        return $this->table('User_Role')->where($where)->select();
    }
}