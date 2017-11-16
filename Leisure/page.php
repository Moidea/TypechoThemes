<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="wrapper container" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
<?php $this->need('sidebar.php'); ?>
