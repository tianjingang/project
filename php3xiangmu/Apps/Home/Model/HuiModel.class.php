<?php
namespace Home\Model;
use Think\Model;
class HuiModel extends Model
{
    private $table="hui";
    function add($data)
    {
        return M($this->table)->add($data);
    }
    function select()
    {
        return M($this->table)->select();
    }
}