<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
$id=$_GET['id'];
$user=$_COOKIE['u_name'];
$sql="select * from denglu where d_name='$user'";
$re=mysqli_query($link,$sql);
?>
<table>
    <tr>
        <td>用户名</td>
        <td>密码</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($re)){?>
    <tr>
        <td><?php $user?></td>
        <td><?php $arr['d_pwd']?></td>
    </tr>
    <?php }?>
</table>
