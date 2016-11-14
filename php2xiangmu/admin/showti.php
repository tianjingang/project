<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
//语句
//$user=$_COOKIE['u_name'];
$id=isset($_GET['id'])?$_GET['id']:"";
$sql="select * from tilie where id=$id";
$re=mysqli_query($link,$sql);

?>
<table border="1">
    <tr>
        <td>编号</td>
        <td>题目名称</td>
        <td>题目</td>
        <td>题目描述</td>
    </tr>
    <?php while($arr=mysqli_fetch_assoc($re)) {?>
        <tr>
            <td><?php echo $arr['id']?></td>
            <td><?php echo $arr['t_name']?></td>
            <td><img src="<?php echo $arr['t_file']?>" alt="" width="100" height="100"/></td>
            <td><?php echo $arr['content']?></td>
        </tr>
    <?php }?>
</table>