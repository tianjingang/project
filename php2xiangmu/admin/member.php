<?php
header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
$id=$_GET['id'];
$sql="select * from adds where id in ($id) ";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
?>
<form action="member1.php" method="post">
    <input type="hidden" value="<?php echo $ar['id']?>" name="id" />
    <table border="1">
        <tr>
            <td>账号</td>
            <td><input type="text"  value="<?php echo $ar['a_user']?>" name="username"/></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password"  value="<?php echo $ar['a_pwd']?>" name="password"/></td>
        </tr>
        <tr>
            <td>确认密码</td>
            <td><input type="password"  value="<?php echo $ar['a_pwd2']?>" name="pwd2"/></td>
        </tr>
        <tr>
            <td>电话</td>
            <td><input type="text"  value="<?php echo $ar['a_tel']?>" name="tel"/></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="text"  value="<?php echo $ar['a_email']?>" name="email"/></td>
        </tr>
        <tr>
            <td>qq</td>
            <td><input type="text"  value="<?php echo $ar['a_qq']?>" name="qq"/></td>
        </tr>
        <tr>
            <td>会员状态</td>
           <!-- <td><input type="radio" name="a_admin" value="管理员"/>管理员
                <input type="radio" name="a_admin" value="普通会员"/>普通会员
            </td>-->

                <?php if($ar['a_admin']==1){?>
                 <td>管理员<input type="checkbox" name="a_admin"/>
                     普通会员<input type="checkbox" name="a_admin"/>
                 </td>
            <?php }else{?>
                    <td>
                        管理员<input type="checkbox" name="a_admin"/>
                        普通会员<input type="checkbox" name="a_admin"/></td>
            <?php }?>

        </tr>
        <tr>
            <td>锁定状态 </td>
           <!-- <td> <input type="radio" name="a_lock" value="锁定" />锁定
                <input type="radio" name="a_lock" value="取消锁定"/>取消锁定
            </td>-->

                <?php if($ar['a_lock']==0){?>
           <td>锁定<input type="checkbox" name="a_lock"/>
               取消锁定<input type="checkbox" name="a_lock"/>
           </td>
            <?php }else{?>
                <td>
                    锁定<input type="checkbox" name="a_lock" />
                    取消锁定<input type="checkbox" name="a_lock"/>
                </td>
            <?php }?>

        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>

    </table>
</form>