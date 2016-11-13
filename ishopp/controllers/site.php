<?php
/**
 * @copyright Copyright(c) 2011 jooyea.cn
 * @file site.php
 * @brief
 * @author webning
 * @date 2011-03-22
 * @version 0.6
 * @note
 */
/**
 * @brief Site
 * @class Site
 * @note
 */
class Site extends IController
{
    public $layout='site';

	function init()
	{
		CheckRights::checkUserRights();
	}
/*    参与竞猜开始*/
    public function adds(){
        $person=ISafe::get('username');
        $jinpai=$_POST['jinpai'];
        $jiangpai=$_POST['jiangpai'];
        $order=$_POST['order'];
        $arr=array(
            "person"=>$person,
            "jinpai"=> $jinpai,
            "jiangpai"=> $jiangpai,
            "order"=>$order
        );
        $liyueObj=new IModel('jingcai');
        $liyueObj->setData($arr);
        $liyueObj->add();
        $this->index();

    }
    function index()
	{
        //得到本机IP
      /* $url_ip="http://api.k780.com:88/?app=ip.local&appkey=19784&sign=3c088aee11defe44f8ae2faa09e2d888&format=json";
        $html_ip=file_get_contents($url_ip);
        $json=json_decode($html_ip,true);
        $att_ip=$json['result']['ip'];
        $url="http://api.k780.com:88/?app=ip.get&ip=".$att_ip."&appkey=19784&sign=3c088aee11defe44f8ae2faa09e2d888&format=json";
        $html=file_get_contents($url);
        $ip=json_decode($html,true);
        //var_dump($ip);die;
        $add=$ip['result']['att'];
        $arr=array_reverse(explode(',',$add));
        $city=$arr['0'];
        $cityObj = new IQuery('ad_city');
        $cityObj->where  = "city ='$city'";
        $cityinfo = $cityObj->find();
        //var_dump($city);die;
        $this->cityinfo=$cityinfo;
        $this->redirect('index');*/
        /*可能感兴趣的商品开始*/
      /* $uid=$this->user['user_id'];
        $goodslikeobj=new IQuery('goods_like');//实例化goods_like表
        $goodslikeobj->join="left join iwebshop_goods on iwebshop_goods.id=iwebshop_goods_like.gid";
        $goodslikeobj->where="iwebshop_goods_like.uid=".$uid." limit 5";
        $res=$goodslikeobj->find();
        $data=array();
        foreach($res as $key=>$val){
            $timestamp=strtotime($val['visttime']);//获取访问时间的时间戳
            if(time()-$timestamp<3*24*3600){
                $data[$key]=$val;
            }
        }
        $datas=array_slice($data,0,5);
        $this->datas=$datas;*/
        /*可能感兴趣的商品结束*/
        /*定点投放开始*/
        //从控制器向视图层传值
        $cityObj=new IQuery('ad_city');
        //$cityObj->where='city="上海"';
        $cityObj->order='id desc';
        $cityinfo=$cityObj->find();
       // var_dump($cityinfo);
        $this->cityinfo=$cityinfo;
        /*定点投放结束*/
        /*广告定时发布系统开始*/
        $manageobj=new IQuery('ad_manage');//实例化广告表
        $percent_time=strtotime(date("Y-m-d H:i:s",time()));//获取系统当前时间
        $manageobj->where='longtime!=""';//查询生存时间不为空的
        $manageinfo=$manageobj->find();//单条查询
       foreach($manageinfo as $key=>$val){
           $start_time=strtotime($val['start_time']);//取出发布的开始时间并转换为时间戳
           $longtime=$val['longtime'];//取出生存时间
           $l_time=substr($longtime,0,1);//截取数字天
           $lg_time= $l_time*24*3600;//将生存时间转换为时间戳
          $life_time= $percent_time-$start_time;//系统时间减去发布的开始时间
           if($life_time<$lg_time){
               $manage_data=$manageobj->find();
           }
       }
        $this->manage_data=$manage_data;
        /*广告定时发布系统结束*/
       /*竞猜结果排行榜开始*/
        $jingcaiObj=new IModel('jingcai');
        $jingcaiObj->order="sum desc";
        $jingcaiinfo=$jingcaiObj->query();
        $this->jingcaiinfo=$jingcaiinfo;
        /*竞猜结果排行榜结束*/
        /*查询电影表video开始*/
        $videoObj=new IModel('video');
        $videoinfo=$videoObj->query();
        $this->videoinfo=$videoinfo;
      /*查询电影表video结束*/
        $this->redirect('index');
    }

	//[首页]商品搜索
	function search_list()
	{
		$this->word = IFilter::act(IReq::get('word'),'text');
		$cat_id     = IFilter::act(IReq::get('cat'),'int');

		if(preg_match("|^[\w\x7f\s*-\xff*]+$|",$this->word))
		{
			//搜索关键字
			$tb_sear     = new IModel('search');
			$search_info = $tb_sear->getObj('keyword = "'.$this->word.'"','id');

			//如果是第一页，相应关键词的被搜索数量才加1
			if($search_info && intval(IReq::get('page')) < 2 )
			{
				//禁止刷新+1
				$allow_sep = "30";
				$flag = false;
				$time = ICookie::get('step');
				if(isset($time))
				{
					if (time() - $time > $allow_sep)
					{
						ICookie::set('step',time());
						$flag = true;
					}
				}
				else
				{
					ICookie::set('step',time());
					$flag = true;
				}
				if($flag)
				{
					$tb_sear->setData(array('num'=>'num + 1'));
					$tb_sear->update('id='.$search_info['id'],'num');
				}
			}
			elseif( !$search_info )
			{
				//如果数据库中没有这个词的信息，则新添
				$tb_sear->setData(array('keyword'=>$this->word,'num'=>1));
				$tb_sear->add();
			}
		}
		else
		{
			IError::show(403,'请输入正确的查询关键词');
		}
		$this->cat_id = $cat_id;
		$this->redirect('search_list');
	}

	//[site,ucenter头部分]自动完成
	function autoComplete()
	{
		$word = IFilter::act(IReq::get('word'));
		$isError = true;
		$data    = array();

		if($word != '' && $word != '%' && $word != '_')
		{
			$wordObj  = new IModel('keyword');
			$wordList = $wordObj->query('word like "'.$word.'%" and word != "'.$word.'"','word, goods_nums','','',10);

			if(!empty($wordList))
			{
				$isError = false;
				$data = $wordList;
			}
		}

		//json数据
		$result = array(
			'isError' => $isError,
			'data'    => $data,
		);

		echo JSON::encode($result);
	}

	//[首页]邮箱订阅
	function email_registry()
	{
		$email  = IReq::get('email');
		$result = array('isError' => true);

		if(!IValidate::email($email))
		{
			$result['message'] = '请填写正确的email地址';
		}
		else
		{
			$emailRegObj = new IModel('email_registry');
			$emailRow    = $emailRegObj->getObj('email = "'.$email.'"');

			if(!empty($emailRow))
			{
				$result['message'] = '此email已经订阅过了';
			}
			else
			{
				$dataArray = array(
					'email' => $email,
				);
				$emailRegObj->setData($dataArray);
				$status = $emailRegObj->add();
				if($status == true)
				{
					$result = array(
						'isError' => false,
						'message' => '订阅成功',
					);
				}
				else
				{
					$result['message'] = '订阅失败';
				}
			}
		}
		echo JSON::encode($result);
	}

	//[列表页]商品
	function pro_list()
	{
		$this->catId = IFilter::act(IReq::get('cat'),'int');//分类id
        if($this->catId == 0)
		{
			IError::show(403,'缺少分类ID');
		}

		//查找分类信息
		$catObj       = new IModel('category');
		$this->catRow = $catObj->getObj('id = '.$this->catId);
        if($this->catRow == null)
		{
			IError::show(403,'此分类不存在');
		}

		//获取子分类
		$this->childId = goods_class::catChild($this->catId);
		$this->redirect('pro_list');
	}
	//咨询
	function consult()
	{
		$this->goods_id = IFilter::act(IReq::get('id'),'int');
		$this->callback = IReq::get('callback');

		if($this->goods_id == 0)
		{
			IError::show(403,'缺少商品ID参数');
		}

		$goodsObj   = new IModel('goods');
		$goodsRow   = $goodsObj->getObj('id = '.$this->goods_id);

		if(!$goodsRow)
		{
			IError::show(403,'商品数据不存在');
		}

		//获取次商品的评论数和平均分(保留小数点后一位)
		$goodsRow['apoint']   = $goodsRow['comments'] ? round($goodsRow['grade']/$goodsRow['comments'],1) : 0;
		$goodsRow['comments'] = $goodsRow['comments'];

		$this->goodsRow = $goodsRow;
		$this->redirect('consult');
	}

	//咨询动作
	function consult_act()
	{
		$goods_id   = IFilter::act(IReq::get('goods_id','post'),'int');
		$captcha    = IFilter::act(IReq::get('captcha','post'));
		$question   = IFilter::act(IReq::get('question','post'));
		$callback   = IReq::get('callback');
		$message    = '';

    	if($captcha != ISafe::get('captcha'))
    	{
    		$message = '验证码输入不正确';
    	}
    	else if(!trim($question))
    	{
    		$message = '咨询内容不能为空';
    	}
    	else if($goods_id == 0)
    	{
    		$message = '商品ID不能为空';
    	}
    	else
    	{
    		$goodsObj = new IModel('goods');
    		$goodsRow = $goodsObj->getObj('id = '.$goods_id);
    		if(!$goodsRow)
    		{
    			$message = '不存在此商品';
    		}
    	}

		//有错误情况
    	if($message)
    	{
    		$this->callback = $callback;
    		$this->goods_id = $goods_id;
    		$dataArray = array(
    			'question' => $question,
    		);
    		$this->consultRow = $dataArray;

			//渲染goods数据
			$goodsObj   = new IModel('goods');
			$goodsRow   = $goodsObj->getObj('id = '.$this->goods_id);

			//获取次商品的评论数和平均分(保留小数点后一位)
			$goodsRow['apoint']   = $goodsRow['comments'] ? round($goodsRow['grade']/$goodsRow['comments'],1) : 0;
			$goodsRow['comments'] = $goodsRow['comments'];
			$this->goodsRow = $goodsRow;
            $this->redirect('consult',false);
    		Util::showMessage($message);
    	}
    	else
    	{
			$dataArray = array(
				'question' => $question,
				'goods_id' => $goods_id,
				'user_id'  => isset($this->user['user_id']) ? $this->user['user_id'] : 0,
				'time'     => ITime::getDateTime(),
			);

			$referObj = new IModel('refer');
			$referObj->setData($dataArray);
			$referObj->add();

			$this->redirect('success?callback=/site/products/id/'.$goods_id);
    	}
	}

	//公告详情页面
	function notice_detail()
	{
		$this->notice_id = IFilter::act(IReq::get('id'),'int');
		if($this->notice_id == '')
		{
			IError::show(403,'缺少公告ID参数');
		}
		else
		{
			$noObj           = new IModel('announcement');
			$this->noticeRow = $noObj->getObj('id = '.$this->notice_id);
			if(empty($this->noticeRow))
			{
				IError::show(403,'公告信息不存在');
			}
			$this->redirect('notice_detail');
		}
	}

	//咨询详情页面
	function article_detail()
	{
		$this->article_id = IFilter::act(IReq::get('id'),'int');
		if($this->article_id == '')
		{
			IError::show(403,'缺少咨询ID参数');
		}
		else
		{
			$articleObj       = new IModel('article');
			$this->articleRow = $articleObj->getObj('id = '.$this->article_id);
			if(empty($this->articleRow))
			{
				IError::show(403,'资讯文章不存在');
				exit;
			}

			//关联商品
			$relationObj = new IQuery('relation as r');
			$relationObj->join   = ' left join goods as go on r.goods_id = go.id ';
			$relationObj->where  = ' r.article_id = '.$this->article_id.' and go.id is not null ';

			$this->relationList  = $relationObj->find();
			$this->redirect('article_detail');
		}
	}
    //查询敏感词
    function look_word(){
        $content=$_POST['content'];
        //echo $content;die;
        $wordobj=new IQuery('word');
        $res=$wordobj->find();
        //print_r($res);die;
        if(is_array($res,$content)){
           //echo "讨论的内容违规";die;
            echo "<script>alert('讨论的内容违规');location.href=('site/products')</script>";
        }
        else{
           // echo "可以发表";die;
            echo "<script>alert('可以发表');location.href=('site/products')</script>";

        }

    }

	//商品展示
	function products()
	{
        $goods_id = IFilter::act(IReq::get('id'),'int');
        if(!$goods_id)
		{
			IError::show(403,"传递的参数不正确");
			exit;
		}
        /*统计月销量开始*/
        $goods_id = IFilter::act(IReq::get('id'),'int');//获取点击商品id
                $oredergoods=new IQuery('order_goods as o_g');//实例化订单和商品关系表
                $oredergoods->join="left join order as o on o_g.order_id=o.id ";
                $oredergoods->where="o_g.goods_id=".$goods_id;
                $orderRow=$oredergoods->find();
                $date=strtotime(date("Y-m-01 H:i:s",strtotime(date("Y-m-d"))));//获取当前月的第一天转换为秒数;
                $num=0;
                foreach($orderRow as $key=>$val){
                    if(strtotime($val['create_time'])>$date){
                            $num=$num+1;
                    }
                }
                $this->num=$num;
        /*统计月销量结束*/
       /* 可能感兴趣的商品开始*/
       //使用商品id获得商品信息
       /* $id = $_GET['id'];
        $url = file_get_contents("http://www.ishopp.com/index.php?controller=Good_self&action=self&id=$id");
        $goods_info=json_decode($url,true);*/
        //print_r($goods_info);die;
        $tb_goods = new IModel('goods');
        $goods_info = $tb_goods->getObj('id='.$goods_id." AND is_del=0");
        $goods_id = IFilter::act(IReq::get('id'),'int');//获取商品id
        //echo $goods_id;die;
        $uid=$this->user['user_id'];//获取session  id
        //echo $uid;die;
        $visttime=date("Y-m-d H:i:s",time());//获取点击时的时间戳
        //echo $visttime;die;
        $goodslikeobj=new IModel('goods_like');//实例化iwebshop_goods_like表
        $obj=$goodslikeobj->getObj("uid='$uid' && gid='$goods_id'");//根据登录者id和商品id查询goods_like表
        //print_r($obj);die;
        if(empty($obj)){
            $arr=array(
                "uid"=>$uid,
                "gid"=>$goods_id,
                "visttime"=>$visttime,
                "count"=>1
            );
            $goodslikeobj->setData($arr);
            $goodslikeobj->add();
            //echo 1;die;
        }
        else{
            //当同一个人点击同一个商品
            $id=$obj['id'];
            $arr=array(
                "uid"=>$uid,
                "gid"=>$goods_id,
                "visttime"=>$visttime,
                "count"=>$obj['count']+1
            );
            $goodslikeobj->setData($arr);
            $res=$goodslikeobj->update("id=$id");
            //echo 2;die;
        }
        /* 可能感兴趣的商品结束*/
        /*同品牌的商品开始*/
        /*$goodsObj=new IQuery('goods');//实例化商品表
        $goodsObj->where="id='$goods_id'";//查询的条件
        $goods_find=$goodsObj->find();//查询单条
       // print_r($goods_find);die;
        $brand_id=$goods_find[0]['brand_id'];//取出品牌
        $goodsObj->where="brand_id=".$brand_id;//查询条件
        $goods_brand=$goodsObj->find();//查询同品牌其他商品
        $g_id=array();//定义空数组*/
        /*同品牌的商品结束*/
        if(!$goods_info)
		{
			IError::show(403,"这件商品不存在");
			exit;
		}
       //品牌名称
		if($goods_info['brand_id'])
		{
			$tb_brand = new IModel('brand');
			$brand_info = $tb_brand->getObj('id='.$goods_info['brand_id']);
			if($brand_info)
			{
				$goods_info['brand'] = $brand_info['name'];
			}
		}

		//获取商品分类
		$categoryObj = new IModel('category_extend as ca,category as c');
		$categoryRow = $categoryObj->getObj('ca.goods_id = '.$goods_id.' and ca.category_id = c.id','c.id,c.name');
		$goods_info['category'] = $categoryRow ? $categoryRow['id'] : 0;

		//商品图片
		$tb_goods_photo = new IQuery('goods_photo_relation as g');
		$tb_goods_photo->fields = 'p.id AS photo_id,p.img ';
		$tb_goods_photo->join = 'left join goods_photo as p on p.id=g.photo_id ';
		$tb_goods_photo->where =' g.goods_id='.$goods_id;
		$goods_info['photo'] = $tb_goods_photo->find();
		foreach($goods_info['photo'] as $key => $val)
		{
			//对默认第一张图片位置进行前置
			if($val['img'] == $goods_info['img'])
			{
				$temp = $goods_info['photo'][0];
				$goods_info['photo'][0] = $val;
				$goods_info['photo'][$key] = $temp;
			}
		}

		//商品是否参加促销活动(团购，抢购)
		$goods_info['promo']     = IReq::get('promo')     ? IReq::get('promo') : '';
		$goods_info['active_id'] = IReq::get('active_id') ? IFilter::act(IReq::get('active_id'),'int') : 0;
		if($goods_info['promo'])
		{
			switch($goods_info['promo'])
			{
				//团购
				case 'groupon':
				{
					$goods_info['regiment'] = Api::run("getRegimentRowById",array("#id#",$goods_info['active_id']));
					if(isset($goods_info['regiment']['goods_id']) && $goods_info['regiment']['goods_id'] != $goods_id)
					{
						IError::show(403,"该商品未参与活动");
					}
				}
				break;

				//抢购
				case 'time':
				{
					$goods_info['promotion'] = Api::run("getPromotionRowById",array("#id#",$goods_info['active_id']));
					if(isset($goods_info['regiment']['goods_id']) && $goods_info['promotion']['condition'] != $goods_id)
					{
						IError::show(403,"该商品未参与活动");
					}
				}
				break;

				default:
				{
					IError::show(403,"活动不存在或者已经过期");
					exit;
				}
			}
		}

		//获得扩展属性
		$tb_attribute_goods = new IQuery('goods_attribute as g');
		$tb_attribute_goods->join  = 'left join attribute as a on a.id=g.attribute_id ';
		$tb_attribute_goods->fields=' a.name,g.attribute_value ';
		$tb_attribute_goods->where = "goods_id='".$goods_id."' and attribute_id!=''";
		$tb_attribute_goods->order = "g.id asc";
		$goods_info['attribute'] = $tb_attribute_goods->find();

		//[数据挖掘]最终购买此商品的用户ID列表
		$tb_good = new IQuery('order_goods as og');
		$tb_good->join   = 'left join order as o on og.order_id=o.id ';
		$tb_good->fields = 'DISTINCT o.user_id';
		$tb_good->where  = 'og.goods_id = '.$goods_id;
		$tb_good->limit  = 5;
		$bugGoodInfo = $tb_good->find();
		if($bugGoodInfo)
		{
			$shop_goods_array = array();
			foreach($bugGoodInfo as $key => $val)
			{
				if($val['user_id'])
				{
					$shop_goods_array[] = $val['user_id'];
				}
			}
			$goods_info['buyer_id'] = join(',',$shop_goods_array);
		}

		//购买记录
		$tb_shop = new IQuery('order_goods as og');
		$tb_shop->join = 'left join order as o on o.id=og.order_id';
		$tb_shop->fields = 'count(*) as totalNum';
		$tb_shop->where = 'og.goods_id='.$goods_id.' and o.status = 5';
		$shop_info = $tb_shop->find();
		$goods_info['buy_num'] = 0;
		if($shop_info)
		{
			$goods_info['buy_num'] = $shop_info[0]['totalNum'];
		}

		//购买前咨询
		$tb_refer    = new IModel('refer');
		$refeer_info = $tb_refer->getObj('goods_id='.$goods_id,'count(*) as totalNum');
		$goods_info['refer'] = 0;
		if($refeer_info)
		{
			$goods_info['refer'] = $refeer_info['totalNum'];
		}

		//网友讨论
		$tb_discussion = new IModel('discussion');
		$discussion_info = $tb_discussion->getObj('goods_id='.$goods_id,'count(*) as totalNum');
		$goods_info['discussion'] = 0;
		if($discussion_info)
		{
			$goods_info['discussion'] = $discussion_info['totalNum'];
		}

		//获得商品的价格区间
		$tb_product = new IModel('products');
		$product_info = $tb_product->getObj('goods_id='.$goods_id,'max(sell_price) as maxSellPrice ,min(sell_price) as minSellPrice,max(market_price) as maxMarketPrice,min(market_price) as minMarketPrice');
		$goods_info['maxSellPrice']   = '';
		$goods_info['minSellPrice']   = '';
		$goods_info['minMarketPrice'] = '';
		$goods_info['maxMarketPrice'] = '';
		if($product_info)
		{
			$goods_info['maxSellPrice']   = $product_info['maxSellPrice'];
			$goods_info['minSellPrice']   = $product_info['minSellPrice'];
			$goods_info['minMarketPrice'] = $product_info['minMarketPrice'];
			$goods_info['maxMarketPrice'] = $product_info['maxMarketPrice'];
		}

		//获得会员价
		$countsumInstance = new countsum();
		$goods_info['group_price'] = $countsumInstance->getGroupPrice($goods_id,'goods');

		//获取商家信息
		if($goods_info['seller_id'])
		{
			$sellerDB = new IModel('seller');
			$goods_info['seller'] = $sellerDB->getObj('id = '.$goods_info['seller_id']);
		}

		//增加浏览次数
		$visit    = ISafe::get('visit');
		$checkStr = "#".$goods_id."#";
		if($visit && strpos($visit,$checkStr) !== false)
		{
		}
		else
		{
			$tb_goods->setData(array('visit' => 'visit + 1'));
			$tb_goods->update('id = '.$goods_id,'visit');
			$visit = $visit === null ? $checkStr : $visit.$checkStr;
			ISafe::set('visit',$visit);
		}

		$this->setRenderData($goods_info);
        $this->goods_id=$goods_id;
		$this->redirect('products');
	}
    //视频点击次数
    public function goods_click(){
        $goods_id = IFilter::act(IReq::get('id'));
        $goodsObj=new IModel('goods');
        $arr=$goodsObj->getObj("id='$goods_id'");
        $data=array(
            "video_sum"=>$arr['video_sum']+1
        );
        $goodsObj->setData($data);
       $res= $goodsObj->update("id='$goods_id'");
        if($res){
            $ar=$goodsObj->getObj("id='$goods_id'",'video_sum');
            echo $ar['video_sum'];
        }
        else{
            echo 0;
        }

    }
	//商品讨论更新
	function discussUpdate()
	{

		$goods_id = IFilter::act(IReq::get('id'),'int');
		$content  = IFilter::act(IReq::get('content'),'text');
		$captcha  = IReq::get('captcha');
		$return   = array('isError' => true , 'message' => '');

		if(!$this->user['user_id'])
		{
			$return['message'] = '请先登录系统';
		}
    	else if($captcha != ISafe::get('captcha'))
    	{
    		$return['message'] = '验证码输入不正确';
    	}
    	else if(trim($content) == '')
    	{
    		$return['message'] = '内容不能为空';
    	}
    	else
    	{
    		$return['isError'] = false;
           //查询敏感词表开始
            $wordobj=new IModel('word');
            $word_arr=$wordobj->query();
            foreach($word_arr as $val){
                $content=str_replace($val,"*****",$content);
            }
            //查询敏感表结束
            //插入讨论表
			$tb_discussion = new IModel('discussion');
			$dataArray     = array(
				'goods_id' => $goods_id,
				'user_id'  => $this->user['user_id'],
				'time'     => date('Y-m-d H:i:s'),
				'contents' => $content,
			);
			$tb_discussion->setData($dataArray);
			$tb_discussion->add();

			$return['time']     = $dataArray['time'];
			$return['contents'] = $content;
			$return['username'] = $this->user['username'];
    	}
    	echo JSON::encode($return);
	}

	//获取货品数据
	function getProduct()
	{
		$jsonData = JSON::decode(IReq::get('specJSON'));
		if(!$jsonData)
		{
			echo JSON::encode(array('flag' => 'fail','message' => '规格值不符合标准'));
			exit;
		}

		$goods_id = IFilter::act(IReq::get('goods_id'),'int');
		$specJSON = IFilter::act(IReq::get('specJSON'));

		//获取货品数据
		$tb_products = new IModel('products');
		$procducts_info = $tb_products->getObj("goods_id = ".$goods_id." and spec_array = '".$specJSON."'");

		//匹配到货品数据
		if(!$procducts_info)
		{
			echo JSON::encode(array('flag' => 'fail','message' => '没有找到相关货品'));
			exit;
		}

		//获得会员价
		$countsumInstance = new countsum();
		$group_price = $countsumInstance->getGroupPrice($procducts_info['id'],'product');

		//会员价格
		if($group_price !== null)
		{
			$procducts_info['group_price'] = $group_price;
		}

		echo JSON::encode(array('flag' => 'success','data' => $procducts_info));
	}

	//顾客评论ajax获取
	function comment_ajax()
	{
		$goods_id = IFilter::act(IReq::get('goods_id'),'int');
		$page     = IFilter::act(IReq::get('page'),'int') ? IReq::get('page') : 1;
        $commentDB = new IQuery('comment as c');
		$commentDB->join   = 'left join goods as go on c.goods_id = go.id AND go.is_del = 0 left join user as u on u.id = c.user_id';
		$commentDB->fields = 'u.head_ico,u.username,c.*';
		$commentDB->where  = 'c.goods_id = '.$goods_id.' and c.status = 1';
		$commentDB->order  = 'c.id desc';
		$commentDB->page   = $page;
		$data     = $commentDB->find();
		$pageHtml = $commentDB->getPageBar("javascript:void(0);",'onclick="comment_ajax([page])"');

		echo JSON::encode(array('data' => $data,'pageHtml' => $pageHtml));
	}

	//购买记录ajax获取
	function history_ajax()
	{
		$goods_id = IFilter::act(IReq::get('goods_id'),'int');
		$page     = IFilter::act(IReq::get('page'),'int') ? IReq::get('page') : 1;

		$orderGoodsDB = new IQuery('order_goods as og');
		$orderGoodsDB->join   = 'left join order as o on og.order_id = o.id left join user as u on o.user_id = u.id';
		$orderGoodsDB->fields = 'o.user_id,og.goods_price,og.goods_nums,o.create_time as completion_time,u.username';
		$orderGoodsDB->where  = 'og.goods_id = '.$goods_id.' and o.status = 5';
		$orderGoodsDB->order  = 'o.create_time desc';
		$orderGoodsDB->page   = $page;

		$data = $orderGoodsDB->find();
		$pageHtml = $orderGoodsDB->getPageBar("javascript:void(0);",'onclick="history_ajax([page])"');

		echo JSON::encode(array('data' => $data,'pageHtml' => $pageHtml));
	}

	//讨论数据ajax获取
	function discuss_ajax()
	{
		$goods_id = IFilter::act(IReq::get('goods_id'),'int');
		$page     = IFilter::act(IReq::get('page'),'int') ? IReq::get('page') : 1;

		$discussDB = new IQuery('discussion as d');
		$discussDB->join = 'left join user as u on d.user_id = u.id';
		$discussDB->where = 'd.goods_id = '.$goods_id;
		$discussDB->order = 'd.id desc';
		$discussDB->fields = 'u.username,d.time,d.contents';
		$discussDB->page = $page;

		$data = $discussDB->find();
		$pageHtml = $discussDB->getPageBar("javascript:void(0);",'onclick="discuss_ajax([page])"');

		echo JSON::encode(array('data' => $data,'pageHtml' => $pageHtml));
	}

	//买前咨询数据ajax获取
	function refer_ajax()
	{
		$goods_id = IFilter::act(IReq::get('goods_id'),'int');
		$page     = IFilter::act(IReq::get('page'),'int') ? IReq::get('page') : 1;

		$referDB = new IQuery('refer as r');
		$referDB->join = 'left join user as u on r.user_id = u.id';
		$referDB->where = 'r.goods_id = '.$goods_id;
		$referDB->order = 'r.id desc';
		$referDB->fields = 'u.username,u.head_ico,r.time,r.question,r.reply_time,r.answer';
		$referDB->page = $page;

		$data = $referDB->find();
		$pageHtml = $referDB->getPageBar("javascript:void(0);",'onclick="refer_ajax([page])"');

		echo JSON::encode(array('data' => $data,'pageHtml' => $pageHtml));
	}

	//评论列表页
	function comments_list()
	{
		$id   = IFilter::act(IReq::get("id"),'int');
		$type = IFilter::act(IReq::get("type"));

		$type_config = array('bad'=>'1','middle'=>'2,3,4','good'=>'5');

		if(!isset($type_config[$type]))
		{
			$type = null;
		}
		else
		{
			$type=$type_config[$type];
		}

		$data['comment_list']=array();

		$query = new IQuery("comment AS a");
		$query->fields = "a.*,b.username,b.head_ico";
		$query->join = "left join user AS b ON a.user_id=b.id";
		$query->where = " a.goods_id = {$id} ";

		if($type!==null)
			$query->where = " a.goods_id={$id} AND a.status=1  AND a.point IN ($type)";
		else
			$query->where = "a.goods_id={$id} AND a.status=1 ";

		$query->order    = "a.id DESC";
		$query->page     = IReq::get('page') ? intval(IReq::get('page')):1;
		$query->pagesize = 10;

		$data['comment_list']= $query->find();
		$this->comment_query = $query;

		if($data['comment_list'])
		{
			$user_ids = array();
			foreach($data['comment_list'] as $value)
			{
				$user_ids[]=$value['user_id'];
			}
			$user_ids = implode(",", array_unique( $user_ids ) );
			$query = new IQuery("member AS a");
			$query->join = "left join user_group AS b ON a.user_id IN ({$user_ids}) AND a.group_id=b.id";
			$query->fields="a.user_id,b.group_name";
			$user_info = $query->find();
			$user_info = Util::array_rekey($user_info,'user_id');

			foreach($data['comment_list'] as $key=>$value)
			{
				$data['comment_list'][$key]['user_group_name']=isset($user_info[$value['user_id']]['group_name']) ? $user_info[$value['user_id']]['group_name'] : '';
			}
		}

		$data=array_merge($data, Comment_Class::get_comment_info($id) );
		$this->data=$data;
		$this->redirect('comments_list');
	}

	//提交评论页
	function comments()
	{
		$id = IFilter::act(IReq::get('id'),'int');

		if(!$id)
		{
			IError::show(403,"传递的参数不完整");
		}

		if(!isset($this->user['user_id']) || $this->user['user_id']==null )
		{
			IError::show(403,"登录后才允许评论");
		}

		$can_submit = Comment_Class::can_comment($id,$this->user['user_id']);
		if($can_submit[0]==-1)
		{
			IError::show(403,"没有这条数据");
		}

		$this->can_submit   = $can_submit[0]==1;//true值
		$this->comment      = $can_submit[1]; //评论数据
		$this->comment_info = Comment_Class::get_comment_info($this->comment['goods_id']);
		$this->redirect("comments");
	}

	/**
	 * @brief 进行商品评论 ajax操作
	 */
	public function comment_add()
	{
		if(!isset($this->user['user_id']) || $this->user['user_id']===null)
		{
			die("未登录用户不能评论");
		}

		if(IReq::get('id')===null)
		{
			die("传递的参数不完整");
		}

		$id               = IFilter::act(IReq::get('id'),'int');
		$data             = array();
		$data['point']    = IFilter::act(IReq::get('point'),'float');
		$data['contents'] = IFilter::act(IReq::get("contents"),'content');
		$data['status']   = 1;

		if($data['point']==0)
		{
			die("请选择分数");
		}

		$can_submit = Comment_Class::can_comment($id,$this->user['user_id']);
		if($can_submit[0]!=1)
		{
			die("您不能评论此件商品");
		}

		//$data['comment_time'] = date("Y-m-d",ITime::getNow());
       $data['comment_time'] = date("Y-m-d H:i:s",time());

		$tb_comment = new IModel("comment");
		$tb_comment->setData($data);
		$re=$tb_comment->update("id={$id}");

		if($re)
		{
			//同步更新goods表,comments,grade
			$commentRow = $tb_comment->getObj('id = '.$id);

			$goodsDB = new IModel('goods');
			$goodsDB->setData(array(
				'comments' => 'comments + 1',
				'grade'    => 'grade + '.$commentRow['point'],
			));
			$goodsDB->update('id = '.$commentRow['goods_id'],array('grade','comments'));

			echo "success";
		}
		else
		{
			die("评论失败");
		}
	}

	function pic_show()
	{
		$this->layout="";
		$this->redirect("pic_show");
	}

	function help()
	{
		$id = intval(IReq::get("id"));
		$tb_help = new IModel("help");
		$help_row = $tb_help->query("id={$id}");
		if(!$help_row || !is_array($help_row))
		{
			IError::show(404,"您查找的页面已经不存在了");
		}
		$this->help_row = end( $help_row );
        $tb_help_cat = new IModel("help_category");
		$cat_row = $tb_help_cat->query("id={$this->help_row['cat_id']}");
		$this->cat_row = end($cat_row);
		$this->redirect("help");
	}

	function help_list()
	{
		$id = intval(IReq::get("id"));
		$tb_help_cat = new IModel("help_category");
		$cat_row = $tb_help_cat->query("id={$id}");
		if($cat_row)
		{
			$this->cat_row = end($cat_row);
		}
		else
		{
			$this->cat_row = array('id'=>0,'name'=>'站点帮助');
		}
		$this->redirect("help_list");
	}

	//团购页面
	function groupon()
	{
		$id = IFilter::act(IReq::get("id"),'int');
       //指定某个团购
		if($id)
		{
			$this->regiment_list = Api::run('getRegimentRowById',array('#id#',$id));
			$this->regiment_list = $this->regiment_list ? array($this->regiment_list) : array();
		}
		else
		{
			$this->regiment_list = Api::run('getRegimentList');
		}

		//往期团购
		$this->ever_list = Api::run('getEverRegimentList');
		$this->redirect("groupon");
	}
    //选购电影票
    public function movie_seat(){
        $id=$_GET['id'];
        $videoObj=new IModel('video');
        $arr_video=$videoObj->getObj("id='$id'");
        $this->arr_video=$arr_video;
        $this->redirect('movie_seat');
    }
    //电影票入库
    public function movie_add(){
        $sell_id=$this->user['user_id'];//用户id
        $seat=$_POST['seats'];//获取座位
        $movie_id=$_POST['id'];//电影id
        $tiaoma = rand(10000,99999);//随机数
        $flag="是";//电子票是否兑换
        $nowtime=date("Y-m-d H:i:s",time());//当前系统时间
        $videoObj=new IModel('video');//实例化电影表
        $arr=$videoObj->getObj("id='$movie_id'");//查询单条数据
        $watch_time=$arr['watch_time'];//查询放映时间
        $gqtime=strtotime($watch_time)-strtotime($nowtime);//过期时间
        //$time=date("00-00-d H:i:s",$gqtime);//过期时间
        $createtime=$nowtime;
        $data=array(
            "sell_id"=>$sell_id,
            "seat"=>$seat,
            "movie_id"=>$movie_id,
            "tiaoma"=>$tiaoma,
            "flag"=>$flag,
            "gqtime"=>$gqtime,
            "createtime"=>$createtime
        );
        $cinemaObj=new IModel('cinema');
        $cinemaObj->setData($data);
        $res=$cinemaObj->add();
        echo $res;die;
        if($res){
            echo 1;
        }
        else{
            echo 0;
        }

    }
}
