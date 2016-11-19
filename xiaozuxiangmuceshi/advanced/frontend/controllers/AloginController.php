<?php
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

header("content-type:text/html;charset=utf-8");
class AloginController extends Controller
{
    public $enableCsrfValidation = false;
    //后台登录页面
    public function actionLogin(){
        $request=\Yii::$app->request;
        $db=\Yii::$app->db;
        $session = Yii::$app->session;
        if($request->post()){
            $username=$request->post("username");
            $password=$request->post("password");
            $day=$request->post("day");
            $pwd=md5($password);
            $data=$db->createCommand("SELECT * FROM superadmin WHERE sname='$username'")->queryOne();
            if($data){
            //判断登录用户角色
                $arr=$db->createCommand("select * from superadmin where sname='$username'")->queryOne();
                $sid=$arr['sid'];
                $brr=$db->createCommand("select * from s_r where sid='$sid'")->queryOne();
                $r_id=$brr['r_id'];
                $crr=$db->createCommand("select * from role where r_id='$r_id'")->queryOne();
                $role=$crr['role'];
                if($role=="管理员"){
                    if($data['spwd']==$pwd){
                        if($day=="1"){
                            // $sname=setcookie('sname','$username','60*60*24*7');
                            //还没有给session设置过期时间
                            $session['sname']=$data['sname'];
                           
                            $this->redirect(array('admin/index'));
                        }else{
                            $session['sname']=$data['sname'];
                            $this->redirect(array('admin/index'));
                        }
                    }else{
                        echo "<script>alert('密码错误,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                        exit;
                    }
                }else{
                    echo "<script>alert('亲，您不是管理员没有权限,正在跳转....请稍候');location.href='?r=home/login'</script>";
                    exit;
                }

            }else{
                echo "<script>alert('用户不存在,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                exit;
            }
        }else{
            echo "请输入您的信息";
            return $this->render('login.html');
        }
    }
    //退出登录
    public function actionLoginout(){
        $session = Yii::$app->session;
/*        $session->destroy();*/
        unset($session['sname']);
        if(!$session['sname']){
            $this->redirect(array('alogin/login'));
        }

    }
    //忘记密码
    public function actionPassword(){
        $request=\Yii::$app->request;
        $db=\Yii::$app->db;
        $mail = Yii::$app->mailer->compose();
        if($request->post()){
            $pemail=$request->post("pemail");
            //echo $pemail;
            $data=$db->createCommand("SELECT * FROM superadmin WHERE semail='$pemail'")->queryOne();
            if(!$data){
                echo "<script>alert('没有此用户,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                exit;

            }
            //print_r($data);die;
            $sid=$data['sid'];
            $password=md5('123456');
            //echo $password;
            $re=$db->createCommand()->update('superadmin',['spwd'=>$password],['sid'=>$sid])->execute();
            //echo "$re";die;
            $mail->setTo("$pemail");    //接收人邮箱
            $mail->setSubject("密码找回");  //邮件标题
            $mail->setHtmlBody("我们已经为您重置密码为：123456。请您及时修改。。。"); //发送内容(可写HTML代码)
            if($mail->send()){
                echo "<script>alert('发送成功,正在跳转....请稍候');location.href='?r=alogin/login'</script>";

            }else{
                echo "<script>alert('发送失败,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
            }

        }else{

            return $this->render('login.html');
        }
    }
    //新用户注册
    public function actionZc(){
        $request=\Yii::$app->request;
        $db=\Yii::$app->db;
        if($request->post()){
            $email=$request->post("email");
            $uname=$request->post("uname");
            $upwd=$request->post("upwd");
            $upwdagain=$request->post("upwdagain");
            $register_time=date("Y-m-d H:i:s",time());
            $agree=$request->post("agree");
            $arr=$db->createCommand("SELECT * FROM superadmin WHERE sname='$uname'")->queryOne();
            if($arr){
                echo "<script>alert('用户名已存在,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                exit;
            }
            if($upwd!=$upwdagain){
                echo "<script>alert('两次密码不同,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                exit;
            }else{
                if($agree=="1"){
                    $upwda=md5($upwd);
                    $re = $db->createCommand()->insert('superadmin',['semail'=>$email,'sname'=>$uname,'spwd'=>$upwda,'register_time'=>$register_time])->execute();
                    //echo $re;die;
                    if($re){
                        //后台注册完之后赋权限
                        $superadmin=$db->createCommand("select * from superadmin order by sid desc")->queryOne();
                        // print_r($superadmin);die;
                        $sid=$superadmin['sid'];//取出刚注册者的superadmin表里sid
                        $s_r=$db->createCommand()->insert('s_r',[
                            'sid'=>$sid,
                            'r_id'=>1,
                        ])->execute();
                        if($s_r){
                            return $this->render('login.html');
                        }
                        else{
                            echo "<script>alert('赋权失败,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                        }

                    }else{
                        echo "<script>alert('注册失败,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                    }
                }else{
                    echo "<script>alert('请选择《用户协议》,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
                }
            }

        }else{
            echo "<script>alert('请输入您的信息,正在跳转....请稍候');location.href='?r=alogin/login'</script>";
        }
    }
    //用户协议
    public function actionXieyi(){
        return $this->render('xieyi.html');
    }



}