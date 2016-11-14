<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form action="notice_do.php" method="post" enctype="multipart/form-data" onsubmit="return checkall()">
    <table>
        <tr>
            <td>题目名字</td>
            <td><input type="text" name="t_name" onblur="checkname()"/><span id="sp1"></span></td>
        </tr>
        <tr>
            <td>选择文件</td>
            <td><input type="file" name="filename"/></td>
        </tr>
        <tr>
            <td>题目简介</td>
            <td><textarea cols="10" rows="5" name="content" onclick="checkcontent()"></textarea><span id="sp2"></span></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="上传"/></td>
        </tr>
    </table>
    <p><a href="index.php">返回主页</a></p>
</form>
<script>
    //验证题目名字
    function checkname(){
        var t_name=document.getElementsByName('t_name')[0].value;
        var sp1=document.getElementById('sp1');
        if(t_name==''){
            sp1.innerHTML="不能为空";
            sp1.style.color="red";
            return false;
        }
        else{
            sp1.innerHTML="ok";
            sp1.style.color="red";
            return true;
        }
    }
    //验证题目简介
    function checkcontent(){
        var content=document.getElementsByName('content')[0].value;
        var sp2=document.getElementById('sp2');
        if(content==''){
            sp2.innerHTML="不能为空";
            sp2.style.color="red";
            return false;
        }
        else{
            sp2.innerHTML="ok";
            sp2.style.color="red";
            return true;
        }
    }
    //验证所有
    function checkall(){
        if(checkname()&checkcontent()){
            return true;
        }
        else{
            return false;
        }
    }
</script>
</body>
</html>