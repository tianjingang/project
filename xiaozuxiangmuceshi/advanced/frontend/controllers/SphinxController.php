<?php
namespace frontend\controllers;
use yii\web\Controller;
use SphinxClient;
use frontend\models\company;
header('content-type:text/html;charset=utf8');
class SphinxController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * 搜索公司与职位
     * @return [type] [description]
     */
    public function actionIndex(){
        $request=\Yii::$app->request;
        $db=\Yii::$app->db;
        $kd=$request->post("kd");
        $arr=$request->post();
        $xuan=$request->post("xuan");
        //print_r($arr);die;
        //职位搜索
        if($xuan=="职位"){
            $arr=$db->createCommand("SELECT * FROM position where p_positionname like '%$kd%'")->queryAll();
            //print_r($arr);die;
            foreach($arr as $key => $val){
                //print_r($val);
                $id = $val['p_id'];
                $num = $val['num']+1;
                $db->createCommand()->update('position',['num'=>$num],['p_id'=>$id])->execute();
            }
            foreach($arr as $k=>$v){
                $arr[$k]=str_replace('经理',"<font color='red'>经理</font>",$v);
            }
            //print_r($arr);die;
           return  $this->render('position',['pos'=>$arr]);




        }else if($xuan=="公司"){
            //公司搜索
            require('sphinxapi.php');//引入类
            $sphinx=new SphinxClient();
            $sphinx->setServer('127.0.0.1',9312);
            $re=$sphinx->Query($kd,'*');
           // print_r($re);die;
            $data=$re['matches'];
            //print_r($data);die;
            foreach($data as $k=>$v){
                $arr[]=company::find()->where(['company_id'=>$k])->asArray()->one();
            }

           foreach($arr as $k=>$v){
                $arr[$k]=str_replace('有限公司',"<font color='red'>有限公司</font>",$v);
            }
            unset($arr['kd']);
            unset($arr['xuan']);
            //print_r($arr);die;
            return  $this->render('company',['poss'=>$arr]);
        }

    }


    public function actionSou($sou=""){
        //echo $sou;die;
        $db=\Yii::$app->db;
        $arr=$db->createCommand("SELECT * FROM position where p_positionname like '%$sou%'")->queryAll();
        //print_r($arr);die;
        foreach($arr as $key => $val){
            //print_r($val);
            $id = $val['p_id'];
            $num = $val['num']+1;
            $db->createCommand()->update('position',['num'=>$num],['p_id'=>$id])->execute();
        }
        return  $this->render('one',['pos'=>$arr]);
    }

}
