<?php

/**
 * JSON-LD 構造化データマークアップ 表示
 *
 * @var BcAppView $this
 */

// type
$jsonLdType = 'website';
if ($this->BcBaser->isBlogSingle()) {
	$jsonLdType = 'article';
} elseif ($this->BcBaser->isBlog()) {
	$jsonLdType = 'blog';
}

if ($this->BcBaser->isBlogSingle()) {
	$image = '/img/ogp.png';
	$currentContent = $this->BcBaser->getCurrentContent();
	// コンテンツ管理オプションのアイキャッチをセット
	$image = $this->BcUpload->uploadImage('Content.eyecatch', $currentContent['eyecatch'], array(
		'imgsize' => '', 'link' => false, 'output' => 'url', 'noimage' => $image,
	));
	if ($this->BcBaser->isBlogSingle()) {
		$eyeCatchImage = $this->Blog->getEyeCatch($post, ['imgsize' => '', 'output' => 'url']);
		if ($eyeCatchImage) {
			// アイキャッチがあるときはセット
			$image = $eyeCatchImage;
		} else {
			// アイキャッチがないときは記事の中の最初の画像をセット
			$postImage = $this->Blog->getPostImg($post, ['output' => 'url']);
			if ($postImage) {
				$image = $postImage;
			}
		}
	}
	if ($image) {
		$image = $this->BcBaser->getUri($image);
	}
	$author = $this->BcBaser->getUserName($post['User']);
	$blogUrl = $this->BcBaser->getContentsUrl($this->request->params['Content']['url']);
	$jsonLd = [
		'@context' => 'https://schema.org',
		'@type' => 'NewsArticle',
		'mainEntityOfPage' => [
			'@type' => 'WebPage',
			'@id' => h($this->BcBaser->getUri('/')),
		],
		'headline' => $this->BcBaser->getContentsTitle(),
		'image' => [
			'@type' => 'ImageObject',
			'url' => $image,
			'width' => 300,
			'height' => 240
		],
		"author" => [
			'url' => h($this->BcBaser->getUri($blogUrl . 'archives/author/' . $post['User']['name'])),
			"@type" => "Person",
			"name" => $author,
		],
		"description" => h(preg_replace('[\n|\r|\r\n|\t]', '', strip_tags($this->BcBaser->getDescription()))),
	];
	if (!empty($post['BlogPost']['publish_start'])) :
		$jsonLd['datePublished'] = gmdate('Y-m-d\TH:i:s\+09:00', strtotime($post['BlogPost']['publish_start']));
	else :
		$jsonLd['datePublished'] = gmdate('Y-m-d\TH:i:s\+09:00', strtotime($post['BlogPost']['posts_date']));
	endif;
	$jsonLd['dateModified'] = gmdate('Y-m-d\TH:i:s\+09:00', strtotime($post['BlogPost']['modified']));
} else {
	$jsonLd = [
		'@context' => 'https://schema.org',
		'@type' => 'WebSite',
		'url' => h($this->BcBaser->getUri('/')),
		'potentialAction' => [
			'@type' => 'SearchAction',
			'target' =>  h($this->BcBaser->getUri('/')) . 'search_indices/search?q={query}',
			'query-input' => 'required name=query',
		],
	];
}
if (!empty($jsonLd)) :
?>
	<script type="application/ld+json">
		<?php echo json_encode($jsonLd, JSON_PRETTY_PRINT); ?>
	</script>
<?php
endif;
