<?php $this->comments()->to($comments); ?>

<?php function threadedComments($comments, $options) { ?>
	<li id="<?php $comments->theId(); ?>" class="comment<?php $comments->alt(' odd', ' even'); ?>">
		<div class="comments-left"><?php $comments->gravatar('40'); ?></div>
		<div class="comments-right">
			<span class="comments-vcard">
				<label class="author"><?php $comments->author(); ?></label>
				<label class="date"><?php $comments->date('Y-m-d H:i:s'); ?></label>
				<label class="reply"><?php $comments->reply(); ?></label>
			</span>
			<?php $comments->content(); ?>
		</div>
	</li>
	<span class="comments-child">
		<?php $comments->threadedComments($comments); ?>
	</span>
<?php } ?>
 <div class="comments-list">
 <h4 class="comment-count"><?php $this->commentsNum('0 条评论', '1 条评论' , '%d 条评论'); ?></h4>
<?php $comments->listComments(); ?>
<?php $comments->pageNav(); ?>
</div>
<h4 class="comment-reply-title">发表评论</h4>
<?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>" class="comment-reply-table" name="comment">
	<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
	<div class="comment-reply-table-frame">
		<div class="comment-reply-vcard">
			<?php if($this->user->hasLogin()): ?>
				<span class="author">以 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a> 身份登录.<a href="<?php $this->options->siteUrl('index.php/action/logout'); ?>">登出</a></span>
			<?php else: ?>
				<span class="comment-vcard-edit"><label>昵称</label><input type="text" name="author" id="text" class="author-text" size="35" value="<?php $this->remember('author'); ?>" /></span>
				<span class="comment-vcard-edit"><label>邮箱</label><input type="text" name="mail" id="text" class="mail-text" size="35" value="<?php $this->remember('mail'); ?>" /></span>
				<span class="comment-vcard-edit"><label>链接</label><input type="text" name="url" id="text" class="url-text" size="35" value="<?php $this->remember('url'); ?>" /></span>
			<?php endif; ?>
		</div>
		<div class="comment-reply-text">
			<span id="tool">
			<?php Smilies_Plugin::output(); ?>
			<?php $comments->cancelReply(''); ?>
			</span>
			<p><textarea id="comment" rows="10" cols="50" name="text"><?php $this->remember('text'); ?></textarea></p>
		</div>
		<p><input type="submit" value="发射" class="submit button" /></p>
	</div>
	</form>
</div>
<?php else: ?>
	<h4 class="comment-reply-title">禁止评论</h4>
<?php endif; ?>