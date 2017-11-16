<div  class="col-5 columns" id="sidebar" role="complementary">

    <div class="widget widget_search">
    <h3>搜素</h3>
    <form action="./" id="searchform" method="get">
        <input type="text" id="searchkey" name="s" value="" class="searchkey" placeholder="Search..."/>
        <button type="submit"  id="searchsubmit">Go</button>
    </form>
    </div> 

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <div class="widget widget-category">
        <h3>文章分类</h3>
        <ul class="widget-list">
                        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while ($category->next()): ?>
<li<?php if ($this->is('post')): ?><?php if ($this->category == $category->slug): ?> class="current"<?php endif; ?><?php else: ?><?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?><?php endif; ?>>
<a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?><em><?php $category->count(); ?></em></a>
<?php endwhile; ?></li>
        </ul>
    </div>
    <?php endif; ?>  

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <div class="widget widget-recent-entries">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </div>
    <?php endif; ?>
<!--
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <div class="widget">
		<h3 class="widget-title"><?php _e('最新评论'); ?></h3>
        <ul class="widget-list" id="recent-comment">

        <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li class="clearfix"><?php $comments->gravatar('40', ''); ?><div class="comments-link"><cite> <?php $comments->author(false); ?>: </cite><a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(35, '...'); ?></a></div></li>
        <?php endwhile; ?>
        </ul>
    </div>
    <?php endif; ?>
-->

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <div class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</div>
    <?php endif; ?>

    <div class="widget widget-tag">
    <h3>热门标签</h3>
        <div class="tag-cloud">
            <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 20))->to($tags); ?>  
<?php while($tags->next()): ?>  
<a rel="tag" href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a>
<?php endwhile; ?>
        </div>
    </div>
    <!-- 只在首页显示 -->
    <?php if($this->is('index')): ?>
    <div class="widget widget-recent-entries">
        <h3>友情链接</h3>
        <ul>
            <li><a href="http://www.deepswd.com" target="_blank">Deep's blog</a></li>
            <li><a href="http://www.typecho.org/" target="_blank">Typecho</a></li>
        </ul>
    </div>
<?php else: ?>
<?php endif; ?>
</div><!-- end #sidebar -->
