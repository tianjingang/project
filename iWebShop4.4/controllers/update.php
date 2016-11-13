<?php
/**
 * @brief 升级更新控制器
 */
class Update extends IController
{
	/**
	 * @brief iwebshop15122300 版本升级更新
	 */
	public function index()
	{
		set_time_limit(0);
		$sql = array(
			"CREATE TABLE `{pre}plugin` (
			  `id` int(11) unsigned NOT NULL auto_increment COMMENT '插件ID',
			  `name` varchar(255) NOT NULL COMMENT '插件名称',
			  `class_name` varchar(255) NOT NULL COMMENT '插件类库名称',
			  `config_param` text COMMENT '配置参数',
			  `description` text COMMENT '描述说明',
			  `is_open` tinyint(1) NOT NULL default '1' COMMENT '安装状态 0禁用 1启用',
			  `sort` smallint(5) NOT NULL default '99' COMMENT '排序',
			  PRIMARY KEY  (`id`),
			  UNIQUE KEY (`class_name`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='插件表';",

			"ALTER TABLE `{pre}seller` ADD `seller_message_ids` TEXT default NULL COMMENT '商户消息ID' ",

			"CREATE TABLE IF NOT EXISTS `{pre}seller_message` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `title` varchar(255) NOT NULL COMMENT '标题',
			  `content` text COMMENT '内容',
			  `time` datetime NOT NULL COMMENT '发送时间',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商家消息';",

			"ALTER TABLE  `{pre}member` ADD INDEX (  `mobile` )",
			"ALTER TABLE  `{pre}member` ADD index (`status`,`true_name`)",

			"ALTER TABLE  `{pre}seller` ADD index (`seller_name`,`password`)",
			"ALTER TABLE  `{pre}seller` ADD index (`true_name`)",
			"ALTER TABLE  `{pre}seller` ADD index (`is_vip`)",
			"ALTER TABLE  `{pre}seller` ADD index (`is_del`)",
			"ALTER TABLE  `{pre}seller` ADD index (`is_lock`)",
			"ALTER TABLE  `{pre}seller` ADD index (`email`)",
			"ALTER TABLE  `{pre}seller` ADD index (`sort`)",

			"ALTER TABLE  `{pre}goods` ADD index (`seller_id`,`is_del`)",
			"ALTER TABLE  `{pre}goods` ADD index (`store_nums`,`is_del`)",
			"ALTER TABLE  `{pre}goods` ADD index (`brand_id`,`is_del`)",
			"ALTER TABLE  `{pre}goods` ADD index (`brand_id`,`sell_price`)",
			"ALTER TABLE  `{pre}goods` ADD index (`name`)",
			"ALTER TABLE  `{pre}goods` ADD index (`goods_no`)",
			"ALTER TABLE  `{pre}goods` ADD index (`is_share`)",
			"ALTER TABLE  `{pre}goods` ADD index (`sell_price`)",
			"ALTER TABLE  `{pre}goods` ADD index (`grade`,`comments`,`seller_id`)",
			"ALTER TABLE  `{pre}goods` ADD index (`sale`,`seller_id`)",

			"ALTER TABLE  `{pre}order` ADD index (`seller_id`)",
			"ALTER TABLE  `{pre}order` ADD index (`status`)",
			"ALTER TABLE  `{pre}order` ADD index (`order_amount`)",
			"ALTER TABLE  `{pre}order` ADD index (`completion_time`)",
			"ALTER TABLE  `{pre}order` ADD index (`send_time`)",
			"ALTER TABLE  `{pre}order` ADD index (`distribution_status`)",
			"ALTER TABLE  `{pre}order` ADD index (`pay_status`)",
			"ALTER TABLE  `{pre}order` ADD index (`accept_name`)",
			"ALTER TABLE  `{pre}order` ADD index (`is_checkout`)",

			//4.4beta3
			"ALTER TABLE `{pre}comment` ADD `seller_id` int(11) unsigned NOT NULL default '0' COMMENT '商家ID' ",
			"UPDATE `{pre}comment` as c join {pre}goods as go on go.seller_id = c.goods_id SET c.seller_id = go.seller_id ",

			"ALTER TABLE `{pre}seller` ADD `grade` int(11) NOT NULL default '0' COMMENT '评分总数' ",
			"update `{pre}seller` as s set s.grade = (select sum(go.grade) from {pre}goods as go where go.seller_id = s.id)",

			"ALTER TABLE `{pre}seller` ADD `sale` int(11) NOT NULL default '0' COMMENT '总销量' ",
			"update `{pre}seller` as s set s.sale = (select sum(go.sale) from {pre}goods as go where go.seller_id = s.id)",

			"ALTER TABLE `{pre}seller` ADD `comments` int(11) NOT NULL default '0' COMMENT '评论次数' ",
			"update `{pre}seller` as s set s.comments = (select sum(go.comments) from {pre}goods as go where go.seller_id = s.id)",

			"ALTER TABLE `{pre}member` ADD `email` varchar(255) default NULL COMMENT '邮箱' ",
			"UPDATE `{pre}user` as u join {pre}member as m on u.id = m.user_id SET m.email = u.email ",
			"ALTER TABLE `{pre}user` DROP `email` ",
		);

		foreach($sql as $key => $val)
		{
			IDBFactory::getDB()->query( $this->_c($val) );
		}

		//配置文件增加拦截器
		//写入的配置文件
		$configFile = IWeb::$app->getBasePath().'config/config.php';
		IWeb::$app->config['interceptor'] = array('themeroute@onCreateController','layoutroute@onCreateView','plugin');
		Config::edit($configFile,array('interceptor' => IWeb::$app->config['interceptor']));

		die("升级成功!! V4.4版本");
	}

	public function _c($sql)
	{
		return str_replace('{pre}',IWeb::$app->config['DB']['tablePre'],$sql);
	}
}