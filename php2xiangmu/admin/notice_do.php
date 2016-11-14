<?php
header('content-type:text/html;charset=utf8');
//接值
$t_name=$_POST['t_name'];
$filename=$_FILES['filename'];
$content=$_POST['content'];
//临时文件路径
$tmp_name=$filename['tmp_name'];
//指定文件路径
$path='image/'.$filename['name'];
//移动文件路径
move_uploaded_file($tmp_name,$path);
//连库
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
//语句
$sql="insert into tilie(t_name,t_file,content)VALUES ('$t_name','$path','$content')";
$re=mysqli_query($link,$sql);
if($re){
    echo "成功";
    header('refresh:1;url=noticelist.php');
}
else{
    echo "失败";
    header('refresh:1;url=notice.php');
}






?>