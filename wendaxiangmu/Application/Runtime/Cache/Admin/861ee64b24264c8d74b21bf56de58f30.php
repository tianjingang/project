<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/wendaxiangmu/Public/Admin/js/index.js"></script>
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/public.css">
    <link rel="stylesheet" href="/wendaxiangmu/Public/Admin/css/index.css">
    <center>
    <form action="/wendaxiangmu/index.php/Admin/Reword/upgold/" method="post">
    <table>
        <tr>
            <td>回答</td>
            <td>+<input type="text" name="ANSWER" value="<?php echo C('ANSWER');?>"/></td>
        </tr>
        <tr>
            <td>回答被采纳</td>
            <td>+<input type="text" name="ANSWER_R" value="<?php echo C('ANSWER_R');?>"/></td>
        </tr>
        <tr>
            <td>回答被删除</td>
            <td>-<input type="text" name="ANSWER_D" value="<?php echo C('ANSWER_D');?>"/></td>
        </tr>
        <tr>
            <td>提问被删除</td>
            <td>-<input type="text" name="QUESTION_R" value="<?php echo C('QUESTION_R');?>"/></td>
        </tr>
        <tr>
            <td>采纳回答被删除</td>
            <td>提问者:-<input type="text" name="QUESTIONER" value="<?php echo C('QUESTIONER');?>"/>回答者:-<input type="text" name="ANSWERER" value="<?php echo C('ANSWERER');?>"/></td>
        </tr>
        <tr>
           <td><input type="submit" value="保存修改"/></td>
        </tr>
    </table>
</form>
</center>