<?php
/**
 * BlogBox theme from ghost.
 * 
 * @package BlogBox theme
 * @author Bokehezi
 * @version 2017.10.08
 * @link http://bokehezi.com/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="inner">

<?php while($this->next()): ?>
<article class="post">
<?php if(isset($this->fields->blogbox)):?>
	<a href="<?php $this->permalink() ?>" class="post-thumbnail"><img src="<?php echo $this->fields->blogbox; ?>" alt="<?php $this->title() ?>" /></a>
<?php else: ?>
<?php endif; ?>
	<div class="entry-box">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
			<div class="entry-meta">
				<time class="post-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('F j, Y'); ?></time> | <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('Leave a comment', '1 Comment', '%d Comments'); ?></a>
			</div>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php $this->content(); ?>
			<div class="read-more">
				<a class="more-link" href="<?php $this->permalink() ?>">Read More</a>
			</div>
		</div><!-- .entry-content -->
	</div><!-- .entry-box -->
</article><!-- .post -->
<?php endwhile; ?>
<nav class="pagination">
<?php $this->pageLink('Previous'); ?>
<span class="page-number"><?php if($this->_currentPage>0) echo 'Page '.$this->_currentPage.' of '; ?><?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></span>
<?php $this->pageLink('Next','next'); ?>
</nav> 

</div><!-- .inner -->
<?php $this->need('footer.php'); ?>