<?php
namespace Admin\Model;
use Think\Model;
class RewordController extends Controller{
protected $table='Reword';
    //添加
    function add(){
        return M($this->table)->add();
    }

}