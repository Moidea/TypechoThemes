<?php
/**
 * 收藏
 *
 * @package custom
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="wrapper container" role="main">
    <article class="post no-line" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
        <div class="post-content" itemprop="articleBody">
            <h3>阅读列表</h3>
            <ul class="links fav-list">
            <?php Links_Plugin::output($pattern='<li class="clearfix"><a href="{url}" title="{title}" target="_blank" rel="nofollow">阅读</a><div class="link-des">{name}</div></li>', $links_num=0, $sort=read); ?>
            </ul>
            <h3>个人收藏</h3>
            <ul class="links site-list clearfix">
                <?php Links_Plugin::output($pattern=NULL, $links_num=0, $sort=link); ?>
            </ul>
        </div>
    </article>
</div>

<?php $this->need('footer.php'); ?>
<?php $this->need('sidebar.php'); ?>
