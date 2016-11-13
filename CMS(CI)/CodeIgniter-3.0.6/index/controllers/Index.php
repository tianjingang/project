<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller {
	/*
		@首页控制器
		@Name Wyf.
		@Date 2016/05/18
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Base_model");  //加载
		$this->load->model('Agoods_model');
		$this->load->model('Agoodstype_model');
		$this->load->model('Hlogin_model');
		$this->load->model('Agoodspin_model');
	}
	public function indexs()  //跳转首页
	{
		$this->load->helper('cookie');  //加载 cookie
		$res['list'] = $this->Agoods_model->sel_where("g_hotcake=1 and g_rubbish=1");    //查询热品所有的
		$res['arr'] = $this->db->limit(3)->get_where("a_goods","g_jing=1 and g_rubbish=1")->result_array();  //查询精品3条
		$res['up'] = $this->db->limit(8)->get_where("a_goods","g_up=1 and g_rubbish=1")->result_array();  //查询热销8条
		$res['new'] = $this->db->limit(6)->get_where("a_goods","g_new=1 and g_rubbish=1")->result_array();  //查询新品
		$res['pin'] = $this->db->limit(8)->get('a_goodspin')->result_array(); //查询品牌8条
		$obj = isset($_COOKIE['goodscon'])?unserialize($_COOKIE['goodscon']):array();  //判断cookie 是否设置如果没设置就是个空数组
		if(count($obj)>5)
		{
			array_pop($obj);  //只留五条 若超过五条则删除最早的一条
		}
		$obj = implode(",",$obj);
		if($obj!="")
		{
			$obj = $this->db->where("id in($obj)")->get('a_goods')->result_array();  //查询我的足迹内容  存入cookie的
			$res['obj'] = $obj;
		}
		$res['obj'] = $obj;	
		$this->load->view("Index/index.html",$res);
	}
    //天气预报
    public function tianqi(){
        $this->load->view('Index/tianqi.php');
    }
    //读取天气
    public function tianshou($search='',$page=1){
        $search=urldecode($search);
        $page_num=2;
        $mem=new Memcache();
        $mem->connect('127.0.0.1',11211);
        //$mem->delete('data');die;
        //$mem->flush();die;
        $data=$mem->get('data');
        $hot=$mem->get('search');
        if($data){
            echo "缓存文件";
            //获取缓存文件数据
            $b=$mem->get('data');
            //判断有没有搜索值
            if($search!=''){
                //substr_count($das;$search);
                $b=array();
                foreach($data as $key=>$val){
                    if(substr_count($val['week'],$search)!=0){
                        $b[] =$val;
                    }
                }
                //搜索热词
                $hot=$mem->get('search');
                if($hot){
                    //var_dump($hot);
                    $res=1;
                    foreach($hot as $key=>$val){
                        if($val['name']==$search){
                            $hot[$key]['num']+=1;
                            $res=0;
                        }
                    }
                    if($res!=0){
                        $hot[]=array('name'=>$search,'num'=>1);
                    }
                }else{
                    $hot=array();
                    $hot[]=array('name'=>$search,'num'=>1);

                }
                $mem->set('search',$hot,false,0);
            }
            else{
                $b=$data;
            }
            $data['list']=$b;
            // var_dump($hot);
            //获取缓存文件条数
           /* $cou=count($b);
            //获取缓存文件总页数
            $sum_page=ceil( $cou/$page_num);
            //获取当前页
            $new_page=$page;
            //获取偏移量
            $limit=($new_page-1)*$page_num;
            //获取缓存文件数据 偏移量 每页条数
            $data['list']=array_slice($b,$limit,$page_num);
            // print_r($data);
            //传递总页数
            $data['page']=$sum_page;*/
            //传递搜索值
            $data['search']=$search;
            $this->load->view('Index/index.html',$data);
        }else{
            echo "数据库里的数据";
            $arr=$this->db->get('tianqi')->result_array();
            $mem->set('data',$arr,0,0);
            $das=$mem->get("data");
            /*$cou=count($das);
            $sum_page=ceil( $cou/$page_num);
            $new_page=$page;
            $limit=($new_page-1)*$page_num;
            $data['list']=array_slice( $das,$limit,$page_num);
            // print_r($data);
            $data['page']=$sum_page;*/
            $data['list']=$das;
            $this->load->view('Index/index.html',$data);
            //print_r($das);
        }


    }
	public function login()  //跳转登录页面
	{
		$this->load->view('Index/login.html');
	}
	public function register()  //跳转注册页面
	{
		$this->load->view('Index/register.html');
	}
	public function details()  //跳转商品详情页面
	{
		$this->load->helper('cookie');
		$gid = $this->input->get('id');
		$res = $this->Agoods_model->sel_find("id='$gid'");    //根据id查询商品普通信息
		$arr = $this->db->from("a_goodsattr")  //根据条件查询3条 商品属性
						->limit(4) 				
						->join("a_goodstype","a_goodstype.aid=a_goodsattr.aid")
						->where("a_goodstype.gid='$gid'")
						->get()->result_array();
		$info['res'] = $res;
		$info['arr'] = $arr;
		$obj = isset($_COOKIE['goodscon'])?unserialize($_COOKIE['goodscon']):array();  //判断cookie 是否设置如果没设置就是个空数组
		if(!in_array($gid,$obj))
		{
			array_unshift($obj,$gid);  //插入gid
		}
		if(count($obj)>5)
		{
			array_pop($obj);  //只留五条 若超过五条则删除最早的一条
		}
		setcookie("goodscon",serialize($obj),time()+3600*7*24,'/');  //设置cookie
		$str=implode(',',$obj);
		$this->load->view("Index/details.html",$info);
	}
	public function verify()  //验证码
	{
		$this->load->helper('captcha');
		$config =    array(    
			'fontSize'    =>    30,    // 验证码字体大小    
			'length'      =>    3,     // 验证码位数    
			'useNoise'    =>    false, // 关闭验证码杂点
			'imageW'      =>    160,  //验证码宽度
			'imageH'      =>    60		//验证码高度
			);
		$Verify =     new Verify($config);
		$Verify->entry();
	}
	public function checkregister()  //验证注册
	{
		//接值
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');
		$qpwd = $this->input->post('qpwd');
		$cell = $this->input->post('cell');
		$code = $this->input->post('code');
		$this->load->helper('captcha');  //加载
		$verify = new Verify();
		if(!$verify->check($code))  //验证验证码
		{
			echo 0;die;
		}
		$res = $this->Hlogin_model->sel_find("username='$username'");  //验证唯一性
		if($res)
		{
			echo 0;die;
		}
		if($pwd!=$qpwd)   //验证密码和确认密码
		{
			echo 0;die;
		}
		$arr = array(
			'username'  =>$username,
			'pwd'      =>$pwd,
			'cell'    =>$cell
			);
		$data = $this->Hlogin_model->add($arr);
		$info = $this->db->order_by("uid","desc")->limit(1)->get('h_login')->row_array();  //查询刚注册上的一条获取uid
		if($data)
		{
			$this->session->set_userdata('username',$username);  //注册成功  设置session
			$this->session->set_userdata('id',$info['uid']);
			echo "ok";
		}
	}	
	public function checklogin()  //验证登录
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');
		$code = $this->input->post('code');
		$this->load->helper('captcha');  //加载
		$verify = new Verify();
		if(!$verify->check($code))  //验证验证码
		{
			echo 0;die;
		}
		$res = $this->Hlogin_model->sel_find("username='$username'");
		if(!$res)
		{
			echo 1;
		}
		else
		{
			if($pwd!=$res['pwd'])
			{
				echo 1;
			}
			else
			{
				$this->session->set_userdata('username',$res['username']);  //登录成功  设置session
				$this->session->set_userdata('id',$res['uid']);
				echo "ok";
			}
		}
	}
	public function delsession()  //退出登录
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		echo "<script>alert('退出成功');location.href='indexs'</script>";
	}
	public function ifsession()  //判断是否有session
	{
		if($this->session->username)  //有session
		{
			echo 1;
		}
		else  //无session
		{
			echo 0;
		}
	}
	public function selfcenter()  //跳转个人中心页面
	{
		$this->load->view("Index/selfcenter.html");
	}
	public function aboutus()  //跳转关于我们页面
	{
		$this->load->view("Index/aboutus.html");
	}
}
