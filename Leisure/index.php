<?php
/**
 * A cup of coffee
 *
 * @package leisure
 * @author banri
 * @version 0.1
 * @link http://brdev.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<div class="wrapper container" role="main">
    <?php while($this->next()): ?>
        <article class="post">
            <h2 class="post-title" itemprop="name headline">
                <a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h2>

            <?php if (($this->_currentPage == 1) && ($this->sequence == 1)): ?>
                <div class="post-content" itemprop="articleBody">
                    <?php $this->content('- 阅读全文 -'); ?>
                </div>
            <?php endif; ?>

            <div class="post-meta"> <!-- 文章信息，为了避免产生多余空格，本段代码未缩进 -->
                <span class="post-category"><?php $this->category(','); ?></span><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('n月j日'); ?></time>
            </div>
        </article>
    <?php endwhile; ?>

    <div class="post-page clearfix">
        <?php if ($this->_currentPage == 1): ?>
            <?php $this->pageLink('下一页','next'); ?>
            <a class="rss" href="<?php $this->options->feedUrl(); ?>" title="订阅RSS"></a>
        <?php else: ?>
            <?php $this->pageLink('下一页','next'); ?>
            <?php $this->pageLink('上一页','prev'); ?>
        <?php endif; ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>
<?php $this->need('sidebar.php'); ?>
