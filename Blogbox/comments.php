<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<li itemscope="" itemtype="http://schema.org/UserComments" id="comment-<?php $comments->theId(); ?>" class="comment-body comment-parent comment-odd">
    <div id="<?php $comments->theId(); ?>" class="comment-author" itemprop="creator" itemscope="" itemtype="http://schema.org/Person">
        <span itemprop="image">
		<?php $comments->gravatar('40', ''); ?></span>
        <cite class="fn" itemprop="name"><?php $comments->author(); ?></cite>
		</div>
    <div class="comment-meta"> 
        <a href="<?php $comments->permalink(); ?>"><time itemprop="commentTime" datetime="<?php $comments->date('c'); ?>"><?php $comments->date('Y-m-d \\a\t\ h:i a'); ?></time></a>
            </div>
    <div class="comment-content" itemprop="commentText">
                 <div class="reply">   
                <?php  
                    if($comments->parent){   
                        $p_comment = getPermalinkFromCoid($comments->parent);   
                        $p_author = $p_comment['author'];   
                        $p_text = mb_strimwidth(strip_tags($p_comment['text']), 0, 100,"...");   
                        $p_href = $p_comment['href'];   
                        echo "<a href='$p_href' title='$p_text'>@$p_author</a>";   
                    }   
                ?>  
			     </div>
<?php $comments->content(); ?>
</div>
<span class="comment-reply"><?php $comments->reply(); ?></span>
		<?php if ($comments->children) { ?>
        <div class="comment-children" itemprop="discusses">
<?php $comments->threadedComments($options); ?>
 </div>
 <?php } ?>
</li>

<?php } ?>

<?php if($this->allow('comment')): ?>
    <?php $this->comments()->to($comments); ?>
	<h3 class="comments-title"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></h3>
    <?php if ($comments->have()): ?>
    <div class="comment-list-wrap">
	
<?php $comments->listComments(); ?>

    </div>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>
    
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
    	<h3 id="response" class="comment-reply-title"><?php _e('发表评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p class="comment-form-author">
            <label for="author"><?php _e('您的大名'); ?> <span class="required"></span></label>
    			<input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
    		</p>
    		<p class="comment-form-email">
                <label for="mail"><?php _e('Email'); ?> <span class="required"></span></label>
    			<input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p class="comment-form-url">
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网址'); ?></label>
    			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" <?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            <?php endif; ?>
    		<p class="comment-form-comment">
                <label for="textarea"><?php _e('内容'); ?></label>
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>

    		<p class="form-submit">
                <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
            </p>
    	</form>
    </div>
    <?php else: ?>
   <h3 class="comments-title">Comment closed.</h3>
    <?php endif; ?>