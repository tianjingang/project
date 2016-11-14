<?php
/*header('content-type:text/html;charset=utf8');
$link=mysqli_connect("127.0.0.1","root","root","php2");
mysqli_query($link,'set names utf8');
$id=isset($_GET['id'])?$_GET['id']:'';
$sqldel="delete from tilie where id=$id";
mysqli_query($link,$sqldel);
$search=isset($_GET['search'])?$_GET['search']:'';
$sql="select count(*) as num from tilie where t_name like '%$search%'";
$re=mysqli_query($link,$sql);
$ar=mysqli_fetch_assoc($re);
//总条数
$page_num=$ar['num'];
//每页条数
$page_num=3;
//总页数
$sum_page=ceil($page_num/$page_num);
//当前页
$page=isset($_GET['page'])?$_GET['page']:1;
//上一页
$last=$page-1<1?1:$page-1;
//下一页
$nest=$page+1>$sum_page?$sum_page:$sum_page-1;
//获取偏移量
$num_limit=($page-1)*$page_num;
//获取偏移量后的语句
$sql2="select * from tilie where t_name like '%$search%'limit $num_limit,$page_num";
$res=mysqli_query($link,$sql2);
*/?><!--
<div id="div1">
    <input type="search" value="<?php /*echo $search*/?>" name="search"/>
    <button onclick="page(1)">搜索</button>
    <table border="1">
        <tr>
            <td>序号</td>
            <td>题目名字</td>
            <td>题目</td>
            <td>题目描述</td>
            <td>操作</td>
        </tr>
        <?php /*while($arr=mysqli_fetch_assoc($res)){*/?>
        <tr>
            <td><?php /*echo $arr['id']*/?></td>
            <td><?php /*echo $arr['t_name']*/?></td>
            <td><img src="<?php /*echo $arr['t_file']*/?>" alt="" width="100" height="100"/></td>
            <td><?php /*echo $arr['content']*/?></td>
            <td><a href="cha.php?id=<?php /*echo $arr['id']*/?>">查看</a>
            <a href="javascript:void(0)" onclick="noticelist_del(<?php /*echo $page*/?>,<?php /*echo $arr['id']*/?>)">删除</a>
                <a href="gai.php?id=<?php /*echo $arr['id']*/?>">修改</a>

            </td>
        </tr>
        <?php /*}*/?>
    </table>
    <a href="javascript:void (0)" onclick="page(1)">首页</a>
    <a href="javascript:void (0)" onclick="page(<?php /*echo $last*/?>)">上一页</a>
    <a href="javascript:void (0)" onclick="page(<?php /*echo $nest*/?>)">下一页</a>
    <a href="javascript:void (0)" onclick="page(<?php /*echo $sum_page*/?>)">尾页</a>
    <p><?php /*echo $page*/?><?php /*echo $sum_page*/?></p>
    <p><a href="notice.php">返回继续添加</a></p>
</div>
<script>
    function page(page){
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','noticelist.php?page='+page+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //删除
    function noticelist_del(page,id){
        var search=document.getElementsByName('search')[0].value;
        var ajax=new XMLHttpRequest();
        ajax.open('get','noticelist.php?page='+page+'&id='+id+'&search='+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;

            }
        }

    }
</script>-->
<div id="div1">
    <?php
    require "../includes/init1.php";

    $list = $res;
    $user=$_COOKIE['u_name'];
    //连库
    $link=mysqli_connect("127.0.0.1","root","root","php2");
    mysqli_query($link,'set names utf8');
    $id=isset($_GET['id'])?$_GET['id']:'';
    $sqldel="delete from tilie where id='$id'";
    mysqli_query($link,$sqldel);
    //语句
    $sql="select count(*) num from tilie";
    $re=mysqli_query($link,$sql);
    $ar=mysqli_fetch_assoc($re);
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
    $sql2="select * from tilie limit $page_limit,$page_num";
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
                                            <th style="width: 60px;">序号</th>
                                            <th>题目名称</th>
                                            <th>题目</th>
                                            <th style="width: 100px;">题目描述</th>
                                            <th>管理操作</th>
                                        </tr>
                                        <?php while($row=mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['t_name']?></td>
                                            <td><img src="<?php echo $row['t_file']?>" alt="" width="100" height="100"/></td>
                                            <td><?php echo $row['content']?></td>
                                            <td>
                                                <a href="showti.php?id=<?php echo $row['id']?>"><i class="fa fa-user"></i>查看</a> |
                                                <a href="gai.php?id=<?php echo $row['id']?>"><i class="fa fa-edit"></i>编辑</a> |
                                                <a href="javascript:void(0)" onclick="noticelist_del(<?php echo $page?>,<?php echo  $row['id']?>)"><i class="fa fa-times"></i>删除</a>
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
            ajax.open('get','noticelist.php?page='+page);
            ajax.send();
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4&&ajax.status==200){
                    document.getElementById('div1').innerHTML=ajax.responseText;
                }
            }
        }
        //删除
        function noticelist_del(page,id){
            var ajax=new XMLHttpRequest();
            ajax.open('get','noticelist.php?page='+page+'&id='+id);
            ajax.send();
            ajax.onreadystatechange=function(){
                if(ajax.readyState==4&&ajax.status==200){
                    document.getElementById('div1').innerHTML=ajax.responseText;

                }
            }

        }

    </script>
