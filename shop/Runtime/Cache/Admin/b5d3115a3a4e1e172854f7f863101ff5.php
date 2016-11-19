<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <link href="/shop/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/shop/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
    <script src="/shop/Public/Admin/js/jquery-1.7.2.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="goods.php?act=add">添加新商品</a></span>
    <span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
    <div style="clear:both"></div>
</h1>
<script>
    $(function(){
        //即点即该商品名称
        $(document).on("click","#g_name",function(){         //找取商品名称的节点
            var g_name = $(this).html();            //获取值
            var id=$(this).parent().attr('name');      //获取id
            $(this).parent().html("<input type='text' name='g_name'  id='"+id+"' value='"+g_name+"'/>");
        });
        $(document).on("blur","input[name='g_name']",function(){
            var g_name = $(this).val();   //获取值
            var id = $(this).attr('id');     //获取id
            $.post("/shop/index.php/Admin/Good/upgoodsname/",{id:id,g_name:g_name},function(obj){
                $("input[name='g_name']").parent().html("<span id='g_name' name='"+id+"'>"+g_name+"</span>");
            });
        });
        //即点即改商品货号
        //运用事件委托事件
        $(document).on("click","#g_sn",function(){         //找取商品名称的节点
            var g_sn = $(this).html();            //获取值
            var id=$(this).parent().attr('name');      //获取id
            $(this).parent().html("<input type='text' name='g_sn'  id='"+id+"' value='"+g_sn+"'/>");
        });
        //执行修改
        $(document).on("blur","input[name='g_sn']",function(){
            var g_sn=$(this).val();
            var id=$(this).attr('id');
            $.post("/shop/index.php/Admin/Good/upgoodssn/",{id:id,g_sn:g_sn},function(obj){
                $("input[name='g_sn']").parent().html("<span id='g_sn' name='"+id+"'>"+g_sn+"</span>");
            });
        });
        //即点即改商品价格
        //运用事件委托事件
        $(document).on("click","#shop_price",function(){  //找取商品节点
            var shop_price=$(this).html();    //获取值
            var id=$(this).parent().attr('name');//获取id
            $(this).parent().html("<input type='text' name='shop_price' id='"+id+"' value='"+shop_price+"'/>");
        });
        //执行修改
        $(document).on("blur","input[name='shop_price']",function(){
            var shop_price=$(this).val();   //获取值
            var id=$(this).attr('id');
            $.post("/shop/index.php/Admin/Good/upgoodprice/",{id:id,shop_price:shop_price},function(obj){
                $("input[name='shop_price']").parent().html("<span id='shop_price' name='"+id+"'>"+shop_price+"</span>");
            });

        });
        //即点即改库存
        //运用事件委托事件
        /* $(document).on("click","#goods_number",function(){
         var goods_number=$(this).html();    //获取值
         var id=$(this).parent().attr('name');
         $(this).parent().html("<input type='text' name='goods_number',id='"+id+"' value='"+shop_price+"'/>");
         });*/
        $(document).on("click","#goods_number",function(){  //找取商品节点
            var goods_number=$(this).html();    //获取值
            var id=$(this).parent().attr('name');//获取id
            $(this).parent().html("<input type='text' name='goods_number' id='"+id+"' value='"+goods_number+"'/>");
        });
        //执行修改
        /*$(document).on("blur","input[name='goods_number']",function(){
         var goods_number=$(this).val();
         var id=$(this).attr('id');
         $.post("/shop/index.php/Admin/Good/upgoodnum/",{id:id,goods_number:goods_number},function(obj){
         $("input[name='goods_number']").parent.html("<span id='goods_number' name='"+id+"'>"+goods_number+"</span>");
         });
         });*/
        $(document).on("blur","input[name='goods_number']",function(){
            var goods_number=$(this).val();   //获取值
            var id=$(this).attr('id');        //获取id
            $.post("/shop/index.php/Admin/Good/upgoodnum/",{id:id,goods_number:goods_number},function(obj){
                $("input[name='goods_number']").parent().html("<span id='goods_number' name='"+id+"'>"+goods_number+"</span>");
            });

        });
    });
</script>
<div class="form-div">
    <form action="" name="searchForm">
        <img src="/shop/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
        <!-- 分类 -->
        <select name="cat_id">
            <option value="0">所有分类</option>
            <option value="1">手机类型</option>
            <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;3G手机</option>
            <option value="5">&nbsp;&nbsp;&nbsp;&nbsp;双模手机</option>
            <option value="2">&nbsp;&nbsp;&nbsp;&nbsp;CDMA手机</option>
            <option value="3">&nbsp;&nbsp;&nbsp;&nbsp;GSM手机</option>
            <option value="12">充值卡</option>
            <option value="15">&nbsp;&nbsp;&nbsp;&nbsp;联通手机充值卡</option>
            <option value="13">&nbsp;&nbsp;&nbsp;&nbsp;小灵通/固话充值卡</option>
            <option value="14">&nbsp;&nbsp;&nbsp;&nbsp;移动手机充值卡</option>
            <option value="6">手机配件</option>
            <option value="11">&nbsp;&nbsp;&nbsp;&nbsp;读卡器和内存卡</option>
            <option value="7">&nbsp;&nbsp;&nbsp;&nbsp;充电器</option>
            <option value="8">&nbsp;&nbsp;&nbsp;&nbsp;耳机</option>
            <option value="9">&nbsp;&nbsp;&nbsp;&nbsp;电池</option>
        </select>

        <!-- <select name="c_id" onchange="hideCatDiv()">
                        <option value="">所有分类</option>
                        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["c_id"]); ?>"><?php echo ($val["html"]); echo ($val["c_type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                     </select> -->
        <!-- 品牌 -->
        <select name="b_id">
            <option value="">所有品牌</option>
            <?php if(is_array($arrb)): $i = 0; $__LIST__ = $arrb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["b_id"]); ?>"><?php echo ($val["b_brand"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--   <option value="1">诺基亚</option>
            <option value="10">金立</option>
            <option value="9">联想</option>
            <option value="8">LG</option>
            <option value="7">索爱</option>
            <option value="6">三星</option>
            <option value="5">夏新</option>
            <option value="4">飞利浦</option>
            <option value="3">多普达</option>
            <option value="2">摩托罗拉</option>
            <option value="11">  恒基伟业</option> -->
        </select>
        <!-- 推荐 -->
        <select name="intro_type">
            <option value="0">全部</option>
            <option value="is_best">精品</option>
            <option value="is_new">新品</option>
            <option value="is_hot">热销</option>
            <option value="is_promote">特价</option>
            <option value="all_type">全部推荐</option>
        </select>
        <!-- 上架 -->
        <select name="is_on_sale">
            <option value="">全部</option>
            <option value="1">上架</option>
            <option value="0">下架</option>
        </select>
        <!-- 关键字 -->
        关键字 <input type="text" name="keyword" size="15">
        <input type="submit" value=" 搜索 " class="button">
    </form>
</div>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
    <!-- start goods list -->
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tbody>
            <tr>
                <th><input type="checkbox" name='run' onclick="lian()">编号</th>
                <th>商品名称</th>
                <th>货号</th>
                <th>价格</th>
                <th>上架</th>
                <th>精品</th>
                <th>新品</th>
                <th>热销</th>
                <th>库存</th>
                <th>商品封面</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($re)): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                    <td><input type="checkbox" name="box" value="<?php echo ($val["g_id"]); ?>"><?php echo ($val["g_id"]); ?></td>
                    <td align="center" name="<?php echo ($val["g_id"]); ?>"><span id="g_name"><?php echo ($val["g_name"]); ?></span></td>
                    <td name="<?php echo ($val["g_id"]); ?>"><span id="g_sn"><?php echo ($val["g_sn"]); ?></span></td>
                    <td align="right" name="<?php echo ($val["g_id"]); ?>"><span id="shop_price"><?php echo ($val["shop_price"]); ?></span></td>
                    <td align="center">
                        <?php if($val["is_on_sale"] == 1): ?><a href="/shop/index.php/Admin/Good/up_sale/id/<?php echo ($val["g_id"]); ?>">是</a><?php else: ?><a href="/shop/index.php/Admin/Good/up_sale1/id/<?php echo ($val["g_id"]); ?>">否</a><?php endif; ?>
                    </td>
                    <td align="center"> <?php if($val["is_best"] == '1'): ?><a href="/shop/index.php/Admin/Good/up_best/id/<?php echo ($val["g_id"]); ?>">是</a><?php else: ?><a href="/shop/index.php/Admin/Good/up_best1/id/<?php echo ($val["g_id"]); ?>">否</a><?php endif; ?>
                    </td>
                    <td align="center"><?php if($val["is_new"] == '1'): ?><a href="/shop/index.php/Admin/Good/up_new/id/<?php echo ($val["g_id"]); ?>">是</a><?php else: ?><a href="/shop/index.php/Admin/Good/up_new1/id/<?php echo ($val["g_id"]); ?>">否</a><?php endif; ?></td>
                    <td align="center"><?php if($val["is_hot"] == '1'): ?><a href="/shop/index.php/Admin/Good/up_hot/id/<?php echo ($val["g_id"]); ?>">是</a><?php else: ?><a href="/shop/index.php/Admin/Good/up_hot1/id/<?php echo ($val["g_id"]); ?>">否</a><?php endif; ?></td>
                    <td align="center" name="<?php echo ($val["g_id"]); ?>"><span id='goods_number'><?php echo ($val["goods_number"]); ?></span></td>
                    <td><img src="/shop/<?php echo ($val["goods_img"]); ?>" alt="" height="80" width="80"/></td>
                    <td align="center">
                        <a href="../goods.php?id=32" target="_blank" title="查看"><img src="/shop/Public/Admin/images/icon_view.gif" width="16" height="16" border="0"></a>
                        <a href="goods.php?act=edit&amp;goods_id=32" title="编辑"><img src="/shop/Public/Admin/images/icon_edit.gif" width="16" height="16" border="0"></a>
                        <a href="goods.php?act=copy&amp;goods_id=32" title="复制"><img src="/shop/Public/Admin/images/icon_copy.gif" width="16" height="16" border="0"></a>
                        <a href="javascript:;" onclick="listTable.remove(32, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/shop/Public/Admin/images/icon_trash.gif" width="16" height="16" border="0"></a>
                        <a href="goods.php?act=product_list&amp;goods_id=32" title="货品列表"><img src="/shop/Public/Admin/images/icon_docs.gif" width="16" height="16" border="0"></a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <!-- end goods list -->

        <!-- 分页 -->
        <table id="page-table" cellspacing="0">
            <tbody>
            <tr>
                <td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
                    <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
                    <div id="turn-page">
                        总计  <span id="totalRecords">22</span>个记录分为 <span id="totalPages">2</span>页当前第 <span id="pageCurrent">1</span>
                        页，每页 <input type="text" size="3" id="pageSize" value="15" onkeypress="return listTable.changePageSize(event)">
						<span id="page-link">
							<a href="javascript:listTable.gotoPageFirst()">第一页</a>
							<a href="javascript:listTable.gotoPagePrev()">上一页</a>
							<a href="javascript:listTable.gotoPageNext()">下一页</a>
							<a href="javascript:listTable.gotoPageLast()">最末页</a>
							<select id="gotoPage" onchange="listTable.gotoPage(this.value)">
                                <option value="1">1</option><option value="2">2</option>          </select>
						</span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div>
        <input type="hidden" name="act" value="batch">
        <select name="type" id="selAction" onchange="changeAction()">
            <option value="">请选择...</option>
            <option value="trash">回收站</option>
            <option value="on_sale">上架</option>
            <option value="not_on_sale">下架</option>
            <option value="best">精品</option>
            <option value="not_best">取消精品</option>
            <option value="new">新品</option>
            <option value="not_new">取消新品</option>
            <option value="hot">热销</option>
            <option value="not_hot">取消热销</option>
            <option value="move_to">转移到分类</option>
            <option value="suppliers_move_to">转移到供货商</option>
        </select>

        <input type="hidden" name="extension_code" value="">
        <input type="submit" value=" 确定 " id="btnSubmit" name="btnSubmit" class="button" disabled="true">
    </div>
</form>

<div id="footer">
    版权所有 &copy; 2006-2013 传智播客 - PHP培训 -
</div>

</body>
</html>
<script>
    function lian(run,box){
        var run=document.getElementsByName('run')[0];
        var box=document.getElementsByName('box');
        var ajax=new XMLHttpRequest();
        ajax.open('get','good_list.html?run='+run+'&box='+box);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                for(var i=0;i<box.length;i++){
                    if(run.checked==true){
                        box[i].checked=true;
                    }
                    else{
                        box[i].checked=false;
                    }
                }
            }
        }
    }
</script>