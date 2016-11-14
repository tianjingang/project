<?php
namespace Admin\Model;
use Think\Model;
header('content-type:text/html;charset=utf8');
class PingModel extends Model{
    protected $table='ping';
    //单条查询
    public function find($where){
        return M($this->table)->where($where)->find();
    }
    //评论查询
    public function select($where){
        return M($this->table)->where($where)->select();
    }
    //评论删除
    public function delete($where){
        return M($this->table)->where($where)->delete();
    }
    //评论放入回收站
    public function update($where,$data){
        return M($this->table)->where($where)->save($data);
    }
}












?>