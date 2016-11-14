<?php
namespace Admin\Model;
use Think\Model;
header('content-type:text/html;charset=utf8');
class HuiModel extends Model{
    protected $table='hui';
    //查询
    public function select(){
        return M($this->table)->select();
    }
}