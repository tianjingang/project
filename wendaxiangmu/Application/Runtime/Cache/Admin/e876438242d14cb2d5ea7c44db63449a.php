<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script>
        $(function(){
            $('form').submit(function(e){
                $('input[name="c_name"]').next().remove();
                if($('input[name="c_name"]').val()==''){
                    $('input[name="c_name"]').after("<span class='error'>子分类名称不能为空</span>")
                    e.preventDefault();
                }
            })
        });
    </script>
</head>
<body>
<center>
    <form action="<?php echo U('Category/addsun');?>" method="post">
        <table class="table">
            <h1>添加子分类</h1>
            <tr>
                <td align="right" width="45%">分类名称：</td>
                <td><input type="text" name="c_name"></td>
            </tr>
            <tr>
                <input type="hidden" name="pid" value="<?php echo I('get.id');?>"/>
                <td colspan="2" align="center"><input type="submit" value="分类添加" class="submit"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>