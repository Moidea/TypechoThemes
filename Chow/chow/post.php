<?php
/**
 * 一套随便做的 Typecho 主题,BUG略多
 * 
 * @package 操节
 * @author 酱爆灵梦
 * @version 1.0(Alpha)
 * @link http://www.windim.org
 */
 
 $this->need('header.php');
 ?>
 			<div class="content">
 				<div class="main">
 					<?php while($this->next()): ?>
 					<div class="post">
 					<span class="entry-date">
 						<span class="ym"><?php $this->date('Y-m'); ?></span>
 						<span class="d"><?php $this->date('d'); ?></span>
 					</span>
 					<span class="entry-title"><a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>"><?php $this->title(); ?></a></span>
 					<span class="entry-info">
 						<label class="category"><?php $this->category(','); ?></label>
 						<label class="author"><?php $this->author(); ?></label>
 						<label class="comment"><?php $this->commentsNum('0 条评论','1 条评论','%d 条评论'); ?></label>
 					</span>
 					<span class="entry-text"><?php $this->content('阅读全文'); ?></span>
 					<span class="entry-tag"><?php $this->tags('', true, ''); ?></span>
 					</div>
 					<div class="comments">
 						<?php $this->need("comments.php"); ?>
 					</div>
 					<?php endwhile; ?>
 				</div>
 				<div class="sidebar">
 				<?php $this->need("sidebar.php") ?>
 				</div>
 			</div>
<?php $this->need('footer.php'); ?>