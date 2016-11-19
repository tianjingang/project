<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
  public function index(){
      $db=M('category');
      $cate=$db->where(array('p_id'=>0))->select();
      foreach($cate as $k=>$v){
          $cate[$k]['child']=$db->where(array('p_id'=>$v['id']))->select();
      }
      $this->assign('cate',$cate);
      $start=I('post.start');
      echo $start;
      $arr=M('hd_ask')->limit(5)->select();
      $this->assign('ask',$arr);
      $this->display();
  }
    //验证码
    public function verify(){
        ob_clean();
        $Verify =     new \Think\Verify();
        // 设置验证码字符为纯数字
        //$Verify->length   ='4';
        $Verify->fontttf = '5.ttf';
        $Verify->entry();
    }
    function lists()
    {
        $arr = M('Category')->select();
        $this->assign('arr', $arr);
        $this->display();

    }
    function question(){
        $start=I('post.start');
        //echo $start;die;
        $arrr=M('hd_ask')->limit($start,5)->where("solve=0")->select();
        if($arrr){
            echo json_encode($arrr);
         //echo   var_dump($arrr);
        }else{
            echo 0;
        }

    }

}