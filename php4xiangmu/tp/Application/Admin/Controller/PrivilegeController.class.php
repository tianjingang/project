<?php
   namespace Admin\Controller;
   use Think\Controller;
   class PrivilegeController extends CommonController{
        /*
         @方法名： 添加权限
         @function  add
         @access public
         */
        public function add(){
        	$p=D("Privilege");
        	$this->data=$p->getInfo();
        	//var_dump($data);
        	$this->display();
        }
       /*
         @方法名： 添加入库
         @function  addok
         @access public
         */
        public function addok(){
        	$p=D("Privilege");
        	$p->create();
        	if($p->add()){
              $this->success('添加成功',U("lists"),2);
        	}else{
              $this->error('添加失败',U('add'),2);
        	}
        }
        /*
          *权限展示（列表）
          *@function lists
         */
       public function lists(){
          $p=D("Privilege");
          $this->data=$p->getInfo();
          $this->display('lst');
       }
       /*
         *权限删除
         *@function delete
         *说明：如果要被删除的权限有子类，那么无法被删除
        */
        public function delete(){
            $p=D("Privilege");
            $id=I('get.id');
            //以此ID作为子类的父ID，查找是否有子类
            if($p->leaf($id)){
              //有子权限，无法删除
              $this->error('有子权限，无法删除',U('lists'),2);
            }else{
               //无子权限，可以直接删除
               $p->delete($id);
            }
        }
        /*
          *修改权限
          *@function update
         */
        public function update(){
            $p=D("Privilege");
            if(IS_POST){
              //接收修改后的数据
              //修改时不能把子级权限当做父级权限，同时也不能把自己当做自己的父级
              //有两种方式
              //方式一  展示所有的权限，在修改提交时判断所选的ID是否在要修改的ID的子权限ID里面
              //要查出要修改的ID所对应的所有的子级ID
              /*
              $data=$p->getInfo($id);
              var_dump($data);exit;
              foreach ($data as $key => $v) {
                 $ids[]=$v['p_id'];
              }
              //var_dump($ids);
              if(in_array(I('post.parent_id'),$ids)||$id==I('post.parent_id')){
                $this->error('修改时不能把子级权限当做父级权限，同时也不能把自己当做自己的父级',U('lists'),2);
              }else{
                $data=I('post.');
       
                if($p->where("p_id=$id")->save($data)){
                  $this->success('修改成功',U('lists'));
                }else{
                  $this->error('修改失败',U('lists'),2);
                }
              }
             */
               $data=I('post.');
                $id=I("post.id");
                if($p->where("p_id=$id")->save($data)){
                  $this->success('修改成功',U('lists'));
                }else{
                  $this->error('修改失败',U('lists'),2);
                }

            }else{
              //接收要修改的ID，以此ID为条件查出该ID对应的信息并展示在表单中
              $id=I('get.id');
              //查出所有权限列表
              //$this->data=$p->getInfo();
              //方式二  不展示要修改的ID下面的所有的子权限
              $this->data=$p->getInfo1($id);
              //var_dump($data);exit;
              $this->row=$p->where("p_id=$id")->find();
              $this->display();
            }
        }
   } 