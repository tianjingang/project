<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
    public function index1(){
        $this->display();
    }
    public function admin_top(){
        $username  = session('username');
        $arr = D('login')->look("username='$username'");
        $photo = $arr['photo'];
        $this->assign("arr",$photo);
        $this->display('admin_top');

    }
    public function left(){
        $this->display();
    }
    public function right(){
        $this->display();
    }
    public function admintitle(){
        $this->display();
    }
    public function login(){
        $this->display();
    }
   public function out(){
       session('username',null);
       $this->success('跳转中',U('Login/login',3));
   }
//修改密码
  public function newpwd(){
      $name = session('username');
      $arr = D('login')->look("UserName='$name'");
      if(I('post.pwd1') != $arr['pwd']) die ('旧密码错误');
      if(I('post.pwd1')==I('post.pwd2')) die('新密码和旧密码不能一样');
      if(I('post.pwd2')!=I('post.pwd3')) die('新密码和确认密码不一样');
      $ar = array('pwd' => I('post.pwd3'));
      $res = D('login')->update("UserName='$name'",$ar);
      if($res){
          session(null);
          $this->redirect('Login/login','','5','密码修改成功');
      }
      else{
          $this->error('修改失败');
      }
  }
    //个人信息
    public function xinxi(){
    $username=session('username');
    $res = D('login')->look("UserName='$username'");
    $this->assign('arr',$res);
    $this->display('xinxi');
}
    //头像设置
    public function power(){
        $username  = session('username');
        $arr = D('login')->look("username='$username'");
        $photo = $arr['photo'];
        $this->assign("arr",$photo);
        $this->display('power');
    }
  //头像上传
    public function power_up(){
        $username  = session('username');
        //$id=$_POST['id'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath='./';
        $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录    // 上传文件
        $info   =   $upload->uploadOne($_FILES['photo']);
        $images['photo']=$info['savepath'].$info['savename'];
            //print_r($images);die;
      //  $image = new \Think\Image();

       // $path="/Public/Uploads/".rand(1000,999).$info['savename'];
      //  $image->open($images['photo'])->text('田金刚','./1.ttf',20,'#000000',\Think\Image::IMAGE_WATER_SOUTHEAST)->save($path);
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            $res=D('login')->update("username='$username'",$images);
            if($res){
                $this->success('头像设置成功');
            }
            else{
                $this->error('头像设置失败');
            }
        }
    }
    //电影分类添加
   public function upload(){
       $upload = new \Think\Upload();// 实例化上传类
       $upload->maxSize   =     3145728 ;// 设置附件上传大小
       $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
       $upload->rootPath='./';
       $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录    // 上传文件
       $info   =   $upload->uploadOne($_FILES['photo']);
       $_POST['photo']=$info['savepath'].$info['savename'];
       if(!$info) {
       // 上传错误提示错误信息
       $this->error($upload->getError());
       }else{
           $res=D('Video')->add($_POST);
           if($res){
               $this->success('添加成功',u('Index/photo_show',3));
           }
           else{
               $this->error('添加失败');
           }
       }
       }
    //电影分类列表
    public function photo_show(){
        $User=M('Video');
        $count=$User->count();
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $arr=$User->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);
        $this->assign('show',$show);
        $this->display('photo_show');
    }
    //电影搜索
    public function photo_sou(){
        $User=M('Video');
        $count=$User->count();
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $arr=$User->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);
        $this->assign('show',$show);
        $this->display('photo_sou');
    }

    //电影搜索
       public function search_p(){
        $search = I('get.search');
           $search1 = I('get.search1');
           $User = M('Video'); // 实例化User对象
        $count      = $User->where("v_type like '%$search%' and v_name like '%$search1%'")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where("v_type like '%$search%' and v_name like '%$search1%'")->limit($Page->firstRow.','.$Page->listRows)->select();
           //var_dump($list);die;
           foreach($list as $key=>$val){
              $list[$key]["v_type"]=str_replace($search,"<font color='red'>$search</font>",$val['v_type']);
           }
           foreach($list as $key=>$val){
               $list[$key]["v_name"]=str_replace($search1,"<font color='red'>$search1</font>",$val['v_name']);
           }
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->assign('search',$search);
           $this->assign('search1',$search1);
        $this->display('photo_sou'); // 输出模板

    }
    //电影回收站
    public function photo_res(){
        $id =0;
        $arr=D('Video')->look("statue='$id'");
        $this->assign('arr',$arr);
        $this->display('photo_res');
    }
    //电影修改状态1
    function  photo_ress(){
        $id=$_GET['id'];
        $data=array(
            'statue'=> 0,
        );
    $re=D('Video')->update("id='$id'",$data);
        if($re){
            $this->success('ok',U('Index/photo_res'));
        }
    }
    //电影修改状态2
    function  photo_resh(){
        $id=$_GET['id'];
        $data=array(
            'statue'=> 1,
        );
        $re=D('Video')->update("id='$id'",$data);
        if($re){
            $this->success('恢复成功',U('Index/photo_update'));
        }
        else{
            $this->error('恢复失败');
        }
    }
    //电影永久删除
    function photo_delete(){
        $id=$_GET['id'];
        $res=D('Video')->delete("id='$id'");
        if($res){
            $this->success('永久删除成功',U('Index/photo_res'));
        }
        else{
            $this->error('永久删除失败');
        }
    }

    //电影删除修改
    public function photo_update(){
        $User = M('Video'); // 实例化User对象
        $count      = $User->where('statue=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where('statue=1')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    //电影修改1
    public function photo_one(){
        $id=$_GET['id'];
        $arr=D('Video')->find("id='$id'");
        $this->assign('arr',$arr);
        $this->display('photo_one');
    }
    //电影修改2
    public function photo_up(){
    $id=$_POST['id'];
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath='./';
    $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录    // 上传文件
    $info   =   $upload->uploadOne($_FILES['photo']);
    $_POST['photo']=$info['savepath'].$info['savename'];
    if(!$info) {
        // 上传错误提示错误信息
        $this->error($upload->getError());
    }else{
        $res=D('Video')->update("id='$id'",$_POST);
        if($res){
            $this->success('修改成功',u('Index/photo_update',3));
        }
        else{
            $this->error('修改失败');
        }
    }
}
    //影视添加
    public function wmv_add(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     454544853145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','mp4','wmv');// 设置附件上传类型
        $upload->rootPath='./';
        $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录    // 上传文件
        $info   =   $upload->uploadOne($_FILES['w_wmv']);
        $_POST['w_wmv']=$info['savepath'].$info['savename'];
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            $res=D('Wmv')->insert($_POST);
            if($res){
                $this->success('添加成功',u('Index/w_show',3));
            }
            else{
                $this->error('添加失败');
            }
        }
    }
    //影视显示
    public function wmv_show(){
        $arr=D('Wmv')->select();
        $this->assign('arr',$arr);
        $this->display('w_show');
    }
    //影视分页
    public function wmv_fs(){
        $User=M('Wmv');
        $count=$User->count();
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $arr=$User->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);
        $this->assign('show',$show);
        $this->display('w_fs');
    }
//影视搜索
    public function search_w(){
        $search = I('get.search');
        $search1 = I('get.search1');
        $User = M('Wmv'); // 实例化User对象
        $count      = $User->where("w_man like '%$search%' and w_name like '%$search1%'")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where("w_man like '%$search%' and w_name like '%$search1%'")->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($list as $key=>$val){
            $list[$key]["w_man"]=str_replace($search,"<font color='red'>$search</font>",$val['w_man']);
        }
        foreach($list as $key=>$val){
            $list[$key]["w_name"]=str_replace($search1,"<font color='red'>$search1</font>",$val['w_name']);
        }
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->assign('search',$search);
        $this->assign('search1',$search1);
        $this->display('w_fs'); // 输出模板

    }
    //影视删除
    function del(){
        $id=$_GET['id'];
        $res=D('Wmv')->delete("id='$id'");
        $arr=D('Wmv')->look();
        $this->assign('arr',$arr);
        $this->display('Index/w_show');
    }
    //影视删除及修改
    function wmv_sx(){
        $User=M('Wmv');
        $count=$User->count();
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $arr=$User->where('statue=1')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);
        $this->assign('show',$show);
        $this->display('w_sx');
    }
    //影视放入回收站
    function wmv_fh(){
        $id=$_GET['id'];
        $data=array(
            'statue'=> 0,
        );
        $re=D('Wmv')->update("id='$id'",$data);
        if($re){
            $this->success('影视放入回收站成功',U('Index/wmv_hs'));
        }
    }
    //影视回收站
    function wmv_hs(){
        $id =0;
        $arr=D('Wmv')->look("statue='$id'");
        $this->assign('arr',$arr);
        $this->display('wmv_hs');
    }
    //影视恢复
    function  wmv_hf(){
        $id=$_GET['id'];
        $data=array(
            'statue'=> 1,
        );
        $re=D('Wmv')->update("id='$id'",$data);
        if($re){
            $this->success('恢复成功',U('Index/w_sx'));
        }
        else{
            $this->error('恢复失败');
        }
    }
    //影视永久删除
    function wmv_del(){
        $id=$_GET['id'];
        $res=D('Wmv')->delete("id='$id'");
        if($res){
            $this->success('影视永久删除成功',U('Index/wmv_hs'));
        }
        else{
            $this->error('永久删除失败');
        }
    }
    //影视修改1
    public function wmv_one(){
        $id=$_GET['id'];
        $arr=D('Wmv')->find("id='$id'");
        $this->assign('arr',$arr);
        $this->display('wmv_one');
    }
    //影视修改2
    public function wmv_up(){
        $id=$_POST['id'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     454544853145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','mp4','wmv');// 设置附件上传类型
        $upload->rootPath='./';
        $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录    // 上传文件
        $info   =   $upload->uploadOne($_FILES['w_wmv']);
        $_POST['w_wmv']=$info['savepath'].$info['savename'];
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            $res=D('Wmv')->update("id='$id'",$_POST);
            if($res){
                $this->success('影视修改成功',u('Index/w_show',3));
            }
            else{
                $this->error('影视修改失败');
            }
        }
    }
    //留言列表
    public function note(){
        $User=M('Construct');
        $count=$User->count();
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $arr=$User->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);
        $this->assign('show',$show);
        $this->display('note');
    }
    //评论查询
    public function ping_show(){
        $User=M('ping');
        $count=$User->where('statue=1')->count();
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $arr=$User->where('statue=1')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);
        $this->assign('show',$show);
        $this->display('ping_show');
    }
    //评论回复
    public function hui(){
        $User=M('hui');
        $count=$User->count();
        $Page=new \Think\Page($count,3);
        $show=$Page->show();
        $arr=$User->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('arr',$arr);
        $this->assign('show',$show);
        $this->display('hui');
    }
    //评论放入回收站
    public function ping_fh(){
        $id=$_GET['id'];
        $data=array(
            'statue'=> 0,
        );
        $re=D('ping')->update("id='$id'",$data);
        if($re){
            $this->success('评论放入回收站成功',U('Index/ping_hs'));
        }
    }

    //评论恢复
    function  ping_hf(){
        $id=$_GET['id'];
        $data=array(
            'statue'=> 1,
        );
        $re=D('ping')->update("id='$id'",$data);
        if($re){
            $this->success('评论恢复成功',U('Index/ping_show'));
        }
        else{
            $this->error('恢复失败');
        }
    } //评论回收站
    function ping_hs(){
        $id =0;
        $arr=D('ping')->select("statue='$id'");
        $this->assign('arr',$arr);
        $this->display('ping_hs');
    }
    //评论永久删除
    function ping_del(){
        $id=$_GET['id'];
        $res=D('ping')->delete("id='$id'");
        if($res){
            $this->success('评论永久删除成功',U('Index/ping_hs'));
        }
        else{
            $this->error('评论永久删除失败');
        }

    }
    //评论分页搜索
    public function ping_fs(){
        $search = I('get.search');
        $User = M('ping'); // 实例化User对象
        $count      = $User->where("ping_name like '%$search%'")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where("ping_name like '%$search%'")->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach($list as $key=>$val){
            $list[$key]["ping_name"]=str_replace($search,"<font color='red'>$search</font>",$val['ping_name']);
        }
        $this->assign('arr',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->assign('search',$search);
        $this->display('ping_fs'); // 输出模板

    }





}