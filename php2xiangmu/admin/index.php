<?php 
/**
 * 八维教育 高端PHP
 * @Author: BING
 * @Email: itbing@sina.cn
 */

?>
<?php require('top.php')?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">管理首页</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-4 col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<span class="arrow glyphicon glyphicon-user"></span>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">999</div>
							<div>账户数量</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
						<a href="#"><span class="pull-left">账户列表</span></a>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<span class="arrow glyphicon glyphicon-file">
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">888</div>
							<div>Cookie数量</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
						<a href="#"><span class="pull-left">Cookie列表</span></a>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-user fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">333</div>
							<div>demo内到期会员</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
						<a href=""><span class="pull-left">查看详情</span></a>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>	
	</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                留言列表
            </div><!--header-->                                                                                                                                  <div class="panel-body">
            <div class="panel-body">
		<div class="row">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th style="width: 60px;">编号</th>
					<th>标题</th>
					<th style="width: 180px;">添加时间</th>
				</tr>

				<tr>
					<td>1</td>
					<td><a href="shownotice.php?id=1">demo</a></td>
					<td>2015-10-19 00:44:49</td>
				</tr>

				<tr>
					<td>1</td>
					<td><a href="shownotice.php?id=1">demo</a></td>
					<td>2015-10-19 00:44:49</td>
				</tr>

				<tr>
					<td>1</td>
					<td><a href="shownotice.php?id=1">demo</a></td>
					<td>2015-10-19 00:44:49</td>
				</tr>

			</table>
		</div>
				 <div class="row" style="padding: 0px;">
                    <div class="col-sm-6">
                        <div>记录数：100 页数：1/50</div>
                    </div>
                    <div class="col-sm-6">
                        <div style="margin: 0px;text-align: right">
                            <ul class="pagination" style="margin: 2px 0;">
								
                            </ul>
                        </div>
                    </div>
                </div><!-- /.row -->
	    </div><!-- /.panel-body -->
        </div><!-- /.panel -->
</div>
<?php require 'footer.php' ?>