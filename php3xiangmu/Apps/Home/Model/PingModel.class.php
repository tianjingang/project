<?php
namespace Home\Model;
use Think\Model;
class PingModel extends Model
{
    private $tablename="ping";
    function add($data)
    {
        return M($this->tablename)->add($data);
    }
    function select()
    {
        return M($this->tablename)->select();
    }
}