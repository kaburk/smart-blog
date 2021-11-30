<?php

class SmartBlogHelper extends AppHelper {
	public function __construct(View $View, $settings = []) {
		parent::__construct($View, $settings);
		try {
			$SmartBlogConfig = ClassRegistry::init('SmartBlogConfig.SmartBlogConfig');
		} catch (Exception $ex) {
			return false;
		}
		$this->SmartBlogConfig = $SmartBlogConfig->findExpanded();
		ClassRegistry::removeObject('SmartBlogConfig.SmartBlogConfig');
	}

	public function getConfig($key) {
		return $this->SmartBlogConfig[$key];
	}
	public function getConfigs() {
		return $this->SmartBlogConfig;
	}
}
