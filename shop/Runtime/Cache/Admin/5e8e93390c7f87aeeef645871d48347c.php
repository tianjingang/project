<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <link href="/shop/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/shop/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/shop/Public/Admin/js/utils.js"></script>
    <script type="text/javascript" src="/shop/Public/Admin/js/selectzone.js"></script>
    <script type="text/javascript" src="/shop/Public/Admin/js/colorselector.js"></script>
    <script type="text/javascript" src="/shop/Public/Admin/js/calendar.php?lang="></script>
    <script src="/shop/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script>
     $(function(){
        //点击 << 按钮消失
       /* $(document).on("click","#tuihui",function(){
            var g_sort = $("#g_sort");
            g_sort.nextAll().remove();
        });
        //点击确定按钮开始添加分类
        $(document).on('click',"#center",function(){
            //获取前边文本框的值
            var s_name = $("input[name='s_name']").val();
            //获取下拉框的值
            var g_sid = $("select[name='g_sid']").val();
            if(s_name=="")
            {
                alert("分类名称不能为空");
            }
            else
            {
                //添加顶级分类
                if(g_sid=="")
                {
                    $.ajax({
                        type:'post',
                        url:'/shop/index.php/Admin/Good/addgoodssort/',
                        data:{
                            s_name:s_name
                        },
                        dataType:'json',
                        success:function(data)
                        {
                            var str="";
                            if(data)
                            {
                                $("#g_sort").nextAll().remove();
                                for(var i=0;i<data.length;i++)
                                {
                                    str = str+"<option value='"+data[i].s_id+"' selected >"+data[i].s_name+"</option>";
                                }
                                $("select[name='g_sid']").html("<option value=''>请选择</option>"+str);
                            }
                        }
                    });
                }
                //添加子分类
                else
                {
                    $.ajax({
                        type:'post',
                        url:'/shop/index.php/Admin/Good/addsortson/',
                        data:{
                            g_sid:g_sid,
                            s_name:s_name
                        },
                        dataType:'json',
                        success:function(data)
                        {
                            var str="";
                            $("#g_sort").nextAll().remove();
                            for(var i=0;i<data.length;i++)
                            {
                                str = str+"<option value='"+data[i].s_id+"' selected >"+data[i].html+data[i].s_name+"</option>";
                            }
                            $("select[name='g_sid']").html("<option value=''>请选择</option>"+str);
                        }
                    });
                }
            }
        });
        //向上取整数
        $("#qint").click(function(){
            var g_marketprice = $("input[name='g_marketprice']").val();
            var num = Math.ceil(g_marketprice)+".00";
            $("input[name='g_marketprice']").val(num);
        });
        });

       //查询
         $("#g_sort").click(function(){
         var con = "<span><input style='width:80px;' name='s_name' type='text' /><a class='special' id='center' title='确定'  href='javascript:void(0)'> 确定 </a><a class='special' title='分类管理'  href='javascript:void(0)'>分类管理</a><a class='special' title='隐藏' href='javascript:void(0)' id='tuihui'><<</a></span>"
         var g_sort = $(this);
         g_sort.after(con);

         });
         //点击 << 按钮消失
         $(document).on("click","#tuihui",function(){
         var g_sort = $("#g_sort");
         g_sort.nextAll().remove();
         });
         //点击确定按钮开始添加分类
         $(document).on('click',"#center",function(){
         //获取前边文本框的值
         var s_name = $("input[name='s_name']").val();
         //获取下拉框的值
         var g_sid = $("select[name='g_sid']").val();
         if(s_name=="")
         {
         alert("分类名称不能为空");
         }
         else
         {
         //添加顶级分类
         if(g_sid=="")
         {
         $.ajax({
         type:'post',
         url:'/shop/index.php/Admin/Good/addgoodssort/',
         data:{
         s_name:s_name
         },
         dataType:'json',
         success:function(data)
         {
         var str="";
         if(data)
         {
         $("#g_sort").nextAll().remove();
         for(var i=0;i<data.length;i++)
         {
         str = str+"<option value='"+data[i].s_id+"' selected >"+data[i].s_name+"</option>";
         }
         $("select[name='g_sid']").html("<option value=''>请选择</option>"+str);
         }
         }
         });
         }
         //添加子分类
         else
         {
         $.ajax({
         type:'post',
         url:'/shop/index.php/Admin/Good/addsortson/',
         data:{
         g_sid:g_sid,
         s_name:s_name
         },
         dataType:'json',
         success:function(data)
         {
         var str="";
         $("#g_sort").nextAll().remove();
         for(var i=0;i<data.length;i++)
         {
         str = str+"<option value='"+data[i].s_id+"' selected >"+data[i].html+data[i].s_name+"</option>";
         }
         $("select[name='g_sid']").html("<option value=''>请选择</option>"+str);
         }
         });
         }
         }
         });
         //向上取整数
         $("#qint").click(function(){
         var g_marketprice = $("input[name='g_marketprice']").val();
         var num = Math.ceil(g_marketprice)+".00";
         $("input[name='g_marketprice']").val(num);
         });
         });*/
        //分类弹框
        $("#g_sort").click(function(){
            $(this).nextAll().remove();
            var con = "<span><input style='width:80px;' name='s_name' type='text'  /><a class='special' id='center' title='确定'  href='javascript:void(0)'> 确定 </a><a class='special' title='分类管理'  href='javascript:void(0)'>分类管理</a><a class='special' title='隐藏' href='javascript:void(0)' id='tuihui'><<</a></span>";
            var g_sort = $(this);
            g_sort.after(con);
        });
        //验证分类不能为空
        $(document).on("click","#center",function(){
            var val = $("input[name='s_name']").val();
            if(val=="")
            {
                alert('分类名称不能为空！');
            }
            else{

                //添加顶级分类
                if(c_id=="")
                {
                    $.ajax({
                        type:'post',
                        url:'/shop/index.php/Admin/Good/addgoodssort/',
                        data:{
                            s_name:s_name
                        },
                        dataType:'json',
                        success:function(data)
                        {
                            var str="";
                            if(data)
                            {
                                $("#g_sort").nextAll().remove();
                                for(var i=0;i<data.length;i++)
                                {
                                    str = str+"<option value='"+data[i].c_id+"' selected >"+data[i].s_name+"</option>";
                                }
                                $("select[name='c_id']").html("<option value=''>请选择</option>"+str);
                            }
                        }
                    });
                }
                //添加子分类
                else
                {
                    $.ajax({
                        type:'post',
                        url:'/shop/index.php/Admin/Good/addsortson/',
                        data:{x
                            c_id:c_id,
                            s_name:s_name
                        },
                        dataType:'json',
                        success:function(data)
                        {
                            var str="";
                            $("#c_id").nextAll().remove();
                            for(var i=0;i<data.length;i++)
                            {
                                str = str+"<option value='"+data[i].c_id+"' selected >"+data[i].html+data[i].s_name+"</option>";
                            }
                            $("select[name='c_id']").html("<option value=''>请选择</option>"+str);
                        }
                    });
                }
            }
        });
        //分类收起
        $(document).on('click',"#tuihui",function(){
            var g_sort = $("#g_sort");
            g_sort.next().remove();
        });
        //品牌弹框
        $("#g_type").click(function(){
            $(this).nextAll().remove();
            var con = "<span><input style='width:80px;' name='t_name' type='text'  /><a class='special' id='center' title='确定'  href='javascript:void(0)'> 确定 </a><a class='special' title='分类管理'  href='javascript:void(0)'>分类管理</a><a class='special' title='隐藏' href='javascript:void(0)' id='tuichu'><<</a></span>";
            var g_type = $(this);
            g_type.after(con);
        });
        //品牌分类不能为空
        $(document).on("click","#center",function(){
            var val = $("input[name='t_name']").val();
            if(val=="")
            {
                alert('品牌名称不能为空！');
            }
        });
        //品牌分类收起
        $(document).on('click',"#tuichu",function(){
            var g_type = $("#g_type");
            g_type.next().remove();
        });
    }); 
    </script>

</head>
<body>
<h1>
    <span class="action-span"><a href="/shop/index.php/Admin/Good/good_list">商品列表</a></span>
    <span class="action-span1"><a href="index.php?act=main">SHOP 管理中心 </a> </span><span id="search_id" class="action-span1"> - 编辑商品信息 </span>
    <div style="clear:both"></div>
</h1>

<div class="tab-div">
    <!-- tab bar -->
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="general-tab">通用信息</span>
           
    </p>
    </div>
    <!-- tab body -->
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="/shop/index.php/Admin/Good/good_add/" method="post" name="theForm">
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
            <!-- 通用信息 -->
            <table width="90%" id="general-table" align="center" style="display: table;">
                <tbody>
                <tr>
                    <td class="label">商品名称：</td>
                    <td><input type="text" name="g_name"  size="30"><span class="require-field">*</span></td>
                </tr>
                <tr>
                    <td class="label">商品货号： </td>
                    <td><input type="text" name="g_sn"  size="20" onblur="checkGoodsSn(this.value,'32')"><span id="goods_sn_notice"></span><br>
                        <span class="notice-span" style="display:block" id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
                </tr>
                
                <tr>
                    <td class="label">商品分类：</td>
                    <td>
                        <select name="c_id" onchange="hideCatDiv()">
                        <option value="">请选择</option> 
                        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["c_id"]); ?>"><?php echo ($val["html"]); echo ($val["c_type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                     </select>
                        <a class="special" title="添加分类" id="g_sort" href="javascript:void(0)">添加分类</a> 
                    </td>
                </tr>
                <tr>
                    <td class="label">商品品牌：</td>
                    <td>
                        <select name="b_id" onchange="hideBrandDiv()">
                            <option value="">请选择</option> 
                            <?php if(is_array($arr1)): $i = 0; $__LIST__ = $arr1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["b_id"]); ?>"><?php echo ($v["b_brand"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <a class="special" title="添加分类" id="g_type" href="javascript:void(0)">添加分类</a> 
                    </td>
                </tr>
                <tr>
                    <td class="label">本店售价：</td>
                    <td><input type="text" name="shop_price"  size="20" onblur="priceSetted()">
                        <input type="button" value="按市场价计算" onclick="marketPriceSetted()">
                        <span class="require-field">*</span></td>
                </tr>
               <tr>
                    <td class="label">市场售价：</td>
                    <td><input type="text" name="market_price"  size="20">
                        <input type="button" value="取整数" onclick="integral_market_price()">
                    </td>
                </tr>
                <tr>
                    <td class="label">上传商品图片：</td>
                    <td>
                        <input type="file" name="goods_img" size="35">
                    </td>
                </tr>
                <tr>
                    <td class="label"><a href="javascript:showNotice('noticeStorage');" title="点击此处查看提示信息"><img src="/shop/Public/Admin/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商品库存数量：</td>
                    <!--            <td><input type="text" name="goods_number" value="4" size="20" readonly="readonly" /><br />-->
                    <td><input type="text" name="goods_number"  size="20"><br>
                        <span class="notice-span" style="display:block" id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
                </tr>
                <tr>
                    <td class="label">库存警告数量：</td>
                    <td><input type="text" name="warn_number"  size="20"></td>
                </tr>
                <tr>
                    <td class="label">加入推荐：</td>
                    <td><input type="checkbox" name="is_best" value="1">精品
                        <input type="checkbox" name="is_new" value="1">新品
                        <input type="checkbox" name="is_hot" value="1">热销
                    </td>
                </tr>
                <tr id="alone_sale_1">
                    <td class="label" id="alone_sale_2">上架：</td>
                    <td id="alone_sale_3">
					<input type="checkbox" name="is_on_sale" value="1" > 打勾表示允许销售，否则不允许销售。</td>
                </tr>
                <tr>
                    <td class="label">商品关键词：</td>
                    <td><input type="text" name="keywords"  size="40"> 用空格分隔</td>
                </tr>
                <tr>
                    <td class="label">商品简单描述：</td>
                    <td><textarea name="goods_brief" cols="40" rows="3"></textarea></td>
                </tr>
               </tbody></table>
            <div class="button-div">
                <input type="hidden" name="goods_id" value="32">
               <input type="submit" value="确定"/>
                <!-- <input type="button" value=" 确定 " class="button" onclick="validate('32')">-->
              <input type="reset" value=" 重置 " class="button">
          </div>
          <input type="hidden" name="act" value="update">
      </form>
  </div>
</div>


<div id="footer">
  版权所有 &copy; 2006-2013 传智播客 - PHP培训 -
</div>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript">
  function addImg(obj){
      var src  = obj.parentNode.parentNode;
      var idx  = rowindex(src);
      var tbl  = document.getElementById('gallery-table');
      var row  = tbl.insertRow(idx + 1);
      var cell = row.insertCell(-1);
      cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addImg)(.*)(\[)(\+)/i, "$1removeImg$3$4-");
  }

  function removeImg(obj){
      var row = rowindex(obj.parentNode.parentNode);
      var tbl = document.getElementById('gallery-table');
      tbl.deleteRow(row);
  }

  function dropImg(imgId){
      Ajax.call('goods.php?is_ajax=1&act=drop_image', "img_id="+imgId, dropImgResponse, "GET", "JSON");
  }

  function dropImgResponse(result){
      if (result.error == 0){
          document.getElementById('gallery_' + result.content).style.display = 'none';
      }
  }

</script>
</body>
</html>
<script>
    $(function(){
        //alert(123)
        $("input[name='g_sn']").blur(function(){
            //alert('ssss');
            var g_sn = $(this).val();
           // alert(g_sn);
            if(g_sn=='')
            {
                var str = Array('esc','asd','sss');
                for(var i=0;i<str.length;i++){
                    //alert(Math.random().str[i]);
                    $('input[name="g_sn"]').val("ESC"+parseInt(Math.random()*9999999));
                }
//                $('input[name="g_sn"]').val(parseInt(Math.random()*999999999));
            }
        })
    })


</script>