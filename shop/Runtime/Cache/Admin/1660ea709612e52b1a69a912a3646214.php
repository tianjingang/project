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
    <span class="action-span"><a href="/shop/index.php/Admin/Good/good/">添加新商品</a></span>
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
			//alert('g_name');
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
        $(document).on("click","#goods_number",function(){  //找取商品节点
            var goods_number=$(this).html();    //获取值
            var id=$(this).parent().attr('name');//获取id
            $(this).parent().html("<input type='text' name='goods_number' id='"+id+"' value='"+goods_number+"'/>");
        });
         //执行修改
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
           <select name="c_id" onchange="hideCatDiv()" value="{search1}">
                        <option value="0">所有分类</option>
                        <?php if(is_array($rs)): $i = 0; $__LIST__ = $rs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["c_id"]); ?>"><?php echo ($v["html"]); echo ($v["c_type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                     </select> 
        <!-- 品牌 -->
        <select name="b_id" value="{search2}">
            <option value="">所有品牌</option>
            <?php if(is_array($ar)): $i = 0; $__LIST__ = $ar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["b_id"]); ?>"><?php echo ($val["b_brand"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <!-- 推荐 -->
        <select name="intro_type" value="{search3}">
            <option value="0">全部</option>
            <option value="is_best">精品</option>
            <option value="is_new">新品</option>
            <option value="is_hot">热销</option>
            <option value="is_promote">特价</option>
            <option value="all_type">全部推荐</option>
        </select>
         <!-- 上架 -->
        <select name="is_on_sale" value="{search1}">
            <option value="">全部</option>
            <option value="1">上架</option>
            <option value="0">下架</option>
        </select>
        <!-- 关键字 -->
        关键字 <input type="search" name="search" value="<?php echo ($search); ?>" size="15">
        <input type="submit" value=" 搜索 " onclick="search()">
    </form>
</div>
<script>
    function search(){
        //接收所要搜索的值
        var search=document.getElementsByName('search')[0].value;
        //创建ajax对象
        var ajax=new XMLHttpRequest();
        ajax.open('get',"/shop/index.php/Admin/Good/good_list/search/"+search);
        ajax.send();
        ajax.onreadystatechange=function(){
            if(ajax.readyState==4&&ajax.status==200){
                document.getElementById('div1').innerHTML=ajax.responseText;
            }
        }
    }
</script>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
    <!-- start goods list -->
    <div class="list-div" id="listDiv">
        <div id="div1">
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
            <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
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
                    <a href="/shop/index.php/Admin/Good/good_one/id/<?php echo ($val["g_id"]); ?>/" target="_blank" title="查看"><img src="/shop/Public/Admin/images/icon_view.gif" width="16" height="16" border="0"></a>
                    <!-- <a href="goods.php?act=edit&amp;goods_id=32" title="编辑"><img src="/shop/Public/Admin/images/icon_edit.gif" width="16" height="16" border="0"></a> -->
                    <a href='javascript:;' class="del" id="<?php echo ($val["g_id"]); ?>" title="删除"><img src="/shop/Public/Admin/images/icon_copy.gif" width="16" height="16" border="0"></a>
                    <a href="/shop/index.php/Admin/Good/up_statue1/id/<?php echo ($val["g_id"]); ?>"><img src="/shop/Public/Admin/images/icon_trash.gif" width="16" height="16" border="0"></a>
                    <a href="goods.php?act=product_list&amp;goods_id=32" title="货品列表"><img src="/shop/Public/Admin/images/icon_docs.gif" width="16" height="16" border="0"></a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </div>
        <?php echo ($page); ?>
        <!-- end goods list -->

        <!-- 分页 -->
        <!--<table id="page-table" cellspacing="0">
            <tbody>
            <tr>
                <td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
                    &lt;!&ndash; $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ &ndash;&gt;
                    <div id="turn-page">
                        总计  <span id="totalRecords">22</span>个记录分为 <span id="totalPages">2</span>页当前第 <span id="pageCurrent">1</span>
                        页，每页 <input type="text" size="3" id="pageSize" value="15" onkeypress="return listTable.changePageSize(event)">
						<span id="page-link">
                            <input type="hidden" id="page" value="1"/>
                            <input type="hidden" id="total" value="<?php echo ($total); ?>"/>
                            <a href="javascript:;" nowpage="1">首页</a>
                            <a href="javascript:;" nowpage="2">上一页</a>
                            <a href="javascript:;" nowpage="3">下一页</a>
                            <a href="javascript:;" nowpage="4">尾页</a>
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
</html>-->
        <!--<table id="page-table" cellspacing="0">
            <tbody>
            <tr>
                <td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
                    &lt;!&ndash; $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ &ndash;&gt;
                    <div id="turn-page">
                        总计  <span id="totalRecords">22</span>个记录分为 <span id="totalPages">2</span>页当前第 <span id="pageCurrent">1</span>
                        页，每页 <input type="text" size="3" id="pageSize" value="15" onkeypress="return listTable.changePageSize(event)">
						<span id="page-link">
                             <input type="hidden" id="page" value="1"/>
                             <input type="hidden" id="total" value="<?php echo ($total); ?>"/>
							<a href="javascript:;" nowpage="1">第一页</a>
							<a href="javascript:;" nowpage="2">上一页</a>
							<a href="javascript:;" nowpage="3">下一页</a>
							<a href="javascript:;" nowpage="4">最末页</a>
                            <script src="/shop/Public/Admin/js/jquery-1.7.2.min.js"></script>
							<select id="gotoPage" onchange="listTable.gotoPage(this.value)">
                                <option value="1">1</option><option value="2">2</option></select>
						</span>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>-->
        <!--<script>
            $(function(){
                $('a').click(function(){
                    //找到当前页码对象
                    var pageobj=$('#page');
                    //找到总页数
                    var totalobj=$('#total');
                    //找到每个a标签
                    page=$(this).attr('nowpage');
                    nowpage = pageobj.val();
                    nowtotal= totalobj.val();
                    //定义now
                    now=1;
                    if(page==2){
                        now=nowpage-1<1?1:nowpage-1;
                    }else if(page==3){
                        now=nowpage*1+1>nowtotal?nowtotal:nowpage*1+1;
                    }else if(page==4){
                        now=nowtotal;
                    }
                    $.getJSON("/shop/index.php/Admin/Good/goods_list",{page:now  },function(msg){
                        str="<tr><th>编号</th><th>商品名称</th><th>货号</th><th>价格</th><th>上架</th><th>精品</th><th>新品</th><th>热销</th><th>库存</th><th>封面</th></tr>";
                        for(var i=0;i<msg.length;i++){
                            str+="<tr><td align='center'>"+msg[i].g_id+"</td><td align='center'>"+msg[i].g_name+"</td><td align='center'>"+msg[i].g_sn+"</td><td align='center'>"+msg[i].shop_price+"</td><td align='center'>"+msg[i].market_price+"</td><td align='center'><img src='/shop<?php echo ($val["goods_img"]); ?>' width='60px;' height='20px'/></td><td>+msg[i].warn_number+</td><td>+</td><td>+msg[i].is_best+</td><td>+msg[i].is_new+</td><td>+msg[i].is_hot+</td><td>+msg[i].is_on_sale+</td><td>+msg[i].is_keywords+</td><td>+msg[i].goods_brief+</td><td><a href='/shop/index.php/Admin/Good/good_one/id/<?php echo ($val["g_id"]); ?>' target='_blank' title='查看'><img src='/shop/Public/Admin/images/icon_view.gif' width='16' height='16' border='0'></a></td></tr>";
                        }
                        $('#list').html(str);
                        pageobj.val(now);
                    });

                })
            })
        </script>-->

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