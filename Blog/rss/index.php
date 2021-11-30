<?php

/**
 * [PUBLISH] RSS
 *
 * @var BcAppView $this
 */
?>
<?php
if ($posts) {
	echo $this->Rss->items($posts, 'transformRSS');
}

function transformRSS($data) {
	$view = new View();
	$blogHelper = new BlogHelper($view);
	$bcBaserhelper = new BcBaserHelper($view);
	$url = $bcBaserhelper->getContentsUrl(null, false, null, false) . 'archives/' . $data['BlogPost']['no'];
	$results = [
		'title' => $data['BlogPost']['name'],
		'link' => $url,
		'guid' => $url,
		'category' => $data['BlogCategory']['title'],
		'description' => $blogHelper->removeCtrlChars($data['BlogPost']['content'] . $data['BlogPost']['detail']),
		'pubDate' => $data['BlogPost']['posts_date'],
	];
	if (!empty($data['BlogPost']['eye_catch'])) {
		$results['enclosure'] = [
			'url' => Router::url($blogHelper->getEyeCatch($data, ['imgsize' => '', 'output' => 'url']), true),
			// 'type' => '',
			// 'length' => '',
		];
	}
	return $results;
}

?>
