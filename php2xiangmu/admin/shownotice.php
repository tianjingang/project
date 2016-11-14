<div id="div1">
<?php

    require "../includes/init1.php";

    $list = $res;
    $user=$_COOKIE['u_name'];
    //连库
    $link=mysqli_connect("127.0.0.1","root","root","php2");
    mysqli_query($link,'set names utf8');
    $id=isset($_GET['id'])?$_GET['id']:'';
    $sqldel="update liuyan set l_status=0 where id='$id'";
    mysqli_query($link,$sqldel);
    //语句
    $sql="select count(*) num from liuyan  where l_status=1";
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
    $sql2="select * from liuyan  where l_status=1 limit $page_limit,$page_num";
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
                <h3 class="page-header">留言管理</h3>
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
                        留言列表
                    </div><!--header-->                                                                                                                                  <div class="panel-body">
                        <div class="panel-body">
                            <div class="row">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th style="width: 60px;">编号</th>
                                        <th>标题</th>
                                        <th>添加时间</th>
                                        <th>管理操作</th>
                                    </tr>
                                    <?php while($row=mysqli_fetch_assoc($res)){?>
                                        <tr>
                                            <td><?php echo $row['id']?></td>
                                            <td><?php echo $row['l_title']?></td>
                                            <td><?php echo $row['l_addtime']?></td>
                                            <td>
                                                <a href="#"><i class="fa fa-user"></i>查看</a> |
                                                <a href="javascript:void(0)" onclick="liu_del(<?php echo $page?>,<?php echo  $row['id']?>)"><i class="fa fa-times"></i>删除</a>
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
        ajax.open('get','shownotice.php?page='+page);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
    //删除
    function liu_del(page,id){
        var ajax=new XMLHttpRequest();
        ajax.open('get','shownotice.php?page='+page+'&id='+id);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;

            }
        }

    }

</script>








