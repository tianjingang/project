<?php if (!defined('THINK_PATH')) exit();?><center>
    <div id="div1">
        <input type="search" name="search" value="<?php echo ($search); ?>" placeholder="请输入主演人名字关键字"/>
        <input type="search" name="search1" value="<?php echo ($search1); ?>" placeholder="请输入电影名字关键字"/>
        <button onclick="search()">搜索</button>
    <table border="1">
        <tr>
            <td>序号</td>
            <td>影视名称</td>
            <td>影视内容</td>
            <td>热度指数</td>
            <td>观看次数</td>
            <td>是否推荐</td>
            <td>片长时间</td>
            <td>主演人</td>
        </tr>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["w_name"]); ?></td>
                <td><video src="/php3xiangmu<?php echo ($val["w_wmv"]); ?>" controls  width="200" height="100"></video>
                </td>
                <td><?php echo ($val["w_row"]); ?></td>
                <td><?php echo ($val["w_count"]); ?></td>
                <td><?php echo ($val["w_controduct"]); ?></td>
                <td><?php echo ($val["w_time"]); ?></td>
                <td><?php echo ($val["w_man"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
<?php echo ($show); ?>
    </div>
    </center>
<script>
    function search(){
        var search = document.getElementsByName('search')[0].value;
        var search1 = document.getElementsByName('search1')[0].value;
        var ajax = new XMLHttpRequest();
        ajax.open('get',"/php3xiangmu/index.php/Admin/Index/search_w/search/"+search+'/search1/'+search1);
        ajax.send();
        ajax.onreadystatechange = function () {
            if(ajax.readyState == 4&& ajax.status == 200){
                document.getElementById('div1').innerHTML = ajax.responseText;
            }
        }
    }
</script>