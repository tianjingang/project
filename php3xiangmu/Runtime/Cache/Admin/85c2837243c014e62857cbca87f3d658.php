<?php if (!defined('THINK_PATH')) exit();?><center>
    <div id="div1">
    类型:<input type="search" name="search" value="<?php echo ($search); ?>" placeholder="请输入类型关键字"/>
        名字:<input type="search" name="search1" value="<?php echo ($search1); ?>" placeholder="请输入名字关键字"/>
        <button onclick="search()">搜索</button>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>类型</td>
            <td>名字</td>
            <td>电影封面</td>
        </tr>
        <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($val["id"]); ?></td>
                <td><?php echo ($val["v_type"]); ?></td>
                <td><?php echo ($val["v_name"]); ?></td>
                <td><img src="/php3xiangmu/<?php echo ($val["photo"]); ?>" height="80" width="80"/></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
<?php echo ($show); ?>
    </div>
<script>
    function search(){
        var search = document.getElementsByName('search')[0].value;
        var search1 = document.getElementsByName('search1')[0].value;
        var ajax = new XMLHttpRequest();
        ajax.open('get',"/php3xiangmu/index.php/Admin/Index/search_p/search/"+search+'/search1/'+search1);
        ajax.send();
        ajax.onreadystatechange = function () {
            if(ajax.readyState == 4&& ajax.status == 200){
                document.getElementById('div1').innerHTML = ajax.responseText;
            }
        }
    }
</script>
    </center>