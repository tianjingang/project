<?php
header('content-type:text/html;charset=utf8');
$url="http://api.k780.com:88/?app=weather.future&weaid=1&&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json";
$arr=file_get_contents($url);
$res=json_decode($arr,true);
//var_dump($res);
foreach($res['result'] as $key=>$val){
    $this->db->insert('tianqi',$val);
}
?>
<script>alert('读取成功');location.href='<?php echo site_url('Index/tianshou')?>'</script>