<?php

/**
 * ブログ SNSシェアボタン
 *
 * @var BcAppView $this
 */
?>
<p class="sns-share__icon">
	<?php
	$fullUrl = h($this->BcBaser->getUri($this->BcBaser->getHere()));
	?>
	<a href="https://twitter.com/share?url=<?php echo urlencode($fullUrl) ?>&amp;hashtags=<?php echo $this->BcBaser->getSiteName() ?>&amp;text=<?php echo $this->BcBaser->getContentsTitle() ?>" rel="nofollow" target="_blank">
		<i class="fab fa-twitter"></i> <span class="sns_name">Twitter</span>
	</a>
	<a href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode($fullUrl) ?>&amp;title=<?php echo $this->BcBaser->getContentsTitle() ?>" target="_blank" rel="nofollow">
		<i class="fa fa-hatena"></i> <span class="sns_name">bookmark</span>
	</a>
	<a href="http://www.facebook.com/share.php?u=<?php echo urlencode($fullUrl) ?>" target="_blank" rel="nofollow">
		<i class="fab fa-facebook"></i> <span class="sns_name">Facebook</span>
	</a>
	<a href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode($fullUrl) ?>" target=" blank" rel="nofollow">
		<i class="fab fa-line"></i> <span class="sns_name">LINE</span>
	</a>
	<a href="http://getpocket.com/edit?url=<?php echo $fullUrl ?>&amp;title=<?php echo $this->BcBaser->getContentsTitle() ?>" rel="nofollow" onclick="javascript:window.open(encodeURI(decodeURI(this.href)), 'pkwindow', 'width=600, height=600, personalbar=0, toolbar=0, scrollbars=1');return false;">
		<i class="fab fa-get-pocket"></i> <span class="sns_name">Pocket</span>
	</a>
	<?php if ($this->BcBaser->isBlog()) : ?>
		<?php
		$rssUrl = h($this->BcBaser->getUri($this->BcBaser->getContentsUrl() . 'index.rss'));
		?>
		<a href="https://feedly.com/i/subscription/feed%2F<?php echo urlencode($rssUrl) ?>" target=" blank" rel="nofollow">
			<i class="fas fa-rss-square"></i> <span class="sns_name">Feedly</span>
		</a>
		<a href="<?php echo $rssUrl ?>" target="_blank" rel="nofollow">
			<i class="fas fa-rss"></i> <span class="sns_name">RSS</span>
		</a>
	<?php endif ?>

</p>
