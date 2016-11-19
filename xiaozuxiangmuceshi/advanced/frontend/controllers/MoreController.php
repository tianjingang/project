<?php
/**
 * 后台更多页面
 */
namespace app\controllers;
namespace frontend\controllers;
use app\models\Upload;
use yii\web\Controller;
use yii\web\UploadedFile;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;

class MoreController extends Controller
{
	/**
     * 非法登录
     * @param [type] $id     [description]
     * @param [type] $models [description]
     */
   /* public function __construct($id,$models=null)
    {
          parent::__construct($id,$models);
          $session = Yii::$app->session;
          //echo $session['sname'];die;
          if(!$session['username'])
          {
              echo "非法登录";
              $this->redirect(array('/alogin/login'));
              
          }
    }*/
    /**
     * 修改密码
     * @return [type] [description]
     */
    public function actionUppwd(){
          $request=\Yii::$app->request;
          $session = Yii::$app->session;
          $db=\Yii::$app->db;
          if($request->post()){
                 $sid=$request->post("sid");
                 $oldpwd=$request->post("oldpwd");
                 $data=$db->createCommand("SELECT * FROM superadmin WHERE sid='$sid'")->queryOne();
                 if(md5($oldpwd)!=$data['spwd']){
                     echo "<script>alert('原密码不正确,正在跳转....请稍候');location.href='?r=more/uppwd'</script>";
                     exit;
                 }else{
                      $newpwd=$request->post("newpwd");
                      $newpwdagain=$request->post("newpwdagain");
                      if($newpwd==""){
                          echo "<script>alert('新密码不能为空,正在跳转....请稍候');location.href='?r=more/uppwd'</script>";
                          exit;
                      }
                      if($newpwd!=$newpwdagain){
                          echo "<script>alert('两次密码输入不同,正在跳转....请稍候');location.href='?r=more/uppwd'</script>";
                          exit;

                      }else{
                           $up=md5($newpwd);
                           $re=$db->createCommand()->update('superadmin',['spwd'=>$up],['sid'=>$sid])->execute();
                           //echo $re;die;
                           if($re){
                                $this->redirect(array('admin/index'));
                           }else{
                                $this->redirect(array('admin/index'));
                          }
                      }
                 }
          }else{
                $sname=$session['sname'];
                $data=$db->createCommand("SELECT * FROM superadmin WHERE sname='$sname'")->queryOne();
                //print_r($data);die;
                return $this->render('uppwd.html',['data'=>$data]);
          }
          
    }
    /**
     * 上传头像
     * @return [type] [description]
     */
    public function actionUpload(){
          $request=\Yii::$app->request;
          $session = Yii::$app->session;
          $db=\Yii::$app->db;
          if($request->post()){
                  $sid=$request->post("sid");
                  $upload=new UploadedFile(); //实例化上传类
                  $name=$upload->getInstanceByName('myfile'); //获取文件原名称
                  $img=$_FILES['myfile']; //获取上传文件参数
                  $upload->tempName=$img['tmp_name']; //设置上传的文件的临时名称
                  $img_path='../uploads/'.$name; //设置上传文件的路径名称(这里的数据进行入库)
                  $arr=$upload->saveAs($img_path); //保存文件
                  $re=$db->createCommand()->update('superadmin',['photo'=>$img_path],['sid'=>$sid])->execute();
                  //echo $re;die;
                  if($re){
                        $this->redirect(array('admin/index'));
                   }else{
                        $this->redirect(array('admin/index'));
                  }
           }else{
                  $sname=$session['sname'];
                  $data=$db->createCommand("SELECT * FROM superadmin WHERE sname='$sname'")->queryOne();
                  //print_r($data);die;
                  return $this->render('upload.html',['data'=>$data]);
           }
          
    }
    public function actionMe(){
          $request=\Yii::$app->request;
          $session = Yii::$app->session;
          $db=\Yii::$app->db;
          $sname=$session['sname'];
          $data=$db->createCommand("SELECT * FROM superadmin WHERE sname='$sname'")->queryOne();
          //print_r($data);die;
          return $this->render('me.html',['data'=>$data]);
    }
    
}
