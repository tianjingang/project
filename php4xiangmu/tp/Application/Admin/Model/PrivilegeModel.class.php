<?php
  namespace Admin\Model;
  use Think\Model;
  class PrivilegeModel extends Model{
  	 //查询出所有数据
  	 public function getInfo(){
  	 	$data=$this->select();
  	 	return $this->noLimitCate($data,$parent_id=0,$level=0);
  	 }
  	 /*
  	  @方法名 无限级分类
  	  @function noLimitCate
  	  @param1 array $data
  	  @param2 int   $parent_id=0
  	  @param3 int   $level=0
      @return  $lists
  	  */
  	 public function noLimitCate($data,$parent_id=0,$level=0){
  	 	static $lists=array();
  	 	foreach ($data as $key => $v) {
  	 		if($v['parent_id']==$parent_id){
  	 			$v['level']=$level;
  	 			$lists[]=$v;
  	 			$this->noLimitCate($data,$v['p_id'],$level+1);
  	 		}
  	 	}
  	 	return $lists;
  	 }
    
    //查询出不包含要修改的子类的信息
     public function getInfo1($id){
      $data=$this->where("parent_id!=$id and p_id!=$id")->select();
      return $this->noLimitCate2($data,$parent_id=0,$level=0);
     }
     /*
      @方法名 无限级分类
      @function noLimitCate
      @param1 array $data
      @param2 int   $parent_id=0
      @param3 int   $level=0
      @return  $lists
      */
     public function noLimitCate2($data,$parent_id=0,$level=0){
      static $lists=array();
      foreach ($data as $key => $v) {
        if($v['parent_id']==$parent_id){
          $v['level']=$level;
          $lists[]=$v;
          $this->noLimitCate2($data,$v['p_id'],$level+1);
        }
      }
      return $lists;
     }
    





     /*
       *获取子类
      */
     public function leaf($id){
        return $this->where("parent_=$id")->select();
     }

    //查询出所有数据
     public function getChild($id){
      $data=$this->select();
      return $this->noLimitCate1($data,$id,$level=0);
     }
     /*
      @方法名 无限级分类
      @function noLimitCate
      @param1 array $data
      @param2 int   $parent_id=0
      @param3 int   $level=0
      @return  $lists
      */
     public function noLimitCate1($data,$id,$level=0){
      static $lists=array();
      foreach ($data as $key => $v) {
        if($v['parent_id']==$id){
          $v['level']=$level;
          $lists[]=$v;
          $this->noLimitCate1($data,$v['p_id'],$level+1);
        }
      }
      return $lists;
     }




  }