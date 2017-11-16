
<div class="details-up">
	<span class="author"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>

	<?php if(!$this->is('category')): ?>  <!-- 分类页面category不显示 -->
  		<span class="category"><?php _e('分类: '); ?><?php $this->category(','); ?></span>
	<?php else: ?>
	<?php endif; ?>
	
	<span class="date"><?php _e('时间: '); ?><?php $this->date('Y-m-d'); ?></span>
	<span class="comments-top" itemprop="interactionCount"><?php _e('评论: '); ?><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '1条评论', '%d条评论'); ?></a></span>
</div>

                <!-- /post details -->