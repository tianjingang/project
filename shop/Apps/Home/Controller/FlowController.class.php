<?php
namespace Home\Controller;
use Think\Controller;
class FlowController extends Controller{
    function flow(){
      $br=M('ecs_shop')->where(array('u_name'=>session('u_name')))->select();
        $this->assign('br',$br);
        $this->display();
    }
    function del(){
        $id=$_POST['g_id'];
        $res=M('ecs_shop')->where(array('g_id'=>$id))->delete();
        if($res){
           echo 1;;
        }
        else{
            echo 0;
        }
    }
    /*//价格变动
    function price(){
        $id=$_POST['g_id'];
        //echo $id;die;
        $a=M('ecs_shop')->where(array('g_id'=>$id))->find();
        $price_one=$a['goods_price'];
        $goods_number=$_POST['goods_number'];
        $price=$price_one* $goods_number;
        $re=M('ecs_shop')->where(array('g_id'=>$id))->save(array('goods_price'=>$price));
        if($re){
            echo 1;
        }
        else{
            echo 0;
        }

    }*/
    function flow2(){
        $br=M('ecs_shop')->where(array('u_name'=>session('u_name')))->select();
        $arr=D('ecs_address')->where(array('a_name'=>session('u_name')))->select();
        $this->assign('arr',$arr);
        $this->assign('br',$br);
        $this->display();
    }
    //生成订单
    function order(){
        $a_id=$_POST['a_id'];
       // echo $a_id;die;
        $ar=M('ecs_address')->where(array('a_id'=>$a_id))->find();
       // var_dump($ar);die;
        $a_address=$ar['a_address'];
        //echo $a_address;die;
        $a_name=$ar['a_name'];
        $a_phone=$ar['a_phone'];
        $br=M('ecs_shop')->where(array('u_name'=>session('u_name')))->find();
       // var_dump($br);die;
        $goods_img=$br['goods_img'];
        $goods_brief=$br['goods_brief'];
        $shop_price=$br['shop_price'];
        $goods_number=$br['goods_number'];
        $g_sn=date('Ymd').rand(1000,9999);
        $a_name=session('u_name');
        $data=array(
            "a_address"=>$a_address,
            "a_name"=> $a_name,
            "a_phone"=>$a_phone,
            "goods_img"=> $goods_img,
            "goods_brief"=>$goods_brief,
            "shop_price"=>$shop_price,
            "goods_number"=>$goods_number,
            "g_sn"=>$g_sn,
            "u_name"=>$a_name
        );
        //var_dump($data);die;
        $res=M('ecs_order')->add($data);
        if($res){
            echo 1;
        }
        else{
          echo 0;
        }
    }
    //订单详细信息
    function order_look(){
        $a_name=session('u_name');
        //echo $a_name;die;
        $r=M('ecs_order')->where(array('u_name'=>$a_name))->find();
        //echo M('ecs_order')->_sql();die;
        $this->assign('v',$r);
        $this->display();
    }
    function pays(){
        //var_dump($_GET);die;
        $shop_price=I('get.shop_price');
        $g_sn=I('get.g_sn');
        // ******************************************************配置 start*************************************************************************************************************************
//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者id，以2088开头的16位纯数字
        $alipay_config['partner']		= '2088002075883504';
//收款支付宝账号
        $alipay_config['seller_email']	= 'li1209@126.com';
//安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']			= 'y8z1t3vey08bgkzlw78u9cbc4pizy2sj';
//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
//签名方式 不需修改
        $alipay_config['sign_type']    = strtoupper('MD5');
//字符编码格式 目前支持 gbk 或 utf-8
//$alipay_config['input_charset']= strtolower('utf-8');
//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';
//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
// ******************************************************配置 end*************************************************************************************************************************

// ******************************************************请求参数拼接 start*************************************************************************************************************************
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'], // 合作身份者id
            "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
            "payment_type"	=> '1', // 支付类型
            "notify_url"	=> "http://www.tianjingang.com/shop/index.php/Home/Flow/payoff", // 服务器异步通知页面路径
            "return_url"	=> "http://www.tianjingang.com/shop/index.php/Home/Flow/pass", // 页面跳转同步通知页面路径
            "out_trade_no"	=> "$g_sn", // 商户网站订单系统中唯一订单号
            "subject"	=> "订单", // 订单名称
            "total_fee"	=> "0.01", // 付款金额
            "body"	=> "", // 订单描述 可选
            "show_url"	=> "", // 商品展示地址 可选
            "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            "exter_invoke_ip"	=> "", // 客户端的IP地址
            "_input_charset"	=> 'utf-8', // 字符编码格式
        );
// 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
                unset($parameter[$k]);
            }
        }
// 参数排序
        ksort($parameter);
        reset($parameter);

// 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . $alipay_config['key']);
        $parameter['sign_type'] = $alipay_config['sign_type'];
// ******************************************************请求参数拼接 end*************************************************************************************************************************


// ******************************************************模拟请求 start*************************************************************************************************************************
        $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
        foreach ($parameter as $k => $v) {
            $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
        }

        $sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

// ******************************************************模拟请求 end*************************************************************************************************************************

        echo $sHtml;
    }
    //支付成功
    function  pass(){
        $g_sn=I('get.g_sn');
       // $ar=M('ecs_order')->where(array('g_sn'=>$g_sn))->find();
       // $g_statue=$ar['g_statue'];
        $re=M('ecs_order')->where(array('g_sn'=>$g_sn))->save(array('g_statue'=>1));
        if($re){
            $this->redirect('Index/index');
        }
        else{
            echo 123;
        }


    }
    //支付失败
    function  payoff(){
        echo 000;

    }
}