<?php
header('content-type:text/html;charset=utf8');
//接值
$txtUid=$_POST['txtUid'];
$txtPwd=$_POST['txtPwd'];
//连库
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
//语句
$sql="select * from denglu where d_name='$txtUid'";
$re=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($re);
if($arr){
    //验证密码
    if($txtPwd==$arr['d_pwd']){
        echo "登陆成功";
        setcookie('u_name',$txtUid);
        header('location:list.php');

    }
    else{
        echo "密码错误";
        header('refresh:2;url=login.php');
    }

}
else{
    echo "用户不存在";
    header('refresh:2;url=login.php');
}






?>