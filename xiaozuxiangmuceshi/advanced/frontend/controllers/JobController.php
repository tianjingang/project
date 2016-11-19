<?php
/**
 * 后台职位页面
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
use yii\data\Pagination;
use frontend\models\Position;

class JobController extends Controller
{
    /**
     * 非法登录
     * @param [type] $id     [description]
     * @param [type] $models [description]
     */
  /*  public function __construct($id,$models=null)
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
    public function actionJobname(){
          return $this->render('elements.html');
    }
    public function actionPay(){
          return $this->render('buttons.html');
    }
    public function actionJobobj(){
          return $this->render('treeview.html');
    }
    public function actionPosition(){
        $query = Position::find();
        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);
        $arr = $query->orderBy('p_salarymin')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('position', [
            'arr' => $arr,
            'pagination' => $pagination,
        ]);
         // return $this->render('position.php');
    }
}
