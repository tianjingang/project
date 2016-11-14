<?php 
/**
 * 八维教育 高端PHP
 * @Author: BING
 * @Email: itbing@sina.cn
 */

/** 获取URL后缀文件 */
function get_url()
{
	return basename($_SERVER['REQUEST_URI']);
}

/** 后台导航列表 */
function get_menu($curr = '')
{
	$menu = array(
		0 => array(
			'url'=>'list_art.php',
			'title'=>'新闻列表'
			),
		1 => array(
			'url'=>'add_art.php',
			'title'=>'添加新闻',
			),		
		3 => array(
			'url'=>'list_pro.php',
			'title'=>'产品列表'
			),
		4 => array(
			'url'=>'add_pro.php',
			'title'=>'添加产品',
			),			
		5 => array(
			'url'=>'huishou.php',
			'title'=>'新闻回收站'
			),			
		6 => array(
			'url'=>'cfg.php',
			'title'=>'店铺设置'
			)		
	);

	foreach($menu as $key=>$val)
	{
		if($curr == $val['url'])
		{
			$menu[$key]['active'] = 1;
		}
	}

	return $menu;
}

/** 分页函数 */


/** 错误输出 */
function show_alert($msg_list, $type = 1)
{
	if (count($msg_list) > 0)
	{
		$msg = fmt_errmsg($msg_list);
		$cssclass = $type == 1
			? 'alert alert-danger alert-dismissable'
			: 'alert alert-success alert-dismissable';
		$html = <<<ALERT
<div id="divAlert" class="$cssclass">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
$msg
</div>
ALERT;
		echo $html;
	}
}
?>