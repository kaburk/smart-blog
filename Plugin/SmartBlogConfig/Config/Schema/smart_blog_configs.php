<?php

/**
 * [SmartBlogConfig] CakeSchema
 *
 * @link			http://blog.kaburk.com/
 * @author			kaburk
 * @package			smart-blog
 * @license			MIT
 */
class SmartBlogConfigsSchema extends CakeSchema {

	public $name = 'SmartBlogConfig';
	public $file = 'smart_blog_configs.php';
	public $connection = 'plugin';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	public $smart_blog_configs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null),
		'value' => array('type' => 'text', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
	);
}
