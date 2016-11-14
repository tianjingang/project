<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function videos(){
        //echo 123;die;
        $arr= D('Wmv')->show(array('statue'=>1));
        $this->assign('arr',$arr);
        $this->display();
    }
    public function single(){
        $id=$_GET['id'];
        //查找加收id的电影
        $arr=D('Wmv')->find("id='$id'");
        //查找该电影评论
        $name=$arr['w_name'];
        $arr1=D('ping')->select("ping_name='$name'");
        $this->assign('arr1',$arr1);
        $this->assign('arr',$arr);
        $this->display();
    }
    public function hehe(){
        $id = I('get.id');
        $arr=D('Wmv')->find("id='$id'");
        $this->assign('v',$arr);
        $this->display();
    }
    public function contact(){
        $this->display();
    }
    public function reviews(){
        $arr=D('Wmv')->show();
        $this->assign('arr',$arr);
        $this->display();
    }
    //评论提交
    function ping_add()
    {
        $_POST['ping_time']=date('Y-m-d h:i:s');
        $res=D('ping')->add($_POST);
        if($res)
        {
            $this->success("评论成功",U('Index/single'));
        }
        else
        {
            $this->error("评论失败");
        }

    }
    //回复提交
    function hui_add()
    {
        $data = I("get.");
        $data['hui_nei'] = I('get.r_talk');
        $data['hui_time']=date('Y_m_d h:i:s');

        $res=D('hui')->add($data);

        if($res)
        {
            $this->success("评论成功",U('Index/single1'));
        }
        else
        {
            $this->error("评论失败");
        }

    }
    //留言入库
    function m_add(){
        $res=D('Construct')->insert($_POST);
        if($res){
            $this->success('留言已入库');
        }
        else{
            $this->error('留言失败');
        }
    }
}