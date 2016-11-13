<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller {
	/*
		*@Name Wyf.
		*@Date 2016/5/12.
		*@商品控制器
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Agoods_model");
		$this->load->model("Agoodssort_model");
		$this->load->model("Agoodspin_model");
		$this->load->model("Anature_model");
		$this->load->model("Agoodstype_model");
	}
	//跳转添加商品页面
	public function addshow()
	{
		$info = $this->Anature_model->sel_all();  //查询属性表所有内容
		$arr = $this->Agoodspin_model->sel_all();
		$res = $this->Agoodssort_model->sel_all();
		$rs = $this->recursion($res,$s_id=0,$level=0);
		$data = array('list' =>$arr,'lists'=>$rs,'info'=>$info);
		$this->load->view("Goods/goods_add.html",$data);
	}
	//添加商品
	public function add()
	{
		//文件上传
		$config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 10000;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('g_photo'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $data = array('g_photo' => $this->upload->data());
            $g_photo = "uploads/".$data['g_photo']['file_name'];
            //接值
            $g_name = $_POST['g_name'];        
			$g_num = $_POST['g_num'];
			$g_sid = $_POST['g_sid'];
			$g_pid = $_POST['g_pid'];
			$g_selfprice = $_POST['g_selfprice'];
			$g_marketprice = $_POST['g_marketprice'];
			$g_kucun = $_POST['g_kucun'];
			$g_kucunnum = $_POST['g_kucunnum'];
			$g_jing = isset($_POST['g_jing'])?$_POST['g_jing']:0;
			$g_new = isset($_POST['g_new'])?$_POST['g_new']:0;
			$g_hotcake = isset($_POST['g_hotcake'])?$_POST['g_hotcake']:0;
			$g_up = isset($_POST['g_up'])?$_POST['g_up']:0;
			$g_guanjian = $_POST['g_guanjian'];
			$g_content = $_POST['g_content'];
			$g_datailedcon = $_POST['g_datailedcon'];
			if($g_name==""||$g_num==""||$g_sid==""||$g_pid==""||$g_selfprice==""||$g_marketprice==""||$g_kucun==""||$g_kucunnum==""||$g_guanjian==""||$g_content=="")
			{
				echo "<script>alert('请您完善信息！');location.href='addshow'</script>";
			}
			else
			{
				$arr = array(
					'g_name'  =>$g_name,
					'g_num'   =>$g_num,
					'g_sid'	  =>$g_sid,
					'g_pid'   =>$g_pid,
					'g_selfprice' =>$g_selfprice,
					'g_marketprice' =>$g_marketprice,
					'g_kucun' =>$g_kucun,
					'g_kucunnum' =>$g_kucunnum,
					'g_jing' =>$g_jing,
					'g_new' =>$g_new,
					'g_hotcake' =>$g_hotcake,
					'g_up' =>$g_up,
					'g_guanjian' =>$g_guanjian,
					'g_content' =>$g_content,
					'g_photo'   =>$g_photo,
					'g_datailedcon' =>$g_datailedcon
				);
				$res = $this->Agoods_model->add($arr);
				if($res)
				{
					$arr = $this->Agoods_model->look_desc("id","desc");  //查询刚添加的最后一条数据
					$goodsattr=$this->input->post('goodsattr');
			    	$aid=$this->input->post('aid');
			    	$gid = $arr['id'];
			    	if($gid=="")
			    	{
			    		echo "<script>alert('添加失败！');location.href='addshow'</script>";
			    	}
			    	else
			    	{
				    	for($i=0;$i<count($goodsattr);$i++)
				    	{
				    		$array = array(
				    			'gid' =>$gid,
				    			'goodsattr' =>$goodsattr[$i],
				    			'aid' =>$aid[$i]
				    			);
				    		$result[] = $this->db->insert("a_goodstype",$array);  //进行循环添加
				    	}
				    	if(count($result)>1)
				    	{
				    		echo "<script>alert('添加成功！');location.href='goodslist'</script>";
				    	}
				    	else
				    	{
				    		echo "<script>alert('成功！您没完全添加属性。');location.href='addshow'</script>";
				    	}
			    	}
				}
				else
				{
					echo "<script>alert('添加失败！');location.href='addshow'</script>";
				}
			}
        }
	}
	//跳转商品列表页面
	public function goodslist()
	{
		$arr = $this->Agoods_model->sel_all("g_rubbish=1");
		//获取当前页面
		$page = $this->uri->segment(4) ? $this->uri->segment(4):1;
		//获取每页条数
		$page_size = 3;
		//获取总共多少条
		$total = count($arr);
		//获取偏移量
		$limit = ($page-1)*$page_size;
		//获取总多少页
		$page_sum = ceil($total/$page_size);
		//加载
		$this->load->library('pagination');
		$config['base_url'] = site_url()."/Goods/goodslist/page";
		$config['total_rows'] = $total;
		$config['per_page'] = $page_size;
		$config['first_link'] = '首页'; // 第一页显示   
		$config['last_link'] = '末页'; // 最后一页显示   
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['use_page_numbers'] = true;
		$this->pagination->initialize($config);
		$pages = $this->pagination->create_links();
		$res = $this->Agoods_model->sel_limit($page_size,$limit,"g_rubbish=1");
		$res['list'] = $res;
		$res['page'] = $pages;
		$res['page_sum'] = $page_sum;
		$res['pages'] = $page;
		$this->load->view("Goods/goods_list.html",$res);
	}
	public function goodssole()       //验证商品的唯一性
	{
		$g_name = $this->input->post('g_name');    //通过商品名称查看单条数据验证唯一性
		$res = $this->Agoods_model->sel("g_name='$g_name'");
		if($res)
		{
			echo 0;
		}
	}
	public function g_number()      //不输入时自动生成商品货号
	{
		$g_num = $this->input->post("g_num");
		$arr = $this->Agoods_model->sel("g_num='$g_num'");
		if($arr)
		{
			echo 0;die;
		}
		else
		{
			$res = $this->Agoods_model->sel_find("g_num desc");
			$res = ++$res['g_num'];
			echo $res;
		}
	}
	//跳转添加商品分类页面
	public function addgoodscat()
	{
		$res = $this->Agoodssort_model->sel_all();
		$rs['list'] = $this->recursion($res,$s_id=0,$level=0);
		$this->load->view("Goods/cat_add.html",$rs);
	}
	//跳转商品分类页面
	public function goodscat()
	{
		$res = $this->Agoodssort_model->sel_all();    	//查询表中全部的内容
		$arr['list'] = $this->recursion($res,$s_id=0,$level=0);     //通过递归查询分类然后复制过去
		$this->load->view("Goods/cat_list.html",$arr);
	}
	public function recursion($res,$s_id=0,$level=0)  //递归
	{
		static $data = array();
		foreach($res as $key=>$val)
		{
			if($val['parent_id']==$s_id)
			{
				$val['level'] = $level;
				$val['html'] = str_repeat("--",$level);
				$data[] = $val;
				$this->recursion($res,$val['s_id'],$level+1);
			}
		}
		return $data;
	}
	public function checkaddcat()      //添加分类
	{
		$s_name = $_POST['s_name'];   		 //接全部值
		$s_unit = $_POST['s_unit'];
		$s_order = $_POST['s_order'];
		$s_show = $this->input->post('s_show');
		$s_navshow = $this->input->post('s_navshow');
		$s_new = isset($_POST['s_new']) ? $_POST['s_new']: 0;
		$s_jing = isset($_POST['s_jing']) ? $_POST['s_jing']: 0;    //设置就是1 没设置就是0
		$s_hot = isset($_POST['s_hot']) ? $_POST['s_hot']: 0;
		$s_content = $_POST['s_content'];
		$s_num = $_POST['s_num'];
		if($s_name=="")   			//验证分类名称为空
		{
			echo "<script>alert('分类名称不能为空');location.href='addgoodscat';</script>";
		}
		else
		{
			$s_id = $_POST["s_id"];   //接下拉选框的值
			$arr = $this->Agoodssort_model->look_one("s_id='$s_id'");
			$parent_id = $arr['parent_id'];
			$res = $this->Agoodssort_model->sel("s_name='$s_name' and parent_id='$parent_id'");
			if($res)
			{
				echo "<script>alert('分类名称和同级别的不能重复');location.href='addgoodscat';</script>";
			}
			if($s_show==""||$s_navshow=="")
			{
				echo "<script>alert('显示和导航栏显示必须各选一项！');location.href='addgoodscat';</script>";
			}
			else
			{
				$data = array(
					's_name'  => $s_name,
					's_unit'  =>$s_unit,
					's_order'  =>$s_order,
					's_show'  =>$s_show,
					's_navshow'  =>$s_navshow,
					's_new'  =>$s_new,
					's_jing'  =>$s_jing,
					's_hot'  =>$s_hot,
					's_content'  =>$s_content,
					'parent_id'  =>$s_id,
					's_num'   =>$s_num
					);
				$rs = $this->Agoodssort_model->add($data);
				if($rs)
				{
					echo "<script>alert('添加成功');location.href='goodscat';</script>";
				}
				else
				{
					echo "<script>alert('添加失败！');location.href='addgoodscat';</script>";
				}
			}
		}
	}
	//跳转添加商品品牌页面
	public function addgoodspin()
	{
		$this->load->view("Goods/brand_add.html");
	}
	//跳转商品品牌列表页面
	public function goodspinlist()
	{
		$arr = $this->Agoodspin_model->sel();					//分页
		//获取当前页数
		$page = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
		//获取每页的条数
		$page_size = 2;
		//获取总共多少条
		$total = count($arr);
		//获取总共多少页
		$page_sum = ceil($total/$page_size);
		//设置偏移量
		$limit = ($page-1)*$page_size;
		$this->load->library('pagination');  	//加载
		$config['base_url'] = site_url()."/Goods/goodspinlist/page/";
		$config['total_rows'] = $total;  //总共多少条
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] = $page_size;  	//每页的条数
		$this->pagination->initialize($config);
		$pages = $this->pagination->create_links();
		$res['list'] = $this->Agoodspin_model->sel_limit($page_size,$limit);
		$res['pages'] = $pages;
		$res['page'] = $page;
		$res['page_sum'] = $page_sum;
		$this->load->view("Goods/brandlist.html",$res);
	}
	//添加商品品牌
	public function goodspin_add()
	{
		//接值
		$p_name = $this->input->post('p_name');
		$p_web = $this->input->post('p_web');
		$p_content = $this->input->post("p_content");
		$p_order = $this->input->post('p_order');
		$p_show = $this->input->post('p_show');
		//文件上传
		$config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 10000;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('p_photo'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $data = array('p_photo' => $this->upload->data());
            $p_photo = "uploads/".$data['p_photo']['file_name'];
            if($p_name=='')
            {
            	echo "<script>alert('品牌名称不能为空');location.href='addgoodspin';</script>";
            }
            if($p_show=="")
            {
            	echo "<script>alert('是否显示必须选一项！');location.href='addgoodspin';</script>";
            }
            $datas = array(
					'p_name' =>$p_name,
					'p_web'  =>$p_web,
					'p_content' =>$p_content,
					'p_order'  =>$p_order,
					'p_show'   =>$p_show,
					'p_photo'  =>$p_photo
				);
            $res = $this->Agoodspin_model->add($datas);
            if($res)
            {
            	echo "<script>alert('添加成功！');location.href='goodspinlist';</script>";
            }
            else
            {
            	echo "<script>alert('添加失败！');location.href='addgoodspin';</script>";
            }
        }
	}
	public function addgoodssort()      //添加顶级分类
	{
		$s_name = $this->input->post('s_name');
		$rs = $this->Agoodssort_model->look_one("s_name='$s_name'");
		if($rs)
		{
			echo 0;die;
		}
		else
		{
			$data = array(
			's_name' =>$s_name,
			'parent_id' =>0
			);
			$arr = $this->Agoodssort_model->add($data);
			if($arr)
			{
				$res = $this->Agoodssort_model->sel_all();
				$res = $this->recursion($res,$s_id=0,$level=0);
				echo json_encode($res);
			}
		}
	}
	public function addsortson()       //添加商品子分类
	{
		$s_name = $this->input->post('s_name');
		$g_sid = $this->input->post('g_sid');
		$rs = $this->Agoodssort_model->look_one("s_name='$s_name'");
		if($rs)
		{
			echo 0;die;
		}
		else
		{
			$data = array(
				's_name' =>$s_name,
				'parent_id' =>$g_sid
			);
			$arr = $this->Agoodssort_model->add($data);
			if($arr)
			{
				$res = $this->Agoodssort_model->sel_all();
				$res = $this->recursion($res,$s_id=0,$level=0);
				echo json_encode($res);
			}
		}
	}
	public function addpinpai()    		//添加品牌效果
	{
		$p_name = $this->input->post("p_name");
		$rs = $this->Agoodspin_model->look_one("p_name='$p_name'");
		if($rs)
		{
			echo 0;die;
		}
		$data = array(
			'p_name' =>$p_name,
			);
		$res = $this->Agoodspin_model->add($data);
		if($res)
		{
			 $arr = $this->Agoodspin_model->sel_all();
			 echo json_encode($arr);
		}
	}
	public function rubbishup()    			//修改状态码放回收站
	{
		$id = $this->input->post('id');
		$res = $this->Agoods_model->update("id='$id'",array("g_rubbish"=>0));
		if($res){echo 1;}
	}
	//跳转商品回收站页面
	public function goodsrubbish()
	{
		$arr = $this->Agoods_model->sel_all("g_rubbish=0");
		//获取当前页
		$page = $this->uri->segment(4) ? $this->uri->segment(4):1;
		//获取每页的条数
		$page_size = 1;
		//获取总共多少条
		$total = count($arr);
		//获取总共多少页
		$page_sum = ceil($total/$page_size);
		//设置偏移量
		$limit = ($page-1)*$page_size;
		//加载
		$this->load->library('pagination');
		$config['base_url'] = site_url()."/Goods/goodsrubbish/page";
		$config['total_rows'] = $total;
		$config['per_page'] = $page_size;
		$config['first_link'] = '第一页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['last_link'] = '最后一页';
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$pages = $this->pagination->create_links();
		$res['list'] = $this->Agoods_model->sel_limit($page_size,$limit,"g_rubbish=0");
		$res['page'] = $page;
		$res['pages'] = $pages;
		$res['page_sum'] = $page_sum;
		$this->load->view("Goods/goods_rubbish.html",$res);
	}
	//删除品牌
	public function delpin()
	{
		$id = $this->input->post('id');
		$res = $this->Agoodspin_model->del("p_id='$id'");
		if($res){echo 1;}
	}
	//跳转修改品牌页面
	public function upgoodspin()
	{
		$id = $this->input->get('id');
		$res['list'] = $this->Agoodspin_model->look_one("p_id='$id'");
		$this->load->view("Goods/upgoodspin.html",$res);
	}
	//修改品牌
	public function updatebrand()  
	{
		$id = $this->input->post('p_id');
		$p_name = $this->input->post('p_name');
		$p_show = $this->input->post('p_show');
		$p_content = $this->input->post('p_content');
		$p_order = $this->input->post('p_order');
		$p_web = $this->input->post('p_web');
		$config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 0;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        $info = $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('p_photo'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $data = array('p_photo' => $this->upload->data());
            $p_photo = "uploads/".$data['p_photo']['file_name'];
            $arr = array(
					'p_name' =>$p_name,
					'p_web'  =>$p_web,
					'p_content' =>$p_content,
					'p_order'  =>$p_order,
					'p_show'   =>$p_show,
					'p_photo'  =>$p_photo
				);
            $res = $this->Agoodspin_model->up("p_id='$id'",$arr);
            if($res)
            {
            	echo "<script>alert('修改成功！');location.href='goodspinlist';</script>";
            }
            else
            {
            	echo "<script>alert('修改失败！');location.href='goodspinlist';</script>";
            }
        }
	}
	public function upp_name()     //几点几改（修改品牌名称）
	{
		$id = $this->input->post('id');
		$p_name = $this->input->post('p_name');
		$res = $this->Agoodspin_model->up("p_id='$id'",array('p_name'=>$p_name));
		if($res)
		{
			echo 1;
		}
		else
		{
			echo 1;
		}
	}
	public function up_order()    //几点几改   （商品品牌排序)
	{
		$id = $this->input->get('id');
		$p_order = $this->input->get('p_order');
		$res = $this->Agoodspin_model->up("p_id='$id'",array('p_order'=>$p_order));
		if($res){echo 1;}else{echo 1;}
	}
	public function upshow()     	//修改是否显示
	{
		$id = $this->input->post('id');
		$sort = $this->Agoodspin_model->look_one("p_id='$id'");
		if($sort['p_show']==1)
		{
			$res = $this->Agoodspin_model->up("p_id='$id'",array('p_show'=>0));  //修改
			echo 1;
		}
		else
		{
			$res = $this->Agoodspin_model->up("p_id='$id'",array('p_show'=>1));
			echo 0;
		}
	}
	public function search()  //搜索功能
	{
		$val = $this->input->post('val');
		$res = $this->Agoodspin_model->select("p_name like '%$val%'");
		echo json_encode($res);
	}
	public function updown()   	//上架下架切换
	{
		$id = $this->input->post('id');
		$arr = $this->Agoods_model->sel("id='$id'");
		if($arr['g_up']==1)
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_up'=>0));
			echo 0;
		}
		else
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_up'=>1));
			echo 1;
		}
	}
	public function jingpin()   	//精品切换
	{
		$id = $this->input->post('id');
		$arr = $this->Agoods_model->sel("id='$id'");  //查询单条
		if($arr['g_jing']==1)
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_jing'=>0));
			echo 0;
		}
		else
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_jing'=>1));
			echo 1;
		}
	}
	public function newpin()   	//新品切换
	{
		$id = $this->input->post('id');
		$arr = $this->Agoods_model->sel("id='$id'");  //查询单条
		if($arr['g_new']==1)
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_new'=>0));
			echo 0;
		}
		else
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_new'=>1));
			echo 1;
		}
	}
	public function hotcake()   	//热销切换
	{
		$id = $this->input->post('id');
		$arr = $this->Agoods_model->sel("id='$id'");  //查询单条
		if($arr['g_hotcake']==1)
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_hotcake'=>0));
			echo 0;
		}
		else
		{
			$res = $this->Agoods_model->update("id='$id'",array('g_hotcake'=>1));
			echo 1;
		}
	}
	public function goodsnameup()		//修改商品的名称	（几点几改）
	{
		$g_name = $this->input->post('g_name');
		$id = $this->input->post('id');
		$res = $this->Agoods_model->update("id='$id'",array('g_name'=>$g_name));
		if($res)
		{
			echo 1;
		}
		else
		{
			echo 1;
		}
	}
	public function goodsnumup()		//修改商品货号（几点几改）
	{	
		$g_num = $this->input->post("g_num");
		$id = $this->input->post('id');
		$res = $this->Agoods_model->sel("id!='$id' and g_num='$g_num'");  //验证货号的唯一性不能修改与其他一样的货号	
		if($res)
		{
			echo 0;
		}
		else
		{
			$rs = $this->Agoods_model->update("id='$id'",array('g_num'=>$g_num));
			if($rs)
			{
				echo 1;
			}
			else    							//修改成或没修改都返回1
			{
				echo 1;
			}
		}
	}
	public function goodsselfprice()				//几点几改（修改商品价格）
	{
		$g_selfprice = $this->input->post('g_selfprice');
		$id = $this->input->post('id');
		$res = $this->Agoods_model->update("id='$id'",array('g_selfprice'=>$g_selfprice));
		if($res)
		{
			echo 1;
		}
		else  							//修改成或没修改都返回1
		{
			echo 1;
		}
	}
	public function goodskucunup()
	{
		$id = $this->input->post('id');
		$g_kucun = $this->input->post('g_kucun');
		$res = $this->Agoods_model->update("id='$id'",array('g_kucun'=>$g_kucun));
		if($res)
		{
			echo 1;
		}
		else   						//修改成或没修改都返回1
		{
			echo 1;
		}
	}
	public function uprubbish()       //修改状态码放从回收站还原
	{
		$id = $this->input->post('id');
		$res = $this->Agoods_model->update("id='$id'",array('g_rubbish'=>1));
		if($res){echo 1;}
	}
	public function delgoods()     //删除该商品
	{
		$id = $this->input->post('id');
		$res = $this->Agoods_model->del("id='$id'");
		if($res){echo 1;}
	}
	public function searchrubbish()
	{
		$g_name = $this->input->get('con');
		$res = $this->Agoods_model->sel_all("g_name like '%$g_name%' and g_rubbish=0");
		echo json_encode($res);
	}
}


