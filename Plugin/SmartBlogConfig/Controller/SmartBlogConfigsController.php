<?php

/**
 * [SmartBlogConfig] Controller
 *
 * @link			http://blog.kaburk.com/
 * @author			kaburk
 * @package			smart-blog
 * @license			MIT
 */
class SmartBlogConfigsController extends AppController {

	public $uses = [
		'Content',
		'Site',
		'SmartBlogConfig.SmartBlogConfig',
	];

	public $components = [
		'BcAuth',
		'Cookie',
		'BcAuthConfigure',
		'BcMessage',
	];

	public function beforeFilter() {
		parent::beforeFilter();
	}

	/**
	 * [ADMIN] config
	 */
	public function admin_config() {

		$this->pageTitle = 'smart-blogテーマ 設定項目';

		if (empty($this->request->data)) {
			$this->request->data['SmartBlogConfig'] = $this->SmartBlogConfig->findExpanded();
		} else {
			$this->SmartBlogConfig->set($this->request->data);
			if (!$this->SmartBlogConfig->validates()) {
				$this->BcMessage->setError(__d('baser', '入力エラーです。内容を修正してください。'));
			} else {
				$this->SmartBlogConfig->saveKeyValue($this->request->data);
				clearAllCache();
				$this->BcMessage->setSuccess(__d('baser', '各種設定を保存しました。'));
				$this->redirect(['action' => 'config']);
			}
		}
	}
}
