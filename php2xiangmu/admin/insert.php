<?php 
header('content-type:text/html;charset=utf8');
//接值
$username=$_POST['username'];
$password=$_POST['password'];
$pwd2=$_POST['pwd2'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$qq=$_POST['qq'];
$is_admin=isset($_POST['is_admin'])?$_POST['is_admin']:'';
$is_lock=isset($_POST['is_lock'])?$_POST['is_lock']:'';
$u_name=$_COOKIE['u_name'];
$last_time=date('Y-m-d H:i:s',time());
//var_dump($_POST);die;
//连接库
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
$sql="insert into adds (a_user,a_pwd,a_que,a_tel,a_email,a_qq,a_admin,a_lock,a_name,a_lasttime)
VALUES ('$username','$password','$pwd2','$tel','$email','$qq','$is_admin','$is_lock','$u_name','$last_time')";
//echo $sql;die;
$re=mysqli_query($link,$sql);
if($re){
    echo "添加成功";
    header('refresh:2;url=list.php');
}
else{
    echo "添加失败";
    header('refresh:2;url=add.php');

}
?>