<?php
namespace frontend\controllers;
use app\models\Upload;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Session;
use frontend\lib\open51094;
//use yii\helpers\HtmlPurifier;
//use yii\web\inival;
//header('content-type:text/html;charset=utf8');
class HomeController extends Controller{
    public  $enableCsrfValidation=false;
     //前台首页
    public function actionLogin(){
        $db=\Yii::$app->db;
        $dwb = new \yii\db\Query();
        $aaa=$dwb->select('c_field,founder,c_stage,c_size')->from('detail')->limit(2)->all();
        $aa=$dwb->select('c_logo,c_introduce,c_name')->from('detail')->limit(5)->all();
       /* $aaa=$db->createCommand("select * from detail")->queryAll();
        $aa=$db->createCommand("select * from detail")->limit('5')->query();*/
        $open = new open51094();
        if(isset( $_GET['code'])){
            $code = $_GET['code'];
            $arr=$open->me($code);
           // print_r($arr);die;
            $sname=$arr['name'];
           // print_r($sname);die;
            $spwd=substr($sname,-6);
           // print_r($spwd);die;
            $three=$db->createCommand("insert into superadmin (sname,spwd)VALUES ('$sname','$spwd')")->execute();
            $session = \Yii::$app->session;
            $session->set('username',$arr['name']);
        }
        $cache = $this->get_cat_array($pid=0);
        $command = $db->createCommand("select * from   `position`  order by  p_time desc limit  0,2")->queryAll();
        foreach ($command as $key => $value) {
            $command[$key]['p_name']=$this->format_date($value['p_time']);
        }
        $data=$db->createCommand("SELECT p_positionname FROM position order by num DESC limit 6")->queryAll();
        return $this->render('index',['arr'=>$cache,'aaa'=>$aaa,'aa'=>$aa,'ccc'=>$command,'data'=>$data]);
    }
    //编写递归方法
    public function get_cat_array($pid = 0) {
       // $db=\Yii::$app->db;
       // $category=$db->createCommand("select * from jobtype")->queryAll();
        $category=(new \yii\db\Query())->select(['id','name','pid'])->from('jobtype')->all();
        $arr = array();
        foreach($category as $index => $row){
            // 对每个分类进行循环。
            if($category[$index]['pid'] == $pid){
                //如果有子类
                $row['child'] = $this->get_cat_array($category[$index]['id']);
                //调用函数，传入参数，继续查询下级
                $arr[] = $row; //组合数组
            }
        }
        return $arr;
    }

    //登录验证
    public function actionLogincheck(){
        $request=\Yii::$app->request;
        $db=\Yii::$app->db;
        $session = \Yii::$app->session;
        if($request->post()){
            $sname=$request->post("sname");
            $password=$request->post("spwd");
            $data=$db->createCommand("SELECT * FROM superadmin WHERE sname='$sname'")->queryOne();
            if($data){
                $spwd=$data['spwd'];
               // echo "$spwd";die;
                //用公钥解密
                 //私钥文件路径
                 $privateKeyFilePath = 'rsa_private_key.pem';
                 // 公钥文件的路径
                 $publicKeyFilePath = 'rsa_public_key.pem';
                 extension_loaded('openssl') or die('php需要openssl扩展支持');
                 (file_exists($privateKeyFilePath) && file_exists($publicKeyFilePath)) or die('密钥或者公钥的文件路径不正确');
                 //生成Resource类型的密钥，如果密钥文件内容被破坏，openssl_pkey_get_private函数返回false
                 $privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFilePath));
                 // 生成Resource类型的公钥，如果公钥文件内容被破坏，openssl_pkey_get_public函数返回false
                 $publicKey = openssl_pkey_get_public(file_get_contents($publicKeyFilePath));
                 ($privateKey && $publicKey) or die('密钥或者公钥不可用');
                //用公钥解密
                // 获取加密后的数据
               // $pwd1=file_get_contents('./'.md5($sname).'.txt');
                //print_r($e);die;
                //第一次解密
                if (openssl_public_decrypt(base64_decode($spwd), $decryptData1, $publicKey)) {
                   // print_r($decryptData1);die;
                    if($decryptData1==$password){
                            $session->set('username',$data['sname']);
                        $session->set('sid',$data['sid']);
                            $this->redirect(array('home/login'));
                        }else{
                        echo "<script>alert('亲密码错误,正在跳转....请重新登录');location.href='?r=home/log'</script>";
                        exit;
                    }
                } else {
                    die('第一次解密失败');
                }
            }else{
                echo "<script>alert('该用户不存在,正在跳转....请重新登录');location.href='?r=home/log'</script>";
                exit;
            }
        }else{
            echo "请输入您的信息";
            return $this->render('log');
        }
    }
    //退出登录
    public function actionLoginout(){
        $session = \Yii::$app->session;
        unset($session['username']);
        if(!$session['username']){
            $this->redirect(array('home/login'));
        }

    }
    //前台注册页面
    public function actionRegister(){
        return $this->render('register');
    }
    //前台注册招聘者入库
    public function actionAdd(){
        //echo 12345;die;
        $connection = \Yii::$app->db;
        $request = \Yii::$app->request;
        $type=$request->post('type');
        // echo $type;die;
        if($type==1){
            if($request->post()){
                $data=$request->post('semail');
                $sname=$request->post('sname');
                $password=$request->post('spwd');
                $time=date('Y-m-d H:i:s',time());
                //私钥文件路径
                $privateKeyFilePath = 'rsa_private_key.pem';
                // 公钥文件的路径
                $publicKeyFilePath = 'rsa_public_key.pem';
                extension_loaded('openssl') or die('php需要openssl扩展支持');
                (file_exists($privateKeyFilePath) && file_exists($publicKeyFilePath)) or die('密钥或者公钥的文件路径不正确');
                //生成Resource类型的密钥，如果密钥文件内容被破坏，openssl_pkey_get_private函数返回false
                $privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFilePath));
                // 生成Resource类型的公钥，如果公钥文件内容被破坏，openssl_pkey_get_public函数返回false
                $publicKey = openssl_pkey_get_public(file_get_contents($publicKeyFilePath));
                ($privateKey && $publicKey) or die('密钥或者公钥不可用');
                //原数据
                $originalData = '';
                // 加密以后的数据，用于在网路上传输
                $encryptData = '';
                //用私钥加密
                if (openssl_private_encrypt($password, $encryptData, $privateKey)) {
                // 加密后 可以base64_encode后方便在网址中传输 或者打印  否则打印为乱码
                $re= base64_encode($encryptData);
                } else {
                    die('加密失败');
                }
            }
            $arr=$connection->createCommand("select * from superadmin where semail ='$data'")->queryOne();
            if($arr!=""){
                echo "<script>alert('邮箱已注册,正在跳转....请重新登录');location.href='?r=home/register'</script>";
                exit;
            }
            else{
                //file_put_contents('./'.md5($sname).'.txt',$encryptData);
                $re=  $connection->createCommand()->insert('superadmin', [
                    'semail' => $data,
                    'sname'=>$sname,
                    'spwd' => $re,
                    'register_time'=>$time,
                    'register_type'=>$type,
                ])->execute();
                if($re){
                    //根据注册时的类型取出该条数据sid 确定角色，赋权限
                    $superadmin=$connection->createCommand("select * from superadmin order by sid desc")->queryOne();
                    // print_r($superadmin);die;
                    $sid=$superadmin['sid'];//取出刚注册者的superadmin表里sid
                    $s_r=$connection->createCommand()->insert('s_r',[
                        'sid'=>$sid,
                        'r_id'=>2,
                    ])->execute();
                    if($s_r){
                        return $this->render('bindstep1');
                    }
                    else{
                        echo "赋权限失败";die;
                    }
                }
            }
        }else if($type==0){
            if($request->post()){
                // htmlspecialchars
               // $inival = \Yii::$app->inival;
                $data=$request->post('semail');
                //$data= $HtmlPurifier::process($date);
                //$data=$inival->$date;  intval()
                $sname=$request->post('sname');
               // $sname= $HtmlPurifier::process($snames);
                $password=$request->post('spwd');
                //$password=$HtmlPurifier::process($pwd);
                $time=date('Y-m-d H:i:s',time());
               //私钥文件路径
                $privateKeyFilePath = 'rsa_private_key.pem';
                 //公钥文件的路径
                $publicKeyFilePath = 'rsa_public_key.pem';
                extension_loaded('openssl') or die('php需要openssl扩展支持');
                (file_exists($privateKeyFilePath) && file_exists($publicKeyFilePath)) or die('密钥或者公钥的文件路径不正确');
                // 生成Resource类型的密钥，如果密钥文件内容被破坏，openssl_pkey_get_private函数返回false
                $privateKey = openssl_pkey_get_private(file_get_contents($privateKeyFilePath));
               // print_r($privateKeyFilePath);die;
             //生成Resource类型的公钥，如果公钥文件内容被破坏，openssl_pkey_get_public函数返回false
                $publicKey = openssl_pkey_get_public(file_get_contents($publicKeyFilePath));
                ($privateKey && $publicKey) or die('密钥或者公钥不可用');
                //原数据
                //$originalData = 'dddd';
                // 加密以后的数据，用于在网路上传输
                $encryptData = '';
                //用私钥加密
                if (openssl_private_encrypt($password, $encryptData, $privateKey)) {
                   // print_r($encryptData);die;
                // 加密后 可以base64_encode后方便在网址中传输 或者打印  否则打印为乱码
                    $re= base64_encode($encryptData);
                    //print_r($re);die;
                } else {
                    die('加密失败');
                }

            }
            $arr=$connection->createCommand("select * from superadmin where semail='$data'")->queryOne();
            if($arr!=''){
                echo "<script>alert('邮箱已注册,正在跳转....请重新登录');location.href='?r=home/register'</script>";
                exit;
            }
            else{
               // file_put_contents('./'.md5($sname).'.txt',$encryptData);
                $re=  $connection->createCommand()->insert('superadmin', [
                    'semail' => $data,
                    'sname'=>$sname,
                    'spwd' => $re,
                    'register_time'=>$time,
                    'register_type'=>$type,
                ])->execute();
                if($re){
                    //根据注册时的类型取出该条数据sid 确定角色，赋权限
                    $superadmin=$connection->createCommand("select * from superadmin order by sid desc")->queryOne();
                   // print_r($superadmin);die;
                    $sid=$superadmin['sid'];//取出刚注册者的superadmin表里sid
                    $s_r=$connection->createCommand()->insert('s_r',[
                        'sid'=>$sid,
                        'r_id'=>3,
                    ])->execute();
                    if($s_r){
                        return $this->render('log');
                    }
                    else{
                        echo "赋权限失败";die;
                    }

                }
            }
        }
    }
    public function actionCom(){
        $connection = \Yii::$app->db;
        $request = \Yii::$app->request;
        $mail= \Yii::$app->mailer->compose();
        if($request->post()){
            $data=$request->post();
            $re=$connection->createCommand()->insert('company', [
                'company_phone' => $data['tel'],
                'company_email' => $data['email'],
                'com'=>$data['com'],
            ])->execute();
            $res=$connection->createCommand()->insert('detail',[
                'c_name'=>$data['com'],
            ])->execute();
            if($re && $res){
                $mail->setTo($data['email']);
                $mail->setSubject("激活拉勾网");
                $mail->setHtmlBody("<br>请点击以下网址去登录http://localhost/xiaoshixun1/xiaozuxiangmu/advanced/frontend/web/index.php?r=home/log");    //发布可以带html标签的文本
                if($mail->send())
                     $this->redirect('?r=home/log');
                else
                    echo "failse";
            }

        }
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
        return $this->render('create');
    }

    function format_date($time){
        $time=strtotime($time);
        $t=time()-$time;
        $f=array(
            '31536000'=>'年',
            '2592000'=>'个月',
            '604800'=>'星期',
            '86400'=>'天',
            '3600'=>'小时',
            '60'=>'分钟',
            '1'=>'秒'
        );
        foreach ($f as $k=>$v)    {
            if (0 !=$c=floor($t/(int)$k)) {
                return $c.$v.'前';
            }
        }
    }
}
?>