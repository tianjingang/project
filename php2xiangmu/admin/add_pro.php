<?php
header("content-type:text/html;charset=utf8");
$username=$_GET['username'];
// echo $pwd1;die;
//链接数据库
$link=mysql_connect('127.0.0.1','root','root');
//选择数据库
mysql_select_db('php2',$link);
//写sql语句
$sql="select * from adds where a_user='$username'";
//echo $sql;die;
$er=mysql_query($sql);
$arr=mysql_fetch_assoc($er);
if($arr['a_user']!=$username){
    echo 1;
}else{
    echo 0;
}

?>