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
class AdminController extends Controller
{
   /* public function __construct($id,$models=null)
    {
        parent::__construct($id, $models);
        $session = Yii::$app->session;
        //echo $session['sname'];die;
        if (!$session['sname']) {
            echo "非法登录";
            $this->redirect(array('/alogin/login'));

        }
    }*/
        //后台主页
        public function actionIndex(){
        return $this->render('index.html');
    }
    //展示职位
    public function actionLists(){
        $data=$this->listss();
        return $this->render('job',['arr'=>$data]);
    }
    //查询职位
    function listss(){
        $db=\Yii::$app->db;
        $command = $db->createCommand("select * from   `position` ")->queryAll();
        return $command;
    }




    }



