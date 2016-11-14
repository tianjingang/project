<?php
namespace Home\Model;
use Think\Model;
class WmvModel extends Model{
    protected $table='Wmv';
    public function show($where){
        return M($this->table)->where($where)->select();
    }
    public function find($where){
        return M($this->table)->where($where)->find();
    }
}