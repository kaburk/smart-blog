<?php

/**
 * [SmartBlogConfig] SmartBlogConfig model
 *
 * @link			http://blog.kaburk.com/
 * @author			kaburk
 * @package			smart-blog
 * @license			MIT
 */
class SmartBlogConfig extends AppModel {

	public $name = 'SmartBlogConfig';

	public $actsAs = [];

	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);

		$this->validate = [
			// 'acces_token' => [
			// 	[
			// 		'rule' => [
			// 			'notBlank',
			// 		],
			// 		'message' => __d('baser', 'アクセストークンを入力してください。'),
			// 		'required' => true,
			// 	],
			// ],
		];
	}
}
