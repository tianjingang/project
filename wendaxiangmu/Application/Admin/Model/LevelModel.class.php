<?php
namespace Admin\Model;
use Think\Model;
class RewordController extends Controller{
    protected $table='Level';
    //添加
    function add(){
        return M($this->table)->add();
    }

}