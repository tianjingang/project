<?php
namespace frontend\controllers;
use app\models\Upload;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Session;
class CreateController extends Controller{
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
    //公司列表
    public function actionCompanylist(){
        return $this->render('companylist');
    }
    //我的简历页面
    public function actionResume(){
        return $this->render('resume');
    }
    //发布职位页面
    public function actionCreate(){
        //发布职位前判断有没有登陆
        $session=\Yii::$app->session;
        if(isset($session['username'])){
            //判断当前登录者的角色是不是招聘者，如果不是则提示没有权限发布职位
            $db=\Yii::$app->db;
            $sname=$session['username'];
            $arr=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
            $sid=$arr['sid'];
            $brr=$db->createCommand("select * from s_r where sid='$sid'")->queryOne();
            $r_id=$brr['r_id'];
            $crr=$db->createCommand("select * from role where r_id='$r_id'")->queryOne();
            $role=$crr['role'];
            if($role=="招聘者"){
                //如果是招聘者的话,再进一步审核招聘者的信息是否完整，如果不完整则提示招聘者去完善并跳转到完善页面
                $db=\Yii::$app->db;
                $sname=$session['username'];
                $ar=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
                $semail=$ar['semail'];
                $br=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
                $com=$br['com'];
                $cr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
                foreach($cr as $k=>$v)
                {
                    if($cr[$k]=="")
                    {
                        echo "<script>alert('亲,您注册的公司信息需完善后可再操作,正在跳转....请稍后');location.href='?r=company/index01'</script>";
                        exit;
                    }

                }
                return $this->render('create');
            }
            else{
                echo "<script>alert('亲,您是应聘者,没有权限发布职位,正在跳转....请稍后');location.href='?r=home/login'</script>";
                exit;
            }
            return $this->render('create');
        }
        else{
            echo "<script>alert('亲,请先去登录,正在跳转....请稍候');location.href='?r=home/log'</script>";
            exit;

        }

    }
    //发布职位入库
    public function insert(){
        $db=\Yii::$app->db;
        $session=\Yii::$app->session;
        $request = \Yii::$app->request;
        $sname=$session['username'];
        $arr=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
        $semail=$arr['semail'];
        $brr=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
        $com=$brr['com'];
        $crr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
        $c_id=$crr['c_id'];
        if($request->post()){
            $data= $request->post();
            // print_r($data);die;
            $time= date('Y-m-d H:i:s',time()+8*3600);
            //echo $time;die;
            $db->createCommand()->insert('position', [
                'p_positiontype' => $data['positionType'],
                'p_positionname' =>$data['positionName'],
                'p_salarymax' =>$data['salaryMin'],
                'p_salarymin' => $data['salaryMax'],
                'p_work'=>$data['work'],
                'p_workyear' =>$data['workYear'],
                'p_education' =>$data['education'],
                'p_positionadvantage' =>$data['positionAdvantage'],
                'p_positionaddress' =>$data['positionAddress'],
                'p_email'=>$data['email'],
                'p_time'=>$time,
            ])->execute();

        }
    }
    //发布职位入库
    public function actionCre(){
        $db=\Yii::$app->db;
        $session=\Yii::$app->session;
        $request = \Yii::$app->request;
        $sname=$session['username'];
        $arr=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
        $semail=$arr['semail'];
        $brr=$db->createCommand("select * from company where company_email='$semail'")->queryOne();
        $com=$brr['com'];
        $crr=$db->createCommand("select * from detail where c_name='$com'")->queryOne();
        $c_id=$crr['c_id'];
        // echo $c_id;die;
        if($request->post()){
            $data= $request->post();
            // print_r($data);die;
            $time= date('Y-m-d H:i:s',time()+8*3600);
            //echo $time;die;
           $res= $db->createCommand()->insert('position', [
               'c_id'=> $c_id,
                'p_positiontype' => $data['positionType'],
                'p_positionname' =>$data['positionName'],
                'p_salarymax' =>$data['salaryMin'],
                'p_salarymin' => $data['salaryMax'],
                'p_work'=>$data['work'],
                'p_workyear' =>$data['workYear'],
                'p_education' =>$data['education'],
                'p_positionadvantage' =>$data['positionAdvantage'],
                'p_positionaddress' =>$data['positionAddress'],
                'p_email'=>$data['email'],
                'p_time'=>$time,
            ])->execute();
            if($res){
                echo "<script>alert('亲添加成功,正在跳转');location.href='?r=home/login'</script>";
                exit;
            }
            else{
                echo "<script>alert('亲添加失败,正在跳转....请重新添加');location.href='?r=create/create'</script>";
                exit;
            }

        }

    }


}
?>