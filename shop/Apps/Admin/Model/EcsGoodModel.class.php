<?php
namespace Admin\Model;
use Think\Model;
class EcsGoodModel extends Model{
    protected $table='ecs_good';
    //添加
    function add($data){
        return M($this->table)->add($data);
    }
    //查询商品名称
    function select_all($where){
        return M($this->table)->where($where)->find();
    }
    //商品货号
    function sel_single($where){
        return M($this->table)->where($where)->find();
    }
    //自动生成货号
    public function sel($where)
    {
        return M($this->tablename)->order($where)->find();
    }
    //修改
    public function update($where,$data){
        return M($this->tablename)->where($where)->save($data);
    }
    //查看单条
    function show_one($where){
        return M($this->tablename)->where($where)->find();
    }
    //删除
    function delete($where){
        return M($this->tablename)->where($where)->delete();
    }
}