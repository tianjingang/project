<?php
header("content-type:text/html;charset=utf-8");
//获得code
$code=$_GET['code'];
//获取access_token
$arr=file_get_contents("https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101307013&client_secret=838471f08a0470d2a9ba425f68167c1e&code=$code&redirect_uri=http://1.alihw.applinzi.com/info.php");
//print_r($arr);die;
$arr=explode('=',$arr);
$arr=explode('&',$arr[1]);
$access_token=$arr[0];
//print_r($access_token);die;
//获取openid
$url="https://graph.qq.com/oauth2.0/me?access_token=$access_token";
$openid=file_get_contents($url);
//print_r($openid);die;
$str=substr($openid,45,32);
//print_r($str);
//获取用户信息
$url1="https://graph.qq.com/user/get_user_info?access_token=$access_token&oauth_consumer_key=101307013&openid=$str";
$info=file_get_contents($url1);
$user=json_decode($info,true);
$name = $user['nickname'];
$img = $user['figureurl'];
echo "<img src='$img'>".$name."<a href='https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101307013&redirect_uri=http://1.alihw.applinzi.com/info.php'>退出</a>";
//print_r($user);
