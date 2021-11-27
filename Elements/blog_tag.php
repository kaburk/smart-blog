<?php

/**
 * ブログタグ
 * 呼出箇所：ブログトップ、ブログ記事詳細、カテゴリ別ブログ記事一覧、タグ別ブログ記事一覧、年別ブログ記事一覧、月別ブログ記事一覧、日別ブログ記事一覧
 *
 * @var BcAppView $this
 */
?>


<?php if (!empty($this->Blog->blogContent['tag_use'])) : ?>
	<?php if (!empty($post['BlogTag'])) : ?>
		<div class="bs-blog-tag"><?php echo __('タグ') ?>：<?php $this->Blog->tag($post) ?></div>
	<?php endif ?>
<?php endif ?>
