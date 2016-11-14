<?php
namespace Home\Model;
use Think\Model;
class ConstructModel extends Model{
    protected $table='Construct';
    public function show($where){
        return M($this->table)->where($where)->select();
    }
    public function find($where){
        return M($this->table)->where($where)->find();
    }
    public function insert($data){
        return M($this->table)->add($data);
    }
}