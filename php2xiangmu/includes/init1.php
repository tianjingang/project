<?php
header("content-type:text/html;charset=utf-8;");

// 连接数据库
error_reporting(E_ERROR | E_WARNING | E_PARSE);

mysql_connect('127.0.0.1','root','root') or die('连接失败');

// 选择数据库
mysql_select_db('php2');

// 设定字符集
mysql_query("set names utf8");
$sql="select * from tilie ";
$res=mysql_query($sql);

// 开启SESSION
// session_start();

/** 定义项目根目录 */
define("ROOT_PATH", __DIR__);

/** 引入文件 */
require ROOT_PATH ."/func.php";



?>