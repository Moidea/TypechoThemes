    <div class="right">
      <form id="search" method="post" action="/">
<input type="text" name="s" class="text" size="20" x-webkit-speech x-webkit-grammar="builtin:search" onwebkitspeechchange="this.value = this.value.replace(this.defaultValue, '')" value="To search type and hit enter" onfocus="this.value = (this.value == this.defaultValue) ? '' : this.value" onblur="this.value = (this.value == '') ? this.defaultValue : this.value" />
      </form>
<?php if ($this->options->rssDisplay == 'display'): ?>
<?php if($this->is('index')): ?>
<a href="<?php if ($this->options->rssUrl): ?><?php $this->options->rssUrl() ?><?php else : ?><?php $this->options->feedUrl(); ?><?php endif; ?>" title="立即订阅<?php $this->options->title() ?>"><div class="rss_index">订阅<?php $this->options->title() ?>&nbsp;RSS</div></a>
<?php endif; ?>
<?php endif; ?>
	  <?php if (empty($this->options->sidebarBlock) || in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
      <h5><?php _e('热门文章'); ?></h5>
      <ul>
<?php ArticleList::hot(); ?>
      </ul>
<?php endif; ?>
	  <?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
      <h5><?php _e('分类'); ?></h5>
      <ul>
        <?php $this->widget('Widget_Metas_Category_List')
                ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
      </ul>
	  <?php endif; ?>
<?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<?php if($this->is('post') || $this->is('category') || $this->is('page')): ?>
      <h5><?php _e('最新文章'); ?></h5>
      <ul class="shit">
        <?php $this->widget('Widget_Contents_Post_Recent')
                ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
      </ul>
	  <?php endif; ?>
 <?php endif; ?>
	  <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
      <h5><?php _e('最近回复'); ?></h5>
      <ul class="shit">
        <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
            <?php while($comments->next()): ?>
                <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
            <?php endwhile; ?>
      </ul>
	  <?php endif; ?>
	  <?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
      <h5><?php _e('归档'); ?></h5>
      <ul class="shit">
        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
      </ul>
	  <?php endif; ?>
	  <?php if (empty($this->options->sidebarBlock) || in_array('Links', $this->options->sidebarBlock)): ?>
	  <?php if($this->is('index')): ?>
      <h5>友情链接</h5>
      <ul class="link">
        <?php Links_Plugin::output(); ?>
      </ul>
	  <?php endif; ?>
	  <?php endif; ?>
    </div>