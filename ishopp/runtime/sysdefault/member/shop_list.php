<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台管理</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/css/admin.css";?>" />
	<meta name="robots" content="noindex,nofollow">
	<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-1.11.3.min.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/artDialog.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/autovalidate/validate.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/common.js";?>"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/admin.js";?>"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/javascript/menu.js";?>"></script>
</head>
<body>
	<div class="container">
		<div id="header">
			<div class="logo">
				<a href="<?php echo IUrl::creatUrl("/system/default");?>"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/logo.gif";?>" width="303" height="43" /></a>
			</div>
			<div id="menu">
				<ul name="menu">
				</ul>
			</div>
			<p><a href="<?php echo IUrl::creatUrl("/systemadmin/logout");?>">退出管理</a> <a href="<?php echo IUrl::creatUrl("/system/admin_repwd");?>">修改密码</a> <a href="<?php echo IUrl::creatUrl("/system/default");?>">后台首页</a> <a href="<?php echo IUrl::creatUrl("");?>" target='_blank'>商城首页</a> <span>您好 <label class='bold'><?php echo isset($this->admin['admin_name'])?$this->admin['admin_name']:"";?></label>，当前身份 <label class='bold'><?php echo isset($this->admin['admin_role_name'])?$this->admin['admin_role_name']:"";?></label></span></p>
		</div>
		<div id="info_bar">
			<label class="navindex"><a href="<?php echo IUrl::creatUrl("/system/navigation");?>">快速导航管理</a></label>
			<span class="nav_sec">
			<?php $adminId = $this->admin['admin_id']?>
			<?php $query = new IQuery("quick_naviga");$query->where = "admin_id = $adminId and is_del = 0";$items = $query->find(); foreach($items as $key => $item){?>
			<a href="<?php echo isset($item['url'])?$item['url']:"";?>" class="selected"><?php echo isset($item['naviga_name'])?$item['naviga_name']:"";?></a>
			<?php }?>
			</span>
		</div>

		<div id="admin_left">
			<ul class="submenu"></ul>
			<div id="copyright"></div>
		</div>

		<div id="admin_right">
			<div class="headbar">
    <div class="position">会员购物信息统计<span>></span></div>
</div>

<form name="orderForm" id="orderForm" action="<?php echo IUrl::creatUrl("/order/order_del");?>" method="post">
    <div class="content">
        <center>
        <h1 style="font-size: 30px;">会员购物信息统计</h1>
        <table border="1">
            <tr>
                <td>会员类型</td>
                <td>普通会员</td>
                <td>VIP</td>
                <td>商家</td>
            </tr>
            <tr>
                <td>会员总数</td>
                <td><?php echo isset($this->p_num)?$this->p_num:"";?></td>
                <td><?php echo isset($this->V_num)?$this->V_num:"";?></td>
                <td><?php echo isset($this->ss_num)?$this->ss_num:"";?></td>
            </tr>
            <tr>
                <td>购买商品金额</td>
                <td><?php echo isset($this->pp_amount)?$this->pp_amount:"";?></td>
                <td><?php echo isset($this->VV_amount)?$this->VV_amount:"";?></td>
                <td><?php echo isset($this->ss_amount)?$this->ss_amount:"";?></td>
            </tr>
        </table></center>
<!--
        <table class="list_table">
            <colgroup>
                <col width="30px" />
                <col width="160px" />
                <col width="70px" />
                <col width="75px" />
                <col width="75px" />
                <col width="75px" />
                <col width="115px" />
                <col width="70px" />
                <col width="90px" />
                <col />
            </colgroup>
            <tbody>
            <?php foreach($this->arr as $key => $item){?>
            <tr>
                <td class="t_c"><input name="id[]" type="checkbox" value="<?php echo isset($item['id'])?$item['id']:"";?>" /></td>
                <td title="<?php echo isset($item['time'])?$item['time']:"";?>"><?php echo isset($item['time'])?$item['time']:"";?></td>
                <td title="<?php echo isset($item['zong'])?$item['zong']:"";?>"><?php echo isset($item['zong'])?$item['zong']:"";?></td>
                <td title="<?php echo isset($item['ru'])?$item['ru']:"";?>"><?php echo isset($item['ru'])?$item['ru']:"";?></td>
                <td>
                    <a href="<?php echo IUrl::creatUrl("/order/order_show/id/".$item['id']."");?>"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_check.gif";?>" title="查看" /></a>
                    <?php if(Order_class::getOrderStatus($item) < 3){?>
                    <a href="<?php echo IUrl::creatUrl("/order/order_edit/id/".$item['id']."");?>"><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_edit.gif";?>" title="编辑"/></a>
                    <?php }?>
                    <a href="javascript:void(0)" onclick="delModel({link:'<?php echo IUrl::creatUrl("/order/order_del/id/".$item['id']."");?>'})" ><img class="operator" src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/icon_del.gif";?>" title="删除"/></a>

                    <?php if($item['seller_id']){?>
                    <a href="<?php echo IUrl::creatUrl("/site/home/id/".$item['seller_id']."");?>" target="_blank"><img src="<?php echo IUrl::creatUrl("")."views/".$this->theme."/skin/".$this->skin."/images/admin/seller_ico.png";?>" /></a>
                    <?php }?>
                </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
-->
    </div>

</form>

<script type='text/javascript'>
    //DOM加载结束
    $(function(){
        var searchData = <?php echo JSON::encode($this->search);?>;
    for(var index in searchData)
    {
        $('[name="search['+index+']"]').val(searchData[index]);
    }

    //高亮色彩
    $('[name="payStatusColor1"]').addClass('green');
    $('[name="disStatusColor1"]').addClass('green');
    });
    function changeAction(excel)
    {
        if (excel){
            $("input[name=\"action\"]").val("order_report");
            $("form[name=\"order_list\"]").attr("target", "_blank");
        }else{
            $("input[name=\"action\"]").val("order_list");
            $("form[name=\"order_list\"]").attr("target", "_self");
        }
    }
</script>
		</div>
	</div>

	<script type='text/javascript'>
		//DOM加载完毕执行
		$(function(){
			//隔行换色
			$(".list_table tr:nth-child(even)").addClass('even');
			$(".list_table tr").hover(
				function () {
					$(this).addClass("sel");
				},
				function () {
					$(this).removeClass("sel");
				}
			);

			//后台菜单创建
			<?php $menu = new Menu($this->admin);?>
			var data = <?php echo $menu->submenu();?>;
			var current = '<?php echo $menu->current;?>';
			var url='<?php echo IUrl::creatUrl("/");?>';
			initMenu(data,current,url);
		});
	</script>
</body>
</html>
