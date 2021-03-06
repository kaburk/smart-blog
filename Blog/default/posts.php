<?php

/**
 * @var BcAppView $this
 * @var array $posts ブログ記事リスト
 */
?>

<?php if (!empty($posts)) : ?>
	<ul class="bs-blog-post">
		<?php foreach ($posts as $key => $post) : ?>
			<?php
			$class = ['bs-blog-post__item', 'post-' . $post['BlogPost']['id']];
			if ($this->BcArray->first($posts, $key)) {
				$class[] = 'first';
			} elseif ($this->BcArray->last($posts, $key)) {
				$class[] = 'last';
			}
			if ($key > 0 && $key % 3 == 0) :
				echo $this->SmartBlog->getConfig('adsense_index');
			endif;
			?>
			<li class="<?php echo implode(' ', $class) ?>">
				<article id="bs-blog-post-<?php echo $post['BlogPost']['id'] ?>" class="bs-blog-post__item-article">
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
						<?php echo $this->Blog->getEyeCatch($post, [
							'link' => false,
							'class' => 'bs-blog-post__item-eye-catch',
							'noimage' => '/img/noimage.png',
							'width' => '300',
						]); ?>
					</figure>
					<div class="bs-blog-post__item-content">
						<h2 class="bs-blog-post__item-h2">
							<?php echo $this->Blog->getPostTitle($post, true, ['class' => 'bs-blog-post__item-title']) ?>
						</h2>
						<?php if (strip_tags($post['BlogPost']['content'])) : ?>
							<div class="bs-blog-post__item-detail">
								<a href="<?php echo $this->Blog->getPostLinkUrl($post) ?>">
									<?php echo $this->BcText->truncate(nl2br(strip_tags($post['BlogPost']['content'])), 200) ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="bs-blog-post__item-meta">
							<?php if (!empty($post['BlogContent']['tag_use'])) : ?>
								<span class="bs-blog-post__item-tag">
									<?php
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
								</span>
							<?php endif; ?>
							<span class="bs-blog-post__item-date">
								<i class="far fa-clock"></i>
								<?php $this->Blog->postDate($post, 'Y/m/d H:i') ?>
							</span>
						</div>
					</div>
				</article>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class="bs-blog-post-to-list">
		<?php $this->BcBaser->link(
			'VIEW ALL',
			$this->Blog->getContentsUrl(
				$posts[0]['BlogPost']['blog_content_id'],
				false
			)
		); ?>
	</div>
<?php else : ?>
	<p class="bs-blog-post-no-data">
		<?php echo __('記事がありません。'); ?>
	</p>
<?php endif ?>
