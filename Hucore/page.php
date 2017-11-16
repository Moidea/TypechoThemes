<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="section">
  <div class="container">
    <h1 class="title"><?php $this->title() ?></h1>
    <h2 class="subtitle is-5">by <?php $this->author(); ?></h2>
    
    <div class="content">
<?php $this->content(); ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
<?php $this->need('comments.php'); ?>
  </div>
</section>
<?php $this->need('footer.php'); ?>