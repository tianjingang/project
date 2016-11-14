<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>日考技能题库管理系统</title>
    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!-- jQuery -->
	<script src="../bootstrap/js/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bootstrap/admin/metisMenu/metisMenu.min.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="../bootstrap/admin/js/sb-admin-2.js"></script>    
    <!-- Timeline CSS -->
    <link href="../bootstrap/admin/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../bootstrap/admin/css/sb-admin-2.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">DEMO</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="tui.php">
                        <?php echo "欢迎".$_COOKIE['u_name']."登录";?><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="tui.php?action=out"><i class="fa fa-sign-out fa-fw"></i>退出登录</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
<?php include_once('menu.php'); ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>