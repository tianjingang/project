<?php
/*header('content-type:text/html;charset=utf8');
if(empty($_COOKIE['txtUid'])){
    echo "<script>alert('请先登录');location.href='login.php'</script>";die;
}
*/?><!--<!--
--><?php
/*//连接数据库
$username=$_COOKIE['txtUid'];
$link=mysql_connect('127.0.0.1','root','root') or die("连接数据库失败");
//选择数据库
mysql_select_db('php2',$link) or die("选择数据库失败");
$sql="select * from adds where  txtUid='$username'";
//echo $sql;die;
$er=mysql_query($sql);
$arr=mysql_fetch_assoc($er);
$is_admin=$arr['a_admin'];
//echo $is_admin;die;
if($is_admin!='1'){
    echo "<script>alert('你不是超级管理员');location.href='index.php'</script>";die;
}
*/?>




<div id="div1">
<?php
require "../includes/init.php";

$list = $res;
$user=$_COOKIE['u_name'];
//连库
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
$id=isset($_GET['id'])?$_GET['id']:'';
$sqldel="delete from adds where id='$id'";
mysqli_query($link,$sqldel);
//语句
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
if($ar['a_admin']==1){
    $sql="select count(*) num from adds";
    $re=mysqli_query($link,$sql);
    $ar=mysqli_fetch_assoc($re);
}
else{
    $sql="select count(*) num from adds where a_admin=0";
    $re=mysqli_query($link,$sql);
    $ar=mysqli_fetch_assoc($re);
}
//获取条数
$count=$ar['num'];
//每页条数
$page_num=3;
//获取页数
$sum_page=ceil($count/$page_num);
//获取当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//获取上一页
$last=$page-1<1?1:$page-1;
//获取下一页
$nest=$page+1>$sum_page?$sum_page:$page+1;
//获取偏移量
$page_limit=($page-1)*$page_num;
//语句
$sql2="select * from adds limit $page_limit,$page_num";
$res=mysqli_query($link,$sql2);
?>
<?php require('top.php')?>
<script type="text/javascript">
$(document).ready(function () {

});
</script>
<div id="page-wrapper">
<form id="form1" runat="server">
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">会员管理</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
<?php show_alert($errmsg, $alert_type);?>
<!-- /.alert -->
        <div class="panel panel-default">
            <div class="panel-heading" >
                会员列表
            </div><!--header-->                                                                                                                                  <div class="panel-body">
            <div class="panel-body">
                <div class="row">
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<th style="width: 60px;">编号</th>
							<th>使用人</th>
							<th>帐号</th>
							<th style="width: 100px;">Cookie数</th>
							<th style="width: 100px;">帐号类型</th>
							<th style="width: 100px;">到期时间</th>
							<th>最后一次登录时间</th>
							<th>管理操作</th>
						</tr>
<?php while($row=mysqli_fetch_assoc($res)){?>
						<tr>
							<td><?php echo $row['id']?></td>
							<td><?php echo $user ?></td>
							<td><a href="cookielist.php?uid=<?=$row['id']?>"><?php echo $row['a_user']?></a></td>
							<td><?php echo 1?></td>
							<td><?php
                            if($row['a_admin']==1){
                                echo "管理员";
                            }
                            else{
                                echo "普通会员";
                            }
                            ?>
                            </td>
							<td><?php echo date('Y-m-d', time())?></td>
							<td><?php echo date('Y-m-d', $row['last_time'])?></td>
							<td>
                                <a href="showmember.php?id=<?php echo $row['id']?>"><i class="fa fa-user"></i>查看</a> |
							<a href="member.php?id=<?php echo $row['id']?>"><i class="fa fa-edit"></i>编辑</a> |
							<a href="javascript:void(0)" onclick="del(<?php echo $page?>,<?php echo $row['id']?>)"><i class="fa fa-times"></i>删除</a>|
                                <?php
                                if($row['a_lock']==1){
                                    ?>
                                    <a href='up_lock.php?id=<?php echo $row['id']?>'>取消锁定</a>
                                <?php
                                }else{
                                    ?>
                                    <a href='up_lock.php?id=<?php echo $row['id']?>'>锁定</a>
                                <?php
                                }
                                ?>

                            </td>
						</tr>
<?php } ?>
					</table>
                </div><!-- /.row -->
		        <div class="row" style="padding: 0px;">
                    <div class="col-sm-6">
                        <div>记录数：<?php echo $count?> 页数：<?php echo $sum_page?>当前页<?php echo $page?></div>
                    </div>
                    <div class="col-sm-6">
                        <div style="margin: 0px;text-align: right">
                            <ul class="pagination" style="margin: 2px 0;">
								<a href="javascript:void (0)" onclick="page(1)">首页</a>
                                <a href="javascript:void (0)" onclick="page(<?php echo $last?>)">上一页</a>
                                <a href="javascript:void (0)" onclick="page(<?php echo $nest?>)">下一页</a>
                                <a href="javascript:void (0)" onclick="page(<?php echo $sum_page?>)">尾页</a>

                            </ul>
                        </div>
                    </div>

                </div><!-- /.row -->
            </div><!-- /.panel-body -->
        </div><!-- /.panel -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
</form>
</div>
<script>
    //分页
    function page(page){
        var ajax=new XMLHttpRequest();
        ajax.open('get','list.php?page='+page);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //删除
    function del(page,id){
        var ajax=new XMLHttpRequest();
        ajax.open('get','list.php?page='+page+'&id='+id);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;

            }
        }

    }

</script>
