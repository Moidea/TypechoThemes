<?php
/**
 * 简单主题，移植自hugo。hucore simple theme from hugo.
 * 
 * @package hucore 
 * @author Blog on blog
 * @version 1.0.3
 * @link http://blog.com.cm
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<section class="section">
  <div class="container">
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
  </div>
  
<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</section>

<?php $this->need('footer.php'); ?>