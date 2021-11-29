<?php

/**
 * metaタグ表示
 *
 * @var BcAppView $this
 */

// meta 各種
//$title = $this->BcBaser->getTitle(' | ', ['tag' => false]);
if ($this->BcBaser->isHome()) {
	$title = h($this->BcBaser->getSiteName());
} else {
	$title = h($this->BcBaser->getContentsTitle()) . ' | ' . h($this->BcBaser->getSiteName());
}
$description = h(preg_replace('[\n|\r|\r\n|\t]', '', strip_tags($this->BcBaser->getDescription())));
$fullUrl = h($this->BcBaser->getUri($this->BcBaser->getHere()));

// OGP type
$ogType = 'website';
if ($this->BcBaser->isBlogSingle()) {
	$ogType = 'article';
} elseif ($this->BcBaser->isBlog()) {
	$ogType = 'blog';
}

// OGP imahe (アイキャッチ画像)
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
?>

<?php /* meta */ ?>
<meta name="description" content="<?php echo $description ?>">
<?php $this->BcBaser->metaKeywords() ?>
<title><?php echo $title ?></title>
<?php $this->BcBaser->icon() ?>

<?php /* OGP */ ?>
<meta property="og:type" content="<?php echo $ogType ?>">
<meta property="og:description" content="<?php echo $description ?>">
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:url" content="<?php echo $fullUrl ?>">
<meta property="og:image" content="<?php echo $image ?>">
<meta property="og:site_name" content="<?php echo h($this->BcBaser->getSiteName()) ?>">
<meta property="og:locale" content="ja_JP">
<meta property="fb:app_id" content="2192137084154983">

<?php /*
// Facebookインサイトを利用したい場合は、Facebook for DevelopersからアプリIDを取得して下記にセット下さい。
<meta property="fb:app_id" content="FacebookアプリID">
*/ ?>

<?php if ($this->BcBaser->isBlogSingle()) : ?>
	<?php
	// og:type が article の場合の追加タグ各種
	$author = $this->BcBaser->getUserName($post['User']);
	$category = $this->Blog->getCategory($post, ['link' => false]);
	$tags = $this->Blog->getTag($post, ['link' => false]);
	?>
	<?php if (!empty($post['BlogPost']['publish_start'])) : ?>
		<meta property="article:published_time" content="<?php echo gmdate('Y-m-d\TH:i:s\+09:00', strtotime($post['BlogPost']['publish_start'])) ?>">
	<?php else : ?>
		<meta property="article:published_time" content="<?php echo gmdate('Y-m-d\TH:i:s\+09:00', strtotime($post['BlogPost']['posts_date'])) ?>">
	<?php endif ?>
	<?php if (!empty($post['BlogPost']['publish_end'])) : ?>
		<meta property="article:expiration_time" content="<?php echo gmdate('Y-m-d\TH:i:s\+09:00', strtotime($post['BlogPost']['publish_end'])) ?>">
	<?php endif ?>
	<meta property="article:modified_time" content="<?php echo gmdate('Y-m-d\TH:i:s\+09:00', strtotime($post['BlogPost']['modified'])) ?>">
	<?php if ($author) : ?>
		<meta property="article:author" content="<?php echo $author ?>">
	<?php endif; ?>
	<?php if ($category) : ?>
		<meta property="article:section" content="<?php echo $category ?>">
	<?php endif; ?>
	<?php if ($tags) :
		foreach ($tags as $tag) :
	?>
			<meta property="article:tag" content="<?php echo $tag['name'] ?>">
	<?php
		endforeach;
	endif;
	?>
<?php endif ?>

<?php /* Twitter Card */ ?>
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:description" content="<?php echo $description ?>">
<meta property="twitter:title" content="<?php echo $title ?>">
<meta property="twitter:url" content="<?php echo $fullUrl ?>">
<meta name="twitter:image" content="<?php echo $image ?>">
<meta name="twitter:domain" content="<?php echo env('HTTP_HOST') ?>">
<meta name="twitter:site" content="@chibimegane88">
<?php /*
// Twitterアカウントをお持ちの方は下記にアカウント名を設定してください
<meta name="twitter:site" content="@TWITTER_ACCOUNT_NAME">
*/ ?>

<?php /* サムネイル画像（スマホなどで表示する） */ ?>
<meta name="thumbnail" content="<?php echo h($this->BcBaser->getUri('/img/screenshot.png')); ?>">

<?php
/* rss feed */
$Content = ClassRegistry::init('Content');
$conditions = $Content->getConditionAllowPublish();
$conditions['Content.plugin'] = 'Blog';
$conditions['Content.type'] = 'BlogContent';
$blogs = $Content->find('all', [
	'conditions' => $conditions,
	'order' => ['Content.entity_id' => 'ASC'],
	'recursive' => -1,
]);

if (!empty($blogs)) :
	foreach ($blogs as $blog) :
?>
		<link rel="alternate" type="application/rss+xml" title="<?php echo $blog['Content']['name'] ?>&raquo; RSS feed" href="<?php echo $blog['Content']['url'] ?>index.rss" />
<?php
	endforeach;
endif;
?>
