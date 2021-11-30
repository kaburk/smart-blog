<?php

/**
 * [BcLineNotify] setting
 *
 * @link			http://blog.kaburk.com/
 * @author			kaburk
 * @package			BcLineNotify
 * @license			MIT
 */

/**
 * システムナビ
 */
$config['BcApp.adminNavigation'] = [
	'Plugins' => [
		'menus' => [
			'SmartBlogConfig' => [
				'title' => 'SmartBlog設定',
				'url' => [
					'admin' => true,
					'plugin' => 'smart_blog_config',
					'controller' => 'smart_blog_configs',
					'action' => 'config',
				],
			],
		],
	],
];
