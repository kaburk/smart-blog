<?php

/**
 * ブログ記事詳細ページ
 * 呼出箇所：ブログ記事詳細ページ
 *
 * @var BcAppView $this
 * @var array $post ブログ記事データ
 */
$this->BcBaser->setDescription($this->Blog->getPostContent($post, false, false, 100, '…'));
?>

<h1 class="bs-single-post-title"><?php $this->BcBaser->contentsTitle() ?></h1>

<article class="bs-single-post">
	<div class="bs-single-post__sns-share bs-single-post__sns-share-top">
		<?php $this->BcBaser->element('blog_post_sns_share') ?>
	</div>
	<div class="bs-single-post__meta">
		<?php
		$category = $this->Blog->getCategory($post, ['link' => false]);
		if ($category) :
			$this->BcBaser->link(
				'<i class="fas fa-folder-open"></i> ' . $post['BlogCategory']['title'],
				$this->Blog->getCategoryUrl($post['BlogCategory']['id']),
				['class' => 'bs-single-post__meta-category']
			);
		endif;
		$tags = $this->Blog->getTag($post, ['link' => false]);
		if ($tags) :
			foreach ($tags as $tag) :
				$this->BcBaser->link(
					'<i class="fas fa-tags"></i> ' . $tag['name'],
					$tag['url'],
					['class' => 'bs-single-post__meta-tag']
				);
			endforeach;
		endif;
		?>
		<span class="bs-single-post__meta-date">
			<i class="far fa-clock"></i>
			<?php $this->Blog->postDate($post, 'Y/m/d H:i') ?>
		</span>
	</div>
	<?php if ($this->Blog->getEyeCatch($post)) : ?>
		<div class="bs-single-post__eye-catch">
			<?php $this->Blog->eyeCatch($post, [
				'link' => false,
				'imgsize' => 'default',
				'width' => '600',
			]) ?>
		</div>
	<?php endif ?>

	<?php echo $this->SmartBlog->getConfig('adsense_single'); ?>

	<?php echo $post['BlogPost']['detail'] ?>

	<?php echo $this->SmartBlog->getConfig('adsense_single'); ?>

	<div class="bs-single-post__sns-share bs-single-post__sns-share-bottom">
		<?php $this->BcBaser->element('blog_post_sns_share') ?>
	</div>
</article>

<div class="bs-blog-contents-navi clearfix">
	<?php $this->Blog->prevLink($post) ?>
	<?php $this->Blog->nextLink($post) ?>
</div>

<?php $this->BcBaser->element('blog_related_posts') ?>

<?php $this->BcBaser->element('blog_comments') ?>
