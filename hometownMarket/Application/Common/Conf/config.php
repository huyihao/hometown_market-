<?php
return array(
	//'配置项'=>'配置值'
		//数据库配置信息
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => '127.0.0.1', // 服务器地址
		'DB_NAME' => 'market', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => '1234', // 密码
		'DB_PORT' => 3306, // 端口
		'DB_PREFIX' => 'tt_', // 数据库表前缀
		'DB_CHARSET'=> 'utf8', // 字符集
		'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

		
		'TMPL_PARSE_STRING' => array(
				'__STATIC__' => __ROOT__ . '/Public/Static', //静态文件
// 				'__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons', //插件目录
				'__IMG__'    => __ROOT__ . '/Public/Img', //图片目录
				'__CSS__'    => __ROOT__ . '/Public/Css', //CSS目录
				'__JS__'     => __ROOT__ . '/Public/Js', //JS目录
		),
);