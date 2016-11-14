<?php
header("content-type:text/html;charset=utf-8");
$id=$_GET['id'];
$link=mysql_connect('127.0.0.1','root','root') or die("连接数据库失败");
//选择数据库
mysql_select_db('php2',$link) or die("选择数据库失败");
$sql2="select * from adds where id='$id'";
$er=mysql_query($sql2);
$arr=mysql_fetch_assoc($er);
$is_lock=$arr['a_lock'];
//echo $is_lock;
//echo $sql2;die;
if($is_lock==0){
    $sql="update adds set a_lock=1 where id='$id'";
    $er=mysql_query($sql);
    if($er){
        echo "<script>alert('账号已锁定');location.href='list.php'</script>";
    }
    else{
        echo "<script>alert('账号已锁定');location.href='list.php'</script>";
    }

}else{
    $sql="update adds set a_lock=0 where id='$id'";
    $er=mysql_query($sql);
    if($er){
        echo "<script>alert('账号已解锁');location.href='list.php'</script>";
    }
    else{
        echo "<script>alert('账号已解锁');location.href='list.php'</script>";
    }

}

