<?php
header('content-type:text/html;charset=utf8');
//连库
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
$id=$_GET['id'];
$sql="delete from liuyan where id='$id'";
$re=mysqli_query($link,$sql);
if($re){
    echo "从回收站永久删除成功";
    header('refresh:1;url=huishou.php');
}
else{
    echo "从回收站永久删除失败";
    header('refresh:1;url=huishou.php');
}








?>