<?php
namespace frontend\controllers;
use app\models\Upload;
use yii\web\Controller;
use frontend\models\Detail;
use yii\web\UploadedFile;
class CompanyController extends Controller{
    public  $enableCsrfValidation=false;
    //前台首页
    public function actionLogin(){
        return $this->render('index');
    }
    //前台注册
    public function actionRegister(){
        return $this->render('register');
    }
    //前台登录
    public function actionLog(){
        return $this->render('log');
    }
    //公司列表页面
    public function actionCompanylist(){
        return $this->render('companylist');
    }
    //我的简历页面
    public function actionResume(){
        return $this->render('resume');
    }
    //注册公司页面
    public function actionIndex01(){
        return $this->render('index01');
    }
    //添加公司基本信息
    public function actionAddcompany(){
         //接图片
        $request=\Yii::$app->request;
        $upload=new UploadedFile(); //实例化上传类
        $name=$upload->getInstanceByName('c_logo'); //获取文件原名称
        $img=$_FILES['c_logo']; //获取上传文件参数
        $upload->tempName=$img['tmp_name']; //设置上传的文件的临时名称
        $img_path='../uploads/'.$name; //设置上传文件的路径名称(这里的数据进行入库)
        $arr=$upload->saveAs($img_path); //保存文件
        $data=$request->post();
        $data['c_logo']=$img_path;
        //接其他值
        $c_name=$_POST['c_name'];
        $c_nameshort=$_POST['c_nameshort'];
        $c_logo=$data['c_logo'];
        $c_http=$_POST['c_http'];
        $c_city=$_POST['c_city'];
        $c_field=$_POST['c_field'];
        $c_size=$_POST['c_size'];
        $c_stage=$_POST['c_stage'];
        $c_organiz=$_POST['c_organiz'];
        $c_introduce=$_POST['c_introduce'];
        $detail=Detail::find()->where(['c_name'=>$c_name])->one();
        $detail->c_nameshort="$c_nameshort";
        $detail->c_logo="$c_logo";
        $detail->c_http="$c_http";
        $detail->c_city="$c_city";
        $detail->c_field="$c_field";
        $detail->c_size="$c_size";
        $detail->c_stage="$c_stage";
        $detail->c_organiz="$c_organiz";
        $detail->c_introduce="$c_introduce";
        if($detail->save()){
            return $this->redirect(array('company/tag'));
        }
        else{
            echo "<script>alert('亲,基本信息入库失败,正在跳转....请稍后');location.href='?r=company/index01'</script>";
            exit;
        }


    }
    //公司标签页面
    public function actionTag(){
        return $this->render('tag');
    }
    //添加公司标签
    public function actionAddtag(){
        $db=\Yii::$app->db;
        $session=\Yii::$app->session;
        $sname=$session['username'];
        $ar=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
        $semail=$ar['semail'];
        $br=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
        $com=$br['com'];
        $cr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
        $c_name=$cr['c_name'];
        //接值
        $u_defined1=$_POST['u_defined1'];
        $u_defined2=$_POST['u_defined2'];
        $u_defined3=$_POST['u_defined3'];
        $u_defined4=$_POST['u_defined4'];
        $arr=array($u_defined1,$u_defined2,$u_defined3,$u_defined4);
        $user_defined=implode(',',$arr);
        $detail=Detail::find()->where(['c_name'=>$c_name])->one();
        $detail->user_defined="$user_defined";
        if($detail->save()){
            return $this->redirect(array('company/founder'));
        }
        else{
            echo "<script>alert('亲,公司标签入库失败,正在跳转....请稍后');location.href='?r=company/tag'</script>";
            exit;
        }

    }
    //创始团队
    public function actionFounder(){
        return $this->render('founder');
    }
    //添加创始团队
    public function actionAddfounder(){
        $db=\Yii::$app->db;
        $session=\Yii::$app->session;
        $sname=$session['username'];
        $ar=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
        $semail=$ar['semail'];
        $br=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
        $com=$br['com'];
        $cr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
        $c_name=$cr['c_name'];
        //接值
        $founder=$_POST['founder'];
        $present_position=$_POST['present_position'];
        $sina_weibo=$_POST['sina_weibo'];
        $founder_introduce=$_POST['founder_introduce'];
        $detail=Detail::find()->where(['c_name'=>$c_name])->one();
        $detail->founder="$founder";
        $detail->present_position="$present_position";
        $detail->sina_weibo="$sina_weibo";
        $detail->founder_introduce="$founder_introduce";
        if($detail->save()){
            return $this->redirect(array('company/index02'));
        }
        else{
            echo "<script>alert('亲,创始团队入库失败,正在跳转....请稍后');location.href='?r=company/founder'</script>";
            exit;
        }

    }
    //公司产品页面
    public function actionIndex02(){
        return $this->render('index02');
    }
    //添加产品
    public function actionAddproduct(){
        $db=\Yii::$app->db;
        $session=\Yii::$app->session;
        $sname=$session['username'];
        $ar=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
        $semail=$ar['semail'];
        $br=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
        $com=$br['com'];
        $cr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
        $c_name=$cr['c_name'];
        //接图片
        $request=\Yii::$app->request;
        $upload=new UploadedFile(); //实例化上传类
        $name=$upload->getInstanceByName('c_product'); //获取文件原名称
        $img=$_FILES['c_product']; //获取上传文件参数
        $upload->tempName=$img['tmp_name']; //设置上传的文件的临时名称
        $img_path='../uploads/'.$name; //设置上传文件的路径名称(这里的数据进行入库)
        $arr=$upload->saveAs($img_path); //保存文件
        $data=$request->post();
        $data['c_product']=$img_path;
        //接其他值
        $c_product= $data['c_product'];
        $c_productname=$_POST['c_productname'];
        $c_producturl=$_POST['c_producturl'];
        $c_productself=$_POST['c_productself'];
        $detail=Detail::find()->where(['c_name'=>$c_name])->one();
        $detail->c_product="$c_product";
        $detail->c_productname="$c_productname";
        $detail->c_producturl="$c_producturl";
        $detail->c_productself="$c_productself";
        if($detail->save()){
            return $this->redirect(array('company/index03'));
        }
        else{
            echo "<script>alert('亲,公司产品入库失败,正在跳转....请稍后');location.href='?r=company/index02'</script>";
            exit;
        }
    }
    //公司介绍
    public function actionIndex03(){
        return $this->render('index03');
    }
    //添加公司介绍
    public function actionAddself(){
        $db=\Yii::$app->db;
        $session=\Yii::$app->session;
        $sname=$session['username'];
        $ar=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
        $semail=$ar['semail'];
        $br=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
        $com=$br['com'];
        $cr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
        $c_name=$cr['c_name'];
       //接值
        $c_companyself=$_POST['c_companyself'];
        $detail=Detail::find()->where(['c_name'=>$c_name])->one();
        $detail->c_companyself="$c_companyself";
        if($detail->save()){

            $this->redirect(array('home/login'));
        }
        else{
            echo "<script>alert('亲,公司介绍入库失败,正在跳转....请稍后');location.href='?r=company/index03'</script>";
            exit;
        }
    }
    //发布职位页面
    public function actionCreate(){
        return $this->render('create');
    }


}
?>