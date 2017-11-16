<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="section">
  <div class="container">
    <h1 class="title"><?php $this->title() ?></h1>
    <h2 class="subtitle is-5"><?php $this->date('F j, Y'); ?> by <?php $this->author(); ?></h2>
    
    <div class="content">
<?php $this->content(); ?>
    </div>
    
    <div class="nav-left">
    <a class="nav-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->permalink() ?>" title="Share on Facebook" target="_blank"><span class="fa fa-facebook fa-2x" aria-hidden="true"></span></a>
    <a class="nav-item" href="https://plus.google.com/share?url=<?php $this->permalink() ?>" title="Share on Google+" target="_blank"><span class="fa fa-google-plus fa-2x" aria-hidden="true"></span></a>
    <a class="nav-item" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php $this->permalink() ?>" title="Share on LinkedIn" target="_blank"><span class="fa fa-linkedin fa-2x" aria-hidden="true"></span></a>
    <a class="nav-item" href="https://twitter.com/home?status=<?php $this->title() ?> - <?php $this->permalink() ?>" title="Tweet this" target="_blank"><span class="fa fa-twitter fa-2x"></span></a>
    <a class="nav-item" href="http://www.reddit.com/submit?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>" title="Share on Reddit" target="_blank"><span class="fa fa-reddit-alien fa-2x" aria-hidden="true"></span></a>
    </div>
    
  </div>
</section>

<section class="section">
  <div class="container">
<?php $this->need('comments.php'); ?>
  </div>
</section>
<?php $this->need('footer.php'); ?>