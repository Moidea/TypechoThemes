<?php if (empty($this->options->sideshowBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<div id="widget" class="category-list">
	<h2 class="widget-title">文章分类</h2>
	<ul>
		<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
		<?php while($categories->next()): ?>
		<li class="current">
			<a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<?php endif; ?>
<?php if (empty($this->options->sideshowBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
<div id="widget" class="recent-comments">
	<h2 class="widget-title">近期评论</h2>
	<ul>
		<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
		<?php while($comments->next()): ?>
		<li>
			<?php $comments->gravatar('32'); ?>
			<span class="comments-text">
				<label><?php $comments->author(false); ?></label><br />
				<a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(10, '[...]'); ?></a>
			</span>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<?php endif; ?>
<?php if (empty($this->options->sideshowBlock) || in_array('ShowBGM', $this->options->sidebarBlock)): ?>
<div id="widget" class="bangumi-list">
	<h2 class="widget-title">Bangumi</h2>
	<ul>
		<?php getBangumiList('您的Bangumi账户',8); ?>
	</ul>
</div>
<?php endif; ?>
<?php if (empty($this->options->sideshowBlock) || in_array('ShowLinks', $this->options->sidebarBlock)): ?>
<div id="widget" class="links">
	<h2 class="widget-title">友情链接</h2>
	<ul>
		<?php Links_Plugin::output(); ?> 
	</ul>
</div>
<?php endif; ?>