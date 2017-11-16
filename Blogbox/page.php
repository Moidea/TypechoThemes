<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="inner">

<article class="post">
	<div class="entry-box">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php $this->content(); ?>
		</div><!-- .entry-content -->

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
							<span class="author-website"><a href="http://bokehezi.com/" target="_blank"><i class="fa fa-chain" aria-hidden="true"></i> bokehezi.com</a></span>
						</p>
					</div>
				</div><!-- .author-info -->
			</div><!-- .author-box -->
</article><!-- .post -->

<div id="comments" class="comments-area">
<?php $this->need('comments.php'); ?>
</div><!-- .comments-area -->

</div><!-- .inner -->
<?php $this->need('footer.php'); ?>