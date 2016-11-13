<?php
/**
 * @brief 系统模块
 * @class System
 * @note  后台
 */
class Ticket extends IController
{
    public $checkRight = array('check' => 'all', 'uncheck' => array('default', 'admin_repwd', 'admin_repwd_act', 'navigation', 'navigation_update', 'navigation_del', 'navigation_edit', 'navigation_recycle', 'navigation_recycle_del', 'navigation_recycle_restore'));
    public $layout = 'admin';
    public function init()
    {
        IInterceptor::reg('CheckRights@onCreateAction');
    }
    public function add_movie(){
        $this->redirect('add_movie');
    }
    public function movie_save(){
       // $video_name=$_POST['video_name'];
        $video=$_FILES['video'];//接值
        //$price=$_POST['price'];
        if(!empty($video)){//判断非空
            //限制文件格式
            if(!($video['type']=='video/mp4')){//判断类型
                echo "格式不正确";die;
            }
            $filename=time().rand(1000,9999).substr($video['name'],strrpos($video['name'],'.')); //拼接文件名
            $path='./video/'.$filename; //路径
            move_uploaded_file($video['tmp_name'],$path);//转移文件
            $_POST['video']=$path; //存入$_post
        }
       /* $data=array(
            "video_name"=>$video_name,
            "video"=>$video,
            "price"=>$price
        );*/
        $videoObj=new IModel('video');
        $videoObj->setData($_POST);
        $videoObj->add();
        $this->add_movie();

    }
}
?>