<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shopping extends CI_Controller {
	/*
		@个人中心控制器
		@Name Wyf.
		@Date 2016/05/18
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Base_model");  //加载
		$this->load->model('Agoods_model');
		$this->load->model("Aarea_model");
		$this->load->model("Haddress_model");
		$this->load->model("Hshoppingcar_model");
		$this->load->model("Hindent_model");
	}
	public function address()  //跳转添加收货地址页面
	{
		$res['list'] = $this->Aarea_model->sel_where("parent_id=0");
		$uid = $this->session->id;  //获取session  id
		$res['res'] = $this->Haddress_model->sel_where("u_id='$uid'");
		$count = count($res['res']);
		$res['count'] = $count;
		$this->load->view('Shopping/address.html',$res);
	}
	public function mycar()  //跳转我的购物车页面
	{
		$this->load->view('Shopping/mycar.html');
	}
	public  function set()  //加入购物车后减去相应的件数
	{
		$kucun = $this->input->post('kucun');
		$num = $this->input->post('num');
		$id = $this->input->post('id');
		$arr = array(
			'g_kucun' =>$kucun-$num
			);
		$res = $this->Agoods_model->update("id='$id'",$arr);
		if($res)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function shoppingcar()  //添加购物车页面
	{
		$gid = $this->input->get('id');		//接收商品id
		$num = $this->input->get('num');  //接收数量
		$res = $this->Agoods_model->sel_find("id='$gid'");   //根据商品id查询单条
		$price = $res['g_selfprice'];  //获取商品单价
		$sumprice = $price*$num;	//获取商品总价格
		$uid = $this->session->id;  //获取session id
		$find = $this->Hshoppingcar_model->sel_find("uid='$uid' and gid='$gid'");  //查询库里还有没有相同的商品
		if($find)
		{
			$nums = $find['num'];  //获取商品的个数
			$count = $num+$nums;  //获取新的个数
			$sumprice = $count*$price;  //获取更改后的总价格44
			$data = array(
				'uid'=>$uid,
				'gid'=>$gid,
				'price'=>$price,
				'sumprice'=>$sumprice,
				'num'=>$count
			);
			$res = $this->Hshoppingcar_model->update("gid='$gid'",$data);
			if($res)
			{
				echo "<script>alert('添加购物车成功！');location.href='shoppinglist'</script>";
			}
		}
		else
		{
			$data = array(
				'uid'=>$uid,
				'gid'=>$gid,
				'price'=>$price,
				'sumprice'=>$sumprice,
				'num'=>$num
			);
			$res = $this->Hshoppingcar_model->add($data);
			if($res)
			{
				echo "<script>alert('添加购物车成功！');location.href='shoppinglist'</script>";
			}
		}
	}
	public function shoppinglist()
	{
		$uid = $this->session->id;
		$res = $this->db->from("a_goods")
						->join("h_shoppingcar","a_goods.id=h_shoppingcar.gid")   //通过用户id来查询买到的其他商品
						->where("h_shoppingcar.uid='$uid'")
						->get()->result_array();
		$count = count($res);  //获取多少种商品
		$zsum='';	
		foreach($res as $key=>$val)
		{
			$zsum = $zsum+$val['sumprice'];   //获取全部的总价格
		}
		$res['res'] = $res;
		$res['zsum'] = $zsum;
		$res['count'] = $count;
		$this->load->view("Shopping/shoppingcar.html",$res);
	}
	public function ganged()  //地区多级联动
	{
		$area_id = $this->input->post('area_id');
		$res = $this->Aarea_model->sel_where("parent_id='$area_id'");
		if($res)
		{
			echo json_encode($res);
		}
		else
		{
			echo 0;
		}
	}
	public function add_area() // 添加地址
	{
		$area = $this->input->post('area');  //获取联动的值为数组
		$arr = array();
		for($i=0;$i<count($area);$i++)
  	 	{	
  	 		$res = $this->Aarea_model->sel_find("area_id='$area[$i]'"); // 查询单条
  	 		$arr[] = $res['area_name'];
  	 	}
  	 	$a_city = implode(' ',$arr); //把值拼接成字符串
  	 	$a_address = $this->input->post('a_address');
  	 	$a_email = $this->input->post('a_email');
  	 	$a_name = $this->input->post('a_name');
  	 	$a_cell = $this->input->post('a_cell');
  	 	$uid = $this->session->id;  //获取session  id
  	 	$data = array(
  	 			'u_id' =>$uid,
  	 			'a_city' =>$a_city,
  	 			'a_address'=>$a_address,
  	 			'a_email' =>$a_email,
  	 			'a_cell' =>$a_cell,
  	 			'a_name' =>$a_name
  	 		);
  	 	if($a_city==""||$a_address==""||$a_email==""||$a_name==""||$a_cell=="")
  	 	{
  	 		echo "<script>alert('请完善信息！');location.href='address'</script>";
  	 	}
  	 	else
  	 	{
  	 		$info = $this->Haddress_model->add($data);
	  	 	if($info)
	  	 	{
	  	 		echo "<script>alert('添加地址成功！');location.href='address'</script>";
	  	 	}
	  	 	else
	  	 	{
	  	 		echo "<script>alert('添加地址失败！');location.href='address'</script>";
	  	 	}
  	 	}
	}
	public function del_address() 	//删除地址
	{
		$a_id = $this->input->get('a_id');
		$uid = $this->session->id;  //获取session
		$res = $this->Haddress_model->del("a_id='$a_id'");
		if($res)
		{
			$arr = $this->Haddress_model->sel_where("u_id='$uid'");  //删除查询所有 返回json格式的数据
			echo json_encode($arr);
		}
		else
		{
			echo 0;
		}
	}
	public function delcar()
	{
		$sid = $this->input->post("sid");
		$res = $this->Hshoppingcar_model->del("sid='$sid'");
		if($res)
		{
			$uid = $this->session->id;
			$arr = $this->db->from("a_goods")
						->join("h_shoppingcar","a_goods.id=h_shoppingcar.gid")
						->where("h_shoppingcar.uid='$uid'")
						->get()->result_array();
			if(!$arr)
			{
				echo 2;
			}
			else
			{
				echo json_encode($arr);
			}
		}
	}
	public function jia()  //加金额
	{
		$sid = $this->input->post('sid');  //获取自增id
		$price = $this->input->post('price');  //获取单价
		$num = $this->input->post('num');	//获取个数
		$data  = array(
				'num'   =>$num,
				'sumprice'=>$num*$price
			);
		$res = $this->Hshoppingcar_model->update("sid='$sid'",$data);
		if($res)
		{
			echo 1;
		}
	}
	public function jiancar()  //减金额
	{
		$sid = $this->input->post('sid');  //获取自增id
		$price = $this->input->post('price');  //获取单价
		$a = $this->input->post('a');	//获取个数
		$data  = array(
				'num'   =>$a,
				'sumprice'=>$a*$price
			);
		$res = $this->Hshoppingcar_model->update("sid='$sid'",$data);
		if($res)
		{
			echo 1;
		}
	}
	public function jiesuan()
	{
		$uid = $this->session->id;
		$arr = $this->db->from("a_goods")
						->join("h_shoppingcar","a_goods.id=h_shoppingcar.gid")
						->where("h_shoppingcar.uid='$uid'")
						->get()->result_array();
		$zsum = '';
		foreach($arr as $key=>$val)
		{
			$zsum = $zsum+$val['sumprice'];   //获取全部的总价格
		}
		$res = $this->Haddress_model->sel_where("u_id='$uid'");   //查询地址
		$info = $this->Aarea_model->sel_where("parent_id=0");
		$info['info'] = $info;
		$info['res'] = $res;
		$info['arr'] = $arr;
		$info['zsum'] = $zsum;
		$this->load->view("Shopping/result.html",$info);  //跳转结算页面
	}
	public function indent()  //跳转生成订单页面
	{
		$a_id = $this->input->post("a_id");  //接值a_id
		$reality = $this->input->post('reality');  //获取总支付金额
		$res = $this->Haddress_model->sel_find("a_id='$a_id'");
		//获取收货人姓名
		$d_name = $res['a_name'];
		//获取收获详细地址
		$d_address = $res['a_city'].$res['a_address'];  
		//获取当前session  id
		$d_loginid = $this->session->id;
		//获取当前时间
		$d_date = date("Y/m/d/H:i:s",time());
		//获取订单号码   当前时间加上随机数字1到100
		$d_num = date("YmdHis").mt_rand (1,10);
		$data = array(
				'd_loginid'=>$d_loginid,
				'd_name'=>$d_name,
				'd_address'=>$d_address,
				'd_date' =>$d_date,
				'd_sumprice'=>$reality,
				'd_num'=>$d_num
			);
		$res = $this->Hindent_model->add($data);   //添加订单表生成订单
		if($res)
		{
			// $this->Hshoppingcar_model->del("uid='$d_loginid'");  //生成订单之后要情况购物车内得东西
			$arr = $this->Hindent_model->sel_find("d_num='$d_num'");
			$d_num = $arr['d_num'];
			echo $d_num;
		}
		else
		{
			echo 0;
		}
	}
	public function indentresult()  //订单结果页面
	{
		$d_num = $this->input->get('d_num');
		$arr = $this->Hindent_model->sel_find("d_num='$d_num'");
		$data['d_name'] = $arr['d_name'];  //获取寄送人
		$data['d_address'] = $arr['d_address'];	//获取寄送地址
		$data['d_sumprice'] = $arr['d_sumprice'];  //获取总支付金额
		$data['d_num'] = $arr['d_num'];
		$this->load->view('Shopping/indentresult.html',$data);  //跳转页面
	}
	public function indentlist()   //跳转订单列表页面
	{
		$uid = $this->session->id;
		$res = $this->Hindent_model->sel_where("d_loginid='$uid' and d_state=0");
		$count = count($res);  //获取订单总条数
		$res['list'] = $res;
		$res['count'] = $count;
		$this->load->view("Shopping/indentlist.html",$res);
	}
	public function pay()  //支付方法
	{
		$d_id = $this->input->get('d_id');  //获取id
		$res = $this->Hindent_model->sel_find("d_id='$d_id'");
		$d_num = $res['d_num'];   //订单号
		$d_sumprice = $res['d_sumprice'];   //支付金额

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
    "notify_url"	=> "http://www.php.com/CodeIgniter/practice/CMS/CodeIgniter-3.0.6/index.php/Shopping/indentlist", // 服务器异步通知页面路径
    "return_url"	=> "http://www.php.com/CodeIgniter/practice/CMS/CodeIgniter-3.0.6/index.php/Shopping/payresult?d_id=".$d_id, // 页面跳转同步通知页面路径
    "out_trade_no"	=> $d_num, // 商户网站订单系统中唯一订单号
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
	public function payresult()   //支付成功后修改状态
	{
		$d_id = $this->input->get('d_id');
	    $this->Hindent_model->update("d_id='$d_id'",array('d_state=1'));
	}
	public function delindent()  //删除订单
	{
		$d_id = $this->input->post('d_id');
		$res = $this->Hindent_model->del("d_id='$d_id'");   
		if($res)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function arealian()  //添加地址多级联动
	{
		$area_id = $this->input->post('area_id');
		$res = $this->Aarea_model->sel_where("parent_id='$area_id'");  //根据条件查询下边的子类
		if($res)
		{
			echo json_encode($res);
		}
		else
		{
			echo 0;
		}
	}
	public function upaddress()  //修改地址
	{
		$area = $_POST['area'];  //获取所在地区
		$arr = array();
		for($i=0;$i<count($area);$i++)
  	 	{	
  	 		$res = $this->Aarea_model->sel_find("area_id='$area[$i]'"); // 查询单条
  	 		$arr[] = $res['area_name'];
  	 	}
  	 	$a_city = implode(' ',$arr); //把值拼接成字符串 （所属地区）
		$a_email = $_POST['a_email'];  //获取邮政编码
		$a_id = $_POST['a_id'];  //接值  （id）
		$a_cell = $this->input->post('a_cell');  //获取电话号
		$a_address = $this->input->post('a_address'); // 获取详细地址
		$a_name = $this->input->post('a_name');  //获取所属姓名
		$uid = $this->session->id;  //获取登录人id
		$data = array(
			'u_id' =>$uid,
			'a_city' =>$a_city,
			'a_address' =>$a_address,
			'a_email'=>$a_email,
			'a_cell'=>$a_cell,
			'a_name'=>$a_name
			);
		$res = $this->Haddress_model->update("a_id='$a_id'",$data);
		if($res)
		{
			echo "<script>alert('修改地址成功！');location.href='jiesuan'</script>";
		}
		else
		{
			echo "<script>alert('修改地址成功！');location.href='jiesuan'</script>";
		}
	}
}
