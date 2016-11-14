<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
$id=$_GET['id'];
$sql="select * from tilie where id in ($id) ";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
?>
<form action="gai1.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $ar['id']?>" name="id" />
    <table border="1">
        <tr>
            <td>编号</td>
            <td><input type="text"  value="<?php echo $ar['id']?>" name="order"/></td>
        </tr>
        <tr>
            <td>名称</td>
            <td><input type="text"  value="<?php echo $ar['t_name']?>" name="timu"/></td>
        </tr>
        <tr>
            <td>题目</td>
            <td><input type="file"  value="<?php echo $ar['t_file']?>" name="filename"/></td>
        </tr>
        <tr>
            <td>题目描述</td>
            <td><input type="text"  value="<?php echo $ar['content']?>" name="self"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>

    </table>
</form>