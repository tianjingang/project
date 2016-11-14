<?php
namespace Admin\Model;
use Think\Model;
header('content-type:text/html;charset=utf8');
class VideoModel extends Model{
    protected $table='Video';
    //电影分类添加
    public function add($data){
        return M($this->table)->add($data);
    }
    //电影分类列表
    public function select(){
        return M($this->table)->select();
    }
    //单条查询
    public function find($where){
        return M($this->table)->where($where)->find();
    }
    //删除之后放入回收站:状态改变
    public function update($where,$data){
        return M($this->table)->where($where)->save($data);
    }
    //回收站查询
    public function look($where){
        return M($this->table)->where($where)->select();
    }
    //删除
    public function delete($where){
        return M($this->table)->where($where)->delete();

    }
}





?>