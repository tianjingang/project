<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
//语句
$user=$_COOKIE['u_name'];
$id=isset($_GET['id'])?$_GET['id']:"";
$sql="select * from adds where id='$id'";
$re=mysqli_query($link,$sql);
?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>使用人</td>
        <td>账号</td>
        <td>Cookie数</td>
        <td>账号类型</td>
        <td>到期时间</td>
        <td>最后一次登录时间</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($re)) {?>
    <tr>
        <td><?php echo $arr['id']?></td>
        <td><?php echo $user?></td>
        <td><?php echo $arr['a_user']?></td>
        <td><?php echo 1?></td>
        <td><?php
            if($arr['a_admin']==1){
                echo "管理员";
            }
            else{
                echo "普通会员";
            }
            ?>
        </td>
        <td><?php echo date('Y-m-d', time())?></td>
        <td><?php echo date('Y-m-d', $row['last_time'])?></td>
    </tr>
    <?php }?>
</table>