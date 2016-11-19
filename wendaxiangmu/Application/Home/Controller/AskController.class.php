<?php
namespace Home\Controller;
use Think\Controller;
class AskController extends Controller{
    function index(){
        $arr=D('Category')->show();
        $this->assign('arr',$arr);
        $this->display('ask');
    }
    function lian(){
        $p_id = I('post.p_id');
        $arr = M('category')->where("p_id=$p_id")->select();
        if($arr){
            echo json_encode($arr);
        }else{
            echo 0;
        }


    }

   //添加问题
    function send()
    {
        $id=session('id');
        $_POST['content']=I('post.content');
       /* $content = I('post.content');*/
        $reward = I('post.gold');
        $cid = I('post.cid');
        $arr=M('category')->where("id=$cid")->find();
        $_POST['cid']=$arr['c_name'];
        $_POST['time']=date('Y-m-d H:i:s',time());
        $_POST['uid']=session('id');
        $res=D('hd_ask')->add($_POST);
        if($res){
            M('hd_user')->where("id='$id'")->setInc('exp',C('ANSWERER'));//提问问题,经验值+2
            M('hd_user')->where("id='$id'")->setDec('point', $reward);//提问问题,金币减少
            M('hd_user')->where("id='$id'")->setInc('ask',1);//提问问题,提问数+1

            $this->redirect('Index/index', '', 2, '发表中...');
        }
    }
     /*
     *  //加载更多
  function jiazaio(){
    $start=$_POST['start'];
    $re = M('ask')->where("solve=0")->limit($start,5)->select();
    if($re){
      echo json_encode($re);
    }else{
      echo 0;
    }
  }
  function jiazait(){
    $start=$_POST['start'];
    $re = M('ask')->where("reward!=0")->order("reward desc")->limit($start,5)->select();
    if($re){
      echo json_encode($re);
    }else{
      echo 0;
    }
  }

     */
    function load(){
        $arr=M('hd_ask')->select();
        $this->assign('ask',$arr);
    }

}