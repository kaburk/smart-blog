<?php

/**
 * フッター
 *
 * BcBaserHelper::footer() で呼び出す
 * （例）<?php $this->BcBaser->footer() ?>
 *
 * @var BcAppView $this
 */
?>

<footer class="bs-footer">
	<p class="bs-footer__copyright">
		Copyright(C) <?php $this->BcBaser->copyYear(2021) ?> <?php echo h($siteConfig['name']) ?> All rights Reserved.
	</p>
</footer>
