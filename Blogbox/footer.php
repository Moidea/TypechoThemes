<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</main><!-- .content -->

<aside class="footer-widgets">
<div id="footer-columns" class="footer-columns">
		<div class="inner">
			<div class="grid">
			<div class="one-third">
					<section class="widget widget-recent-posts">
						<h2 class="widget-title">Latest Posts</h2>
						<ul>
						<?php $this->widget('Widget_Archive@index', 'pageSize=3&type=category', 'mid=1')->parse('
						<li><div class="post-title"><a href="{permalink}">{title}</a></div>
						<div class="post-date">{year}.{month}.{day}</div>
						</li>'); ?>
						</ul>
					</section><!-- .widget -->
				</div><!-- .one-third -->
			
				<div class="one-third">
					<section class="widget widget-recent-posts">
						<h2 class="widget-title">Comments</h2>
							<ul>
							<?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><div class="post-title"><?php $comments->excerpt(20, '...'); ?></div>
			<div class="post-date"><a href="<?php $comments->permalink(); ?>" title="<?php $comments->excerpt(1000, '...'); ?>"><?php $comments->author(false); ?></a></div>
			</li>
  <?php endwhile; ?>
						</ul>
					</section><!-- .widget -->
				</div><!-- .one-third -->

				<div class="one-third">
					<section class="widget widget-tags">
						<h2 class="widget-title">Blogroll</h2>
						<div class="tagcloud">
<a href="http://zimoo.me/" target="_blank" title="Zimoo's Life">Zimoo</a>
<a href="http://viki.kim/" target="_blank" title="Viki Tine">Viki</a>
<a href="http://xiaonan.xyz/" target="_blank" title="C.J Fang's Blog">C.J Fang</a>
<a href="https://qiuri.org/" target="_blank" title="秋日">秋日</a>
<a href="http://techair.cc/" target="_blank" title="飞翔的技术宅">Loststar</a>
<a href="http://www.ibigan.com/" target="_blank" title="Bigan">Bigan</a>
<a href="https://qifu.me/" target="_blank" title="启福">启福</a>
<a href="http://www.simsummer.me/" target="_blank" title="生如夏花">生如夏花</a>
<a href="http://www.siryin.com/" target="_blank" title="尹先生">尹先生</a>
<a href="http://www.ma-am.cn/" target="_blank" title="南歌鹿人">南歌鹿人</a>
<a href="http://storeweb.cn/sites/info/203" target="_blank" title="个站商店">个站商店</a>
						</div>
					</section><!-- .widget -->
				</div><!-- .one-third -->
			</div><!-- .grid -->
		</div><!-- .inner -->
	</div><!-- .footer-columns -->
</aside><!-- .footer-widgets -->

<footer class="site-footer">
	<div class="inner">
		<div class="social-links">
			<a href="https://facebook.com/hwlloek" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span></a>
			<a href="https://instagram.com/hwlloek" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i><span class="screen-reader-text">Instagram</span></a>
			<a href="#"><i class="fa fa-flickr" aria-hidden="true"></i><span class="screen-reader-text">Flickr</span></a>
		</div><!-- .social-links -->
		<div class="copyright">
			&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. Powered by <a href="http://www.typecho.org" target="_blank">Typecho</a>.
		</div><!-- .copyright -->
		<a href="#page" id="jump-top" class="top-link"><i class="fa fa-angle-up" aria-hidden="true"></i><span class="screen-reader-text">Back to the top</span></a>
	</div><!-- .inner -->
</footer><!-- .site-footer -->
	</div><!-- .site -->

	<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>js/plugins.js"></script>
	<script type="text/javascript" src="<?php $this->options->themeUrl(); ?>js/custom.js"></script>

<?php $this->footer(); ?>
</body>
</html>