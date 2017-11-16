<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="section">
  <div class="container">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h3>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
<article>
      <h1 class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
      <h2 class="subtitle is-5"><?php $this->date('F j, Y'); ?></h2>
      
      <div class="content">
<?php $this->excerpt(280, '[...]'); ?>
<a class="button is-link" href="<?php $this->permalink() ?>" style="height:28px">
          Read more
          <span class="icon is-small">
            <i class="fa fa-angle-double-right"></i>
          </span>
</a>
        
      </div>
</article>
<?php endwhile; ?>
        <?php else: ?>
<article>
      <h1 class="title"><?php _e('没有找到内容'); ?></h1>
      
      <div class="content">
<?php _e('没有找到任何内容，请重试。'); ?>
      </div>
</article>
<?php endif; ?>
  </div>
  
<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</section>

<?php $this->need('footer.php'); ?>