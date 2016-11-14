<?php if (!defined('THINK_PATH')) exit();?><form action="/php3xiangmu/index.php/Admin/Index/wmv_show/" method="post" enctype="multipart/form-data">
    <div id="div">
    <table border="0">

        <tr>
            <?php if(is_array($arr)): $key = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><th>
                    序号<?php echo ($val["id"]); ?><br/>
                    影视名称<?php echo ($val["w_name"]); ?><br/>
                    影视内容<br/><video src="/php3xiangmu<?php echo ($val["w_wmv"]); ?>" controls  width="200" height="100"></video><br/>
                    热度指数<?php echo ($val["w_row"]); ?><br/>
                    观看次数<?php echo ($val["w_count"]); ?><br/>
                    是否推荐<?php echo ($val["w_controduct"]); ?><br/>
                    片长时间<?php echo ($val["w_time"]); ?><br/>
                    主演人<?php echo ($val["w_man"]); ?><br/>
                    <a href="/php3xiangmu/index.php/Admin/Index/del/id/<?php echo ($val["id"]); ?>">删除</a>&nbsp;&nbsp;&nbsp;<a href="javascript:del(<?php echo ($val["id"]); ?>)">ajax删除</a>
                </th>
                <?php if(($key+1)%3 == 1): ?></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </table>
        </div>
</form>
<script>
    function del(id){

        var ajax = new XMLHttpRequest();
        ajax.open('get',"/php3xiangmu/index.php/Admin/Index/del/id/"+id);
        ajax.send();
        ajax.onreadystatechange = function () {
            if(ajax.readyState == 4&& ajax.status == 200 ){
                document.getElementById('div').innerHTML=ajax.responseText;
            }
        }

    }
</script>