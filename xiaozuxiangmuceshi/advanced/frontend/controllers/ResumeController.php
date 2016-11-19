<?php
namespace frontend\controllers;
use app\models\Upload;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\session;
class ResumeController extends Controller{
    public  $enableCsrfValidation=false;
  //我的简历页面
    public function actionResume(){
        //投放简历前判断有没有登录
        $session=\Yii::$app->session;
        if(isset($session['username'])){
        //判断当前登录者的角色是不是应聘者，如果不是则提示没有权限投放简历
            $db=\Yii::$app->db;
            $sname=$session['username'];
            $arr=$db->createCommand("select * from superadmin where sname='$sname'")->queryOne();
            $sid=$arr['sid'];
            $brr=$db->createCommand("select * from s_r where sid='$sid'")->queryOne();
            $r_id=$brr['r_id'];
            $crr=$db->createCommand("select * from role where r_id='$r_id'")->queryOne();
            $role=$crr['role'];
            if($role=="应聘者"){
                return $this->render('resume.html');
            }
            else{
                echo "<script>alert('亲,您是招聘者,没有权限发布简历,正在跳转....请稍后');location.href='?r=home/login'</script>";
                exit;

            }
        }
        else{
            echo "<script>alert('亲,请先去登录,正在跳转....请稍候');location.href='?r=home/log'</script>";
            exit;

        }

    }
    //发布简历页面
    public function actionCreate(){
        return $this->render('create');
    }
    /**
     * 基本信息保存
     * @return [type] [description]
     */
    function actionInfo(){
        $request = \Yii::$app->request;
        $db=\Yii::$app->db;
        $r_name=$request->post('r_name');
        $sex=$request->post('sex');
        $education=$request->post('education');
        $work_ed=$request->post('work_ed');
        $telephone=$request->post('telephone');
        $email=$request->post('email');
        $present_statue=$request->post('present_statue');
        $like_city=$request->post('like_city');
        $like_position=$request->post('like_position');
        $like_salary=$request->post('like_salary');
        $company_name=$request->post('company_name');
        $company_position=$request->post('company_position');
        $work_time=$request->post('work_time');
        $education_experance=$request->post('education_experance');
        $introdece=$request->post('introdece');
        $data=array(
            "r_name"=>$r_name,
            "sex"=>$sex,
            "education"=>$education,
            "work_ed"=>$work_ed,
            "telephone"=>$telephone,
            "email"=>$email,
            "present_statue"=>$present_statue,
            "like_city"=>$like_city,
            "like_position"=>$like_position,
            "like_salary"=>$like_salary,
            "company_name"=>$company_name,
            "company_position"=>$company_position,
            "work_time"=>$work_time,
            "education_experance"=>$education_experance,
            "introdece"=>$introdece,
        );
        $res=$db->createCommand()->insert("resume",$data)->execute();
        if($res){
            echo "<script>alert('发布成功,正在跳转!');location.href='?r=home/login'</script>";
            exit;
        }
        else{
            echo "<script>alert('发布失败,请重新发布!');location.href='?r=resume/resume'</script>";
            exit;
        }

    }
    //下载预览
    public function actionUpload(){
      /*  header("Content-type:applicationnd.ms-doc");
        header("Content-Disposition:attachment;filename=".$docName.".doc");

        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">
        <head>*/


    }
    /**
     * 投递箱
     * @return [type] [description]
     */
    function actionMy_resume_box(){
        $request = yii::$app->request;
        $db = new \yii\db\Query();
        $dbs = Yii::$app->db;
        $session = Yii::$app->session;

        //获取用户ID
        $user_id=$session['user_info']['id'];

        //获取用户new_id
        $new_id=$session['new_id'];


        /**
         * 全部简历
         */
        $user_resume1=(new \yii\db\Query())->select("pos_id,res_id")->from('lashou_post_comp')->where(["user_id"=>$user_id])->all();//查询职位ID
        $pos_id1 = array_column($user_resume1,'pos_id');//提取pos_id

        $a1 = implode(",",$pos_id1);//当前用户投递成功简历id
        $array1 = $dbs->createCommand("SELECT p.pos_id,p.cat_id,p.com_id,p.name,p.month_scoge,c.com_address,c.com_name FROM lashou_post AS p join lashou_comp AS c ON p.pos_id=c.com_id WHERE p.pos_id IN($a1)")->queryAll();

        /**
         * 投递成功简历
         */
        $user_resume2=(new \yii\db\Query())->select("pos_id,res_id")->from('lashou_post_comp')->where(["user_id"=>$user_id,"state"=>1])->all();//查询职位ID
        $pos_id2 = array_column($user_resume2,'pos_id');//提取pos_id

        $a2 = implode(",",$pos_id2);//当前用户投递成功简历id
        $array2 = $dbs->createCommand("SELECT p.pos_id,p.cat_id,p.com_id,p.name,p.month_scoge,c.com_address,c.com_name FROM lashou_post AS p join lashou_comp AS c ON p.pos_id=c.com_id WHERE p.pos_id IN($a2)")->queryAll();

        //print_r($array);die;

        /**
         * 被查看简历
         */
        $user_resume3=(new \yii\db\Query())->select("pos_id,res_id")->from('lashou_post_comp')->where(["user_id"=>$user_id,"see_state"=>1 or 3])->all();//查询职位ID
        $pos_id3 = array_column($user_resume3,'pos_id');//提取pos_id

        $a3 = implode(",",$pos_id3);//当前用户投递成功简历id
        $array3 = $dbs->createCommand("SELECT p.pos_id,p.cat_id,p.com_id,p.name,p.month_scoge,c.com_address,c.com_name FROM lashou_post AS p join lashou_comp AS c ON p.pos_id=c.com_id WHERE p.pos_id IN($a3)")->queryAll();
        //print_r($array);die;
        /**
         * 被邀请简历
         */
        $user_resume4=(new \yii\db\Query())->select("pos_id,res_id")->from('lashou_post_comp')->where(["user_id"=>$user_id,"see_state"=>3])->all();//查询职位ID
        $pos_id4 = array_column($user_resume4,'pos_id');//提取pos_id

        $a4 = implode(",",$pos_id4);//当前用户投递成功简历id
        $array4 = $dbs->createCommand("SELECT p.pos_id,p.cat_id,p.com_id,p.name,p.month_scoge,c.com_address,c.com_name FROM lashou_post AS p join lashou_comp AS c ON p.pos_id=c.com_id WHERE p.pos_id IN($a4)")->queryAll();

        //print_r($array4);die;
        return $this->render('resume_box.html',["array1"=>$array1,"array2"=>$array2,"array3"=>$array3,"array4"=>$array4]);
    }



}
?>