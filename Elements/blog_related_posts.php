<?php

/**
 * 関連投稿一覧
 *
 * @var BcAppView $this
 */
$relatedPosts = $this->Blog->getRelatedPosts($post, ['recursive' => 1]);
?>

<?php if ($relatedPosts) : ?>
	<div id="RelatedPosts">
		<h3 class="contents-head"><?php echo __('関連記事') ?></h3>
		<ul class="bs-blog-post">
			<?php foreach ($relatedPosts as $key => $relatedPost) : ?>
				<?php
				$class = ['bs-blog-post__item', 'post-' . $post['BlogPost']['id']];
				if ($this->BcArray->first($posts, $key)) {
					$class[] = 'first';
				} elseif ($this->BcArray->last($posts, $key)) {
					$class[] = 'last';
				}
				?>
				<li class="<?php echo implode(' ', $class) ?>">
					<article id="bs-blog-post-<?php echo $relatedPost['BlogPost']['id'] ?>" class="bs-blog-post__item-article">
						<figure class="bs-blog-post__item-figure">
							<?php
							if (!empty($post['BlogCategory']['id'])) :
								$this->BcBaser->link(
									'<i class="fas fa-folder-open"></i> ' . $post['BlogCategory']['title'],
									$this->Blog->getCategoryUrl($post['BlogCategory']['id']),
									['class' => 'bs-blog-post__item-category']
								);
							endif;
							?>
							<?php echo $this->Blog->getEyeCatch($relatedPost, [
								'link' => false,
								'class' => 'bs-blog-post__item-eye-catch',
								'noimage' => '/img/noimage.png',
								'width' => '300',
							]); ?>
						</figure>
						<div class="bs-blog-post__item-content">
							<h2 class="bs-blog-post__item-h2">
								<?php echo $this->Blog->getPostTitle($relatedPost, true, ['class' => 'bs-blog-post__item-title']) ?>
							</h2>
							<?php if (strip_tags($relatedPost['BlogPost']['content'] . $relatedPost['BlogPost']['detail'])) : ?>
								<div class="bs-blog-post__item-detail">
									<a href="<?php echo $this->Blog->getPostLinkUrl($relatedPost) ?>">
										<?php echo $this->Blog->getPostContent($relatedPost, true, false, 200, '...') ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="bs-blog-post__item-meta">
								<span class="bs-blog-post__item-tag">
									<i class="fas fa-tags"></i>
									<?php $this->Blog->tag($relatedPost, ['class' => 'bs-blog-post__item-category']) ?>
								</span>
								<span class="bs-blog-post__item-date">
									<i class="far fa-clock"></i>
									<?php $this->Blog->postDate($relatedPost, 'Y/m/d H:i') ?>
								</span>
							</div>
						</div>
					</article>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
