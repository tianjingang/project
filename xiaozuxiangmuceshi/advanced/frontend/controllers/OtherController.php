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
class OtherController extends Controller
{
    /**
     * 非法登录
     * @param [type] $id     [description]
     * @param [type] $models [description]
     */
    public function __construct($id,$models=null)
    {
        parent::__construct($id, $models);
        $session = Yii::$app->session;
        //echo $session['sname'];die;
        if (!$session['username']) {
            echo "非法登录";
            $this->redirect(array('/alogin/login'));

        }
    }
        //后台主页
        public function actionHelp(){
        return $this->render('help.html');
    }

    }