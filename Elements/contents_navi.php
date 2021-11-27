<?php

/**
 * コンテンツナビ
 * 呼出箇所：固定ページ
 *
 * BcBaserHelper::contentsNavi() で呼び出す
 * （例）<?php $this->BcBaser->contentsNavi() ?>
 *
 * @var BcAppView $this
 */
?>


<?php if (!$this->BcBaser->isHome() && $this->BcBaser->isPage()) : ?>
	<div class="bs-contents-navi">
		<?php $this->BcPage->prevLink() ?><?php $this->BcPage->nextLink() ?>
	</div>
<?php endif ?>
