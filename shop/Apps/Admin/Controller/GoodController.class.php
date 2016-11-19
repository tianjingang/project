<?php
namespace Admin\Controller;
use Think\Controller;
class GoodController extends Controller{
    //商品分类，品牌
    function good(){
        $arr=D('ecs_type')->look();
        $res = $this->digui($arr,$p_id=0,$level=0); 
        $arr1=D('ecs_brand')->looks();  
        $this->assign('arr1',$arr1);
        $this->assign('res',$res);
        $this->display();
    }
    //递归显示
    public function digui($arr,$p_id=0,$level=0)
    {
        static $data = array();
        foreach($arr as $key=>$val)
        {
            if($val['p_id']==$p_id)
            {
                $val['level'] = $level;
                $val['html'] = str_repeat('--',$level);
                $data[] = $val;
                $this->digui($arr,$val['c_id'],$level+1);
            } 
        }
        return $data;
    }
    //商品号的生成
    function dec()
    {
        $arr = M('ecs_goods')->order('g_sn desc')->find();
        $g_num=++$arr['g_sn'];
        echo $g_num;
    }

    //添加商品
    function good_add(){
       /* echo "<pre>";
        var_dump($_POST);die;*/
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath='./';
        $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录    // 上传单个文件
        $info   =   $upload->uploadone($_FILES['goods_img']);
        $_POST['goods_img']= $info['savepath'].$info['savename'];
        if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
        }else{
         //接其他值
            $g_name=I('post.g_name');
            $g_sn=I('post.g_sn');
            $c_id=I('post.c_id');
            $b_id=I('post.b_id');
            $shop_price=I('post.shop_price');
            $market_price=I('post.market_price');
            $goods_img=$_POST['goods_img'];
            $goods_number=I('post.goods_number');
            $warn_number=I('post.warn_number');
            $is_best = isset($_POST['is_best'])? $_POST['is_best'] : 0;
            $is_new = isset($_POST['is_new'])? $_POST['is_new'] : 0;
            $is_hot = isset($_POST['is_hot'])? $_POST['is_hot'] : 0;
            $is_on_sale = isset($_POST['is_on_sale'])? $_POST['is_on_sale'] : 0;
            $keywords=I('post.keywords');
            $goods_brief=I('post.goods_brief');
            //echo $is_best;die;
            //把接到的值放到数组里
            $data=array(
                "g_name"=>$g_name,
                "g_sn"=>$g_sn,
                "c_id"=>$c_id,
                "b_id"=>$b_id,
                "shop_price"=>$shop_price,
                "market_price"=>$market_price,
                "goods_img"=>$goods_img,
                "goods_number"=>$goods_number,
                "warn_number"=>$warn_number,
                "is_best"=>$is_best,
                "is_new"=>$is_new,
                "is_hot"=>$is_hot,
                "is_on_sale"=>$is_on_sale,
                "keywords"=>$keywords,
                "goods_brief"=>$goods_brief,
            );
            //通过商品名称查看单条数据
            $g_name=I('post.g_name');
            $res1=D('ecs_good')->select_all(array('g_name'=>$g_name));
            if($res1){
                $this->success('商品名称已存在，请换别的商品名',U('Goods/good'));
                die;
            }
            $g_sn=I('post.g_sn');
            $res2=D('ecs_good')->sel_single(array('g_sn'=>$g_sn));
            if($res2){
                $this->success('商品货号已存在，请换别的商品货号',U('Goods/good'));
                die;
            }
            $res=D('ecs_good')->add($data);
            if($res){
                $this->success('添加成功',U('Good/good_list'));
            }
            else{
                $this->error('添加失败');
            }

        }
    }
    //商品列表
    function good_list()
    {
        $search=I('get.search');
        $User = M('ecs_good'); // 实例化User对象
        $count      = $User->where("g_name like '%$search%'")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where("g_name like '%$search%'")/*->order('create_time')*/->select();
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
       /* $arr=D('ecs_good')->select();
        $this->assign('arr',$arr);
        $this->display();*/
  /*       $arr1=D('ecs_type')->look();
        // var_dump($arr1);die;
         $rs = $this->digui($arr1,$p_id=0,$level=0);
         //var_dump( $rs);die;
         $arr1=M('ecs_brand')->select();
       // $arr=M('ecs_good')->where(array('g_statue'=>0))->select();
       // var_dump($arr);die;
         $this->assign('rs',$rs);
        // $this->rs=$rs;
       $this->assign('ar',$arr1);
       //  $this->assign('arr',$arr);
        //设置当前页码
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        //获取总条数
        $count = M('ecs_good')->count();
        //设置每页显示的条数
        $page_size = 2;
        //设置总页数
        $total = ceil($count / $page_size);
        //偏移量
        $limit = ($page - 1) * $page_size;
        //查询数据
        $arr = M('ecs_good')->limit($limit, $page_size)->select();
        if (IS_AJAX) {
            echo json_encode($arr);
        } else {
            $this->assign('total', $total);
            $this->assign('arr', $arr);
            $this->display();
        }*/
        //$this->display();
    }
   //修改上架状态1
    function up_sale(){
       //echo 123;
        $id=$_GET['id'];
       // echo $id;die;
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_on_sale'=>0));
        $this->redirect('Goods/good_list');

    }
    //修改上架状态2
    function up_sale1(){
        $id=$_GET['id'];
       // echo $id;die;
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_on_sale'=>1));
        $this->redirect('Goods/good_list');

    }
    //修改精品状态1
    function up_best(){
        //echo 123;
        $id=$_GET['id'];
        // echo $id;die;
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_best'=>0));
        $this->redirect('Goods/good_list');

    }
    //修改精品状态2
    function up_best1(){
        $id=$_GET['id'];
        // echo $id;die;
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_best'=>1));
        $this->redirect('Goods/good_list');

    }
    //修改新品状态1
    function up_new(){
        $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_new'=>0));
        $this->redirect('Goods/good_list');

    }
    //修改新品状态2
    function up_new1(){
        $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_new'=>1));
        $this->redirect('Goods/good_list');

    }
    //修改热品状态1
    function up_hot(){
        $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_hot'=>0));
        $this->redirect('Goods/good_list');

    }
    //修改热品状态2
    function up_hot1(){
        $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('is_hot'=>1));
        $this->redirect('Goods/good_list');

    }
    //即点即该商品名称
    public function upgoodsname()
    {
        $id=$_POST['id'];
        $g_name=$_POST['g_name'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('g_name'=>$g_name));
        if($res){
           echo 1;
        }
        else{
            echo 2;
        }
    }
    //即点即该商品货号
    public function upgoodssn()
    {
        $id=$_POST['id'];
        $g_sn=$_POST['g_sn'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('g_sn'=>$g_sn));
        if($res){
           echo 1;
        }
        else{
            echo 2;
        }
    }
    //即点即改商品价格
    public function upgoodprice(){
        $id=$_POST['id'];
        $shop_price=$_POST['shop_price'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('shop_price'=>$shop_price));
        if($res){
             echo "1";
        }
        else{
            echo "2";
        }
    }
    //即点即改商品库存
    public function upgoodnum(){
        $id=$_POST['id'];
        $goods_number=$_POST['goods_number'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('goods_number'=>$goods_number));
        if($res){
             echo "1";
        }
        else{
            echo "2";
        }
    }
    //查看单条数据
    function good_one(){
        $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->select();
        $this->assign('re',$res);
        $this->display();
    }
    //放入回收站1，把状态0修改为1
    function up_statue1(){
        $id=$_GET['id'];
       // echo $id;die;
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('g_statue'=>1));
        $this->redirect('Goods/resource');
    }
    //回收站列表
    function resource(){
       // $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_statue'=>1))->select();
        $this->assign('resource',$res);
        $this->display();
    }
    //回收站里恢复到列表里
    function hui(){
        $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->save(array('g_statue'=>0));
        $this->redirect('Goods/good_list');
    }
    //回收站里彻底删除
   /* function del(){
        $id=$_GET['id'];
        $res=M('ecs_good')->where(array('g_id'=>$id))->delete();
        $this->redirect('Goods/resource');
    }*/

}