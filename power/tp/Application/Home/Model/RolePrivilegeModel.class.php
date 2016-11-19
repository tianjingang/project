<?php
namespace Home\Model;
use Think\Model;
class RolePrivilegeModel extends Model{
    public function RolePrivilege($data){
        return $this->table('role_privilege')->addAll($data);
    }
    //角色唯一性
    public function id_del($id){
        return $this->table('role_privilege')->where("r_id=$id")->delete();

    }
    //默认选中
    public function select_all($id)
    {
        return $this->table('role_privilege')->where($id)->select();
    }
}