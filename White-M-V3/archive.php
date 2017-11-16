<?php $this->need('header.php'); ?>
  <div class="main">
    <div class="left">
<div class="crumbs_patch">
	&nbsp;<span style="color: #12ADDB;font-weight: bold;">&gt;</span>&nbsp;筛选"<?php $this->archiveTitle(' &raquo; ','',''); ?>"相关的文章
</div>
	<?php if ($this->have()): ?>
	<?php while($this->next()): ?>
      <div class="cont" <?php if ($this->options->thumbDisplay == 'display') { ?>style="height:210px"<?php } ?>>
        <h2><a href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></h2>
        <p class="entry_data">发布时间：<?php $this->date('Y年n月j日'); ?> / 分类：<?php $this->category(','); ?> / <?php Views_Plugin::theViews('', ' 次围观'); ?> / <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('抢沙发！', '一次吐槽', '%d 次吐槽'); ?></a></p>
        <div class="list-content">
		<?php if ($this->options->thumbDisplay == 'display') { ?>
<div class="thumbnail_box">
<div class="thumbnail">
<a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
<img src="<?php $this->options->themeUrl('timthumb.php'); ?>?src=<?php echo img_postthumb($this->cid); ?>&h=100&w=140&zc=1"/>
</a></div></div>
<div class="entry-content"><?php $this->excerpt(140, '...'); ?> </div>
<?php } ?>
		<?php if ($this->options->thumbDisplay == 'close') { ?>
<?php $this->excerpt(140, '...'); ?> 
<?php } ?>
</div></div>
	<?php endwhile; ?>
    <?php else: ?>
        <div class="cont">
            <div class="msg-error"><?php _e('没有找到内容'); ?></div>
        </div>
    <?php endif; ?>
      <?php $this->pageNav(); ?>
    </div>
<?php $this->need('sidebar.php'); ?>
  </div>
<?php $this->need('footer.php'); ?>