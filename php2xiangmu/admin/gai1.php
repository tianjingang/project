<?php
header('content-type:text/html;charset=utf8');
if(!empty($_POST)){
    $id=$_POST['id'];
    $order=$_POST['order'];
    $timu=$_POST['timu'];
    $filename=$_FILES['filename'];
    $self=$_POST['self'];
    //临时文件路径
    $tmp_name=$filename['tmp_name'];
    //指定文件路径
    $path='image/'.$filename['name'];
    //移动文件路径
    move_uploaded_file($tmp_name,$path);
    $link=mysqli_connect("127.0.0.1","root","root","php2");
    mysqli_query($link,'set names utf8');
    $sql="update tilie set id='$order',t_name='$timu',t_file='$path',content='$self' where id='$id'";
    $re=mysqli_query($link,$sql);
    if($re){
        echo "编辑成功";
        header('refresh:1;index.php');
    }
    else{
        echo "编辑失败";
        header('refresh:1;index.php');
    }


}
else{
    echo "非法访问";
}





?>