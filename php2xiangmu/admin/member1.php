<?php
header('content-type:text/html;charset=utf8');
if(!empty($_POST)){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $pwd2=$_POST['pwd2'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $qq=$_POST['qq'];
    $is_admin=isset($_POST['a_admin'])?$_POST['a_admin']:'';
    $is_lock=isset($_POST['a_lock'])?$_POST['a_lock']:'';
   $link=mysqli_connect("127.0.0.1","root","root","php2");
    mysqli_query($link,'set names utf8');
    $sql="update adds set a_user='$username',a_pwd='$password',a_que='$pwd2',a_tel='$tel',a_email='$email',a_qq='$qq',a_admin='$is_admin',a_lock='$is_lock'where id='$id'";
    $re=mysqli_query($link,$sql);
    if($re){
        echo "编辑成功";
        header('refresh:1;index.php');
    }
    else{
        echo "编辑失败";
        header('refresh:1;index.php');
    }


}
else{
    echo "非法访问";
}





?>