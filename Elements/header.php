<?php

/**
 * ヘッダー
 *
 * BcBaserHelper::header() で呼び出す
 * （例）<?php $this->BcBaser->header() ?>
 *
 * @var BcAppView $this
 */
$isSmartphone = $this->request->is('smartphone');
?>
<header class="bs-header">
	<div class="bs-header__inner">
		<div class="bs-header__description">
			<?php echo $siteConfig['description']; ?>
		</div>
		<h1 class="bs-header__logo">
			<?php //$this->BcBaser->logo(['class' => 'bs-header__logo'])
			?>
			<?php $this->BcBaser->link(
				'<span class="site-name-text">' . $siteConfig['name'] . '</span>',
				'/'
			); ?>
		</h1>

	</div>

	<div class="bs-header__menu-button" id="BsMenuBtn">
		<span></span>
		<span></span>
		<span></span>
	</div>

	<nav class="bs-header__nav<?php echo ($isSmartphone) ? '' : ' use-mega-menu' ?>" id="BsMenuContent">
		<!-- /Elements/global_menu.php -->
		<?php $this->BcBaser->globalMenu(2) ?>
	</nav>

</header>
