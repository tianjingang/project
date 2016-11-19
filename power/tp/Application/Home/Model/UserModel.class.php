<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    protected $table='user';
    //添加
    function add($data){
        return M($this->table)->add($data);
    }
    //查询所有数据
    public function lst(){
        //return M($this->table)->select();
        return $this->Table('user')->select();
    }
    /*public function user_uplade($id,$connet){
        $data['uname'] = $connet;
        //如果查到则返回flase
        if($this->Table('user')->where("uname='$connet'")->find()){
            return false;
        }
        return $this->Table('user')->where("uid=$id")->save($data);
    }*/

}