<?php

/**
 * ブログコメント
 * 呼出箇所：ブログ記事詳細
 *
 * @var BcAppView $this
 * @var array $dbData コメントデータ
 */
?>


<?php if (!empty($dbData)) : ?>
	<?php if ($dbData['status']) : ?>
		<div class="bs-blog-comment__list-item" id="Comment<?php echo $dbData['no'] ?>">
			<div class="bs-blog-comment__list-item-name">
				<?php if ($dbData['url']) : ?>
					<?php $this->BcBaser->link($dbData['name'], $dbData['url'], ['target' => '_blank', 'escape' => true]) ?>
				<?php else : ?>
					<?php echo h($dbData['name']) ?>
				<?php endif ?>
			</div>
			<div class="bs-blog-comment__list-item-message">
				<?php echo nl2br($this->BcText->autoLinkUrls($dbData['message'])) ?>
			</div>
		</div>
	<?php endif ?>
<?php endif ?>
