<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="inner">

<article class="post">
<?php if(isset($this->fields->blogbox)):?>
	<a href="<?php $this->permalink() ?>" class="post-thumbnail"><img src="<?php echo $this->fields->blogbox; ?>" alt="<?php $this->title() ?>" /></a>
<?php else: ?>
<?php endif; ?>
	<div class="entry-box">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<div class="entry-meta">
				<time class="post-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('F j, Y'); ?></time> | <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('Leave a comment', '1 Comment', '%d Comments'); ?></a>
			</div>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php $this->content(); ?>
		</div><!-- .entry-content -->
		
				<footer class="entry-footer">
					<div class="share-post">
						<span>Share this:</span>
						<a class="btn-twitter" target="_blank" href="http://twitter.com/share?text=<?php $this->title() ?>&amp;url=<?php $this->permalink() ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span class="screen-reader-text">Twitter</span></a>
						<a class="btn-facebook" target="_blank" href="http://wwww.facebook.com/sharer.php?u=<?php $this->permalink() ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span></a>
						<a class="btn-google" target="_blank" href="http://plus.google.com/share?url=<?php $this->permalink() ?>"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="screen-reader-text">Google+</span></a>
					</div>
				</footer><!-- .entry-footer -->
	</div><!-- .entry-box -->
	<div class="author-box">
				<div class="author-info">
					<div class="author-image">
						<a class="author-avatar" href="javascript:;" style="background-image: url(<?php $this->options->themeUrl(); ?>images/gravatar.jpg)" title="Loekman's Picture"><span class="screen-reader-text">Loekman's Picture</span></a>
					</div>
					<div class="author-details">
						<h2 class="author-title">About  <a href="javascript:;">Loekman</a></h2>
						<p class="author-bio">此网名用了十多年，相比域名这或许是最执着的事情了。<br />处女座，奔三之人，琐碎之事记录于此。</p>
						<p class="author-links">
							<span class="author-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Zhejiang, China</span>
							<span class="author-website"><a href="http://bokehezi.com" target="_blank"><i class="fa fa-chain" aria-hidden="true"></i> bokehezi.com</a></span>
						</p>
					</div>
				</div><!-- .author-info -->
			</div><!-- .author-box -->
</article><!-- .post -->

<nav class="post-nav">
<?php $this->thePrev('%s',''); ?>
<?php $this->theNext('%s',''); ?>

</nav><!-- .post-nav -->
		
<div id="comments" class="comments-area">
<?php $this->need('comments.php'); ?>
</div><!-- .comments-area -->

</div><!-- .inner -->
<?php $this->need('footer.php'); ?>