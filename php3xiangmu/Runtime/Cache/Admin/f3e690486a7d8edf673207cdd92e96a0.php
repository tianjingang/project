<?php if (!defined('THINK_PATH')) exit();?><center>
<div id="div1">
    <input type="search" name="search" value="<?php echo ($search); ?>" placeholder="请输入影视名字关键字"/><button onclick="search()">搜索</button>
    <table border="1">
        <tr>
            <td>序号</td>
            <td>评论分数</td>
            <td>评论内容</td>
            <td>评论影名</td>
        </tr>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["ping_num"]); ?></td>
                <td><?php echo ($val["ping_han"]); ?></td>
                <td><?php echo ($val["ping_name"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <?php echo ($show); ?>
</div>
    </center>
<script>
    function search(){
        var search = document.getElementsByName('search')[0].value;
        var ajax = new XMLHttpRequest();
        ajax.open('get',"/php3xiangmu/index.php/Admin/Index/ping_fs/search/"+search);
        ajax.send();
        ajax.onreadystatechange = function () {
            if(ajax.readyState == 4&& ajax.status == 200){
                document.getElementById('div1').innerHTML = ajax.responseText;
            }
        }
    }
</script>