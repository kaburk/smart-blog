<?php

/**
 * デフォルトレイアウト
 *
 * @var BcAppView $this
 */
$this->BcBaser->docType('html5') ?>
<html lang="ja">

<head>
	<?php $this->BcBaser->charset() ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
	<meta name="referrer" content="no-referrer-when-downgrade" />

	<?php $this->BcBaser->element('dns_prefetch') ?>
	<?php $this->BcBaser->element('meta') ?>

	<?php $this->BcBaser->icon() ?>
	<?php $this->BcBaser->css([
		'colorbox/colorbox-1.6.1',
		'editor',
		'style',
	]) ?>
	<?php $this->BcBaser->js([
		'jquery-1.11.3.min',
		'jquery.colorbox-1.6.1.min',
		'jquery-accessibleMegaMenu.min',
		'startup',
	]); ?>
	<?php
	if (BcUtil::loginUser()) :
		$this->BcBaser->css([
			'jquery-ui/jquery-ui-1.11.4',
		]);
		$this->BcBaser->js([
			'jquery-ui-1.11.4.min',
			'i18n/ui.datepicker-ja',
		]);
	endif;
	?>

	<!-- Preload -->
	<link rel="preload" as="font" type="font/woff" href="//use.fontawesome.com/releases/v5.15.4/webfonts/fa-brands-400.woff2" crossorigin>
	<link rel="preload" as="font" type="font/woff" href="//use.fontawesome.com/releases/v5.15.4/webfonts/fa-regular-400.woff2" crossorigin>
	<link rel="preload" as="font" type="font/woff" href="//use.fontawesome.com/releases/v5.15.4/webfonts/fa-solid-900.woff2" crossorigin>

	<?php $this->BcBaser->scripts() ?>

	<?php $this->BcBaser->element('json_id') ?>

	<?php $this->BcBaser->googleAnalytics() ?>
	<?php $this->BcBaser->element('google_tag_manager') ?>

</head>

<body id="<?php $this->BcBaser->contentsName() ?>">

	<div class="bs-container">

		<?php $this->BcBaser->header() ?>

		<?php if ($this->BcBaser->isHome()) : ?>
			<?php
			// $this->BcBaser->mainImage(['all' => true, 'num' => 5, 'width' => '100%', 'class' => 'bs-main-image'])
			?>
		<?php else : ?>
			<?php $this->BcBaser->crumbsList(['onSchema' => true]); ?>
		<?php endif ?>

		<div class="bs-wrap clearfix">

			<main class="bs-main-contents">
				<?php $this->BcBaser->flash() ?>

				<?php if ($this->BcBaser->isHome()) : ?>
					<?php
					$content = $this->BcBaser->getContent();
					if ($content) :
						echo $content;
					endif;
					?>
					<div class="bs-info">
						<?php $this->BcBaser->blogPosts('blog', 5) ?>
					</div>
				<?php else : ?>
					<?php $this->BcBaser->content(); ?>
				<?php endif ?>

				<?php $this->BcBaser->contentsNavi() ?>

			</main>

			<section class="bs-sub-contents">
				<?php $this->BcBaser->widgetArea() ?>
			</section>

		</div>

		<?php $this->BcBaser->footer() ?>

	</div>

	<?php $this->BcBaser->css([
		'//use.fontawesome.com/releases/v5.15.4/css/all.css',
	]) ?>

	<?php $this->BcBaser->func() ?>

</body>

</html>
