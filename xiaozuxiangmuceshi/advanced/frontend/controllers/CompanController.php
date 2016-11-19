<?php
/**
 * 后台公司页面
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
use frontend\models\Detail;
use frontend\models\Position;
use frontend\models\Resume;

class CompanController extends Controller
{
	/**
     * 非法登录
     * @param [type] $id     [description]
     * @param [type] $models [description]
     */
    //构造函数
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
    //公司简介
    public function actionContent(){
        $query = Detail::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $arr = $query->orderBy('c_size')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('tables', [
            'arr' => $arr,
            'pagination' => $pagination,
        ]);
         // return $this->render('tables.php');
    }
    //招聘信息统计
    public function actionCount(){
        $query = Position::find();
        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);
        $arr = $query->orderBy('p_salarymin')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('jqgrid', [
            'arr' => $arr,
            'pagination' => $pagination,
        ]);
    }
    public function actionExample(){
        $query = Resume::find();
        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);
        $arr = $query->orderBy('education')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('resume', [
            'arr' => $arr,
            'pagination' => $pagination,
        ]);
    }
    //下载
    public function actionUpload(){
        $r_id=$_GET['id'];
       // echo $r_id;die;
        $db=\Yii::$app->db;
        $arr=$db->createCommand("select * from resume where r_id='$r_id'")->queryOne();
        print_r($arr);die;
       /* header("Content-type:applicationnd.ms-doc");
        header("Content-Disposition:attachment;filename=".$arr.".doc");
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">
        <head>*/
    }
    
}
