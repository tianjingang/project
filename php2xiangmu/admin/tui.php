<?php
header('content-type:text/html;charset=utf8');
setcookie('u_name','',time()-1);
header('refresh:2;url=login.php');




?>