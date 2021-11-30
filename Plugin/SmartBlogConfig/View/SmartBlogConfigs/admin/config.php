<?php

/**
 * [SmartBlogConfig] View
 *
 * @link			http://blog.kaburk.com/
 * @author			kaburk
 * @package			smart-blog
 * @license			MIT
 *
 * @var BcAppView $this
 */
?>
<section class="bca-section" data-bca-section-type='form-group'>

	<?php echo $this->BcForm->create('SmartBlogConfig', ['type' => 'file']) ?>

	<?php echo $this->BcFormTable->dispatchBefore() ?>

	<h2 class="bca-main__heading" data-bca-heading-size="lg"><?php echo __d('baser', 'SNSアカウント') ?></h2>

	<table class="form-table bca-form-table section" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('SmartBlogConfig.twitter_account', __d('baser', 'Twitterアカウント')) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input(
					'SmartBlogConfig.twitter_account',
					[
						'type' => 'text',
						'size' => 100,
						'maxlength' => 255,
						'autofocus' => true,
						'class' => 'bca-textbox__input',
						'placeholder' => 'Twitterアカウント名を入力してください。例：@TWITTER_ACCOUNT_NAME',
					]
				);
				?>
				<?php echo $this->BcForm->error('SmartBlogConfig.twitter_account') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('SmartBlogConfig.facebook_account', __d('baser', 'Facebook アカウント')) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input(
					'SmartBlogConfig.facebook_account',
					[
						'type' => 'text',
						'size' => 100,
						'maxlength' => 255,
						'autofocus' => true,
						'class' => 'bca-textbox__input',
						'placeholder' => 'Facebookアカウント名を入力してください。',
					]
				);
				?>
				<?php echo $this->BcForm->error('SmartBlogConfig.facebook_account') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('SmartBlogConfig.instagram_account', __d('baser', 'Instagram アカウント')) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input(
					'SmartBlogConfig.instagram_account',
					[
						'type' => 'text',
						'size' => 100,
						'maxlength' => 255,
						'autofocus' => true,
						'class' => 'bca-textbox__input',
						'placeholder' => 'Instagramアカウント名を入力してください。',
					]
				);
				?>
				<?php echo $this->BcForm->error('SmartBlogConfig.instagram_account') ?>
			</td>
		</tr>
	</table>

	<h2 class="bca-main__heading" data-bca-heading-size="lg"><?php echo __d('baser', 'OGP関連') ?></h2>

	<table class="form-table bca-form-table section" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('SmartBlogConfig.facebook_app_id', __d('baser', 'Facebook app_id')) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input(
					'SmartBlogConfig.facebook_app_id',
					[
						'type' => 'text',
						'size' => 100,
						'maxlength' => 255,
						'autofocus' => true,
						'class' => 'bca-textbox__input',
						'placeholder' => 'Facebookインサイトを利用したい場合は、Facebook for DevelopersからアプリIDを取得してセット下さい。',
					]
				);
				?>
				<?php echo $this->BcForm->error('SmartBlogConfig.facebook_app_id') ?>
			</td>
		</tr>
	</table>

	<h2 class="bca-main__heading" data-bca-heading-size="lg"><?php echo __d('baser', 'Google Adsense') ?></h2>

	<table class="form-table bca-form-table section" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('SmartBlogConfig.adsense_index', __d('baser', 'ブログ記事一覧')) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input(
					'SmartBlogConfig.adsense_index',
					[
						'type' => 'textarea',
						'rows' => 8,
						'cols' => 100,
						'autofocus' => true,
						'class' => 'bca-textbox__input',
						'placeholder' => 'アドセンスのタグを貼り付けてください。',
					]
				);
				?>
				<?php echo $this->BcForm->error('SmartBlogConfig.adsense_index') ?>
			</td>
		</tr>
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('SmartBlogConfig.adsense_single', __d('baser', 'ブログ記事詳細')) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input(
					'SmartBlogConfig.adsense_single',
					[
						'type' => 'textarea',
						'rows' => 8,
						'cols' => 100,
						'autofocus' => true,
						'class' => 'bca-textbox__input',
						'placeholder' => 'アドセンスのタグを貼り付けてください。',
					]
				);
				?>
				<?php echo $this->BcForm->error('SmartBlogConfig.adsense_single') ?>
			</td>
		</tr>
	</table>

	<h2 class="bca-main__heading" data-bca-heading-size="lg"><?php echo __d('baser', 'DNSプリフェッチ') ?></h2>

	<table class="form-table bca-form-table section" data-bca-table-type="type2">
		<tr>
			<th class="col-head bca-form-table__label">
				<?php echo $this->BcForm->label('SmartBlogConfig.dns_prefetch', __d('baser', 'ドメイン一覧')) ?>
			</th>
			<td class="col-input bca-form-table__input">
				<?php
				echo $this->BcForm->input(
					'SmartBlogConfig.dns_prefetch',
					[
						'type' => 'textarea',
						'rows' => 10,
						'cols' => 100,
						'autofocus' => true,
						'class' => 'bca-textbox__input',
						'placeholder' => 'DNSプリフェッチするドメインを貼り付けてください。',
						'default' => '
www.googletagmanager.com
www.google-analytics.com
ajax.googleapis.com
cdnjs.cloudflare.com
pagead2.googlesyndication.com
googleads.g.doubleclick.net
tpc.googlesyndication.com
ad.doubleclick.net
www.gstatic.com
cse.google.com
fonts.gstatic.com
fonts.googleapis.com

cms.quantserve.com
secure.gravatar.com
cdn.syndication.twimg.com
cdn.jsdelivr.net
images-fe.ssl-images-amazon.com
completion.amazon.com
m.media-amazon.com
i.moshimo.com
aml.valuecommerce.com
dalc.valuecommerce.com
dalb.valuecommerce.com
',
					]
				);
				?>
				<?php echo $this->BcForm->error('SmartBlogConfig.dns_prefetch') ?>
			</td>
		</tr>

		<?php echo $this->BcForm->dispatchAfterForm('option') ?>
	</table>

	<?php echo $this->BcFormTable->dispatchAfter() ?>

	<section class="bca-actions">
		<div class="bca-actions__main">
			<?php echo $this->BcForm->submit(
				__d('baser', '保存'),
				[
					'id' => 'BtnSave',
					'div' => false,
					'class' => 'button bca-btn bca-actions__item',
					'data-bca-btn-type' => 'save',
					'data-bca-btn-size' => 'lg',
					'data-bca-btn-width' => 'lg',
				]
			) ?>
		</div>
	</section>

	<?php echo $this->BcForm->end() ?>

</section>

<script>
	$(function() {
		$("#BtnSave").click(function() {
			$.bcUtil.showLoader();
		});
	});
</script>

<style>

</style>
