<?php
if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){
	$this->need('comments.php');
}else{
	if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
	$this->need('header.php');
?>
<script>
jQuery(document).ready(function($) {
  var comments = $("#comments"),
  loadingText = "\u8bc4\u8bba\u6570\u636e\u52a0\u8f7d\u4e2d\x2e\x2e\x2e",
  ajaxed = false;
  $('#comments .page-navigator li a').live("click",function(e) {
    e.preventDefault();
    var _this = $(this),
    _thisP = _this.parent();
    if (_thisP.hasClass('current') || ajaxed == true) return; 
    var _list = $('.comment-list'),
    url = _this.attr("href").replace("#comments", "") + "?action=ajax_comments";
    $.ajax({ 
      url: url,
      beforeSend: function() {
        _list.text(loadingText);
        ajaxed = true;
      },
      success: function(data) {
        comments.html(data);
        ajaxed = false;
      }
    });
    return false;
  });
});
</script>
<div class="main">
  <div class="left">
    <div class="cont">
      <h2><?php $this->title() ?></h2>
        <p class="entry_data">发布时间：<?php $this->date('Y年n月j日'); ?> / 分类：<?php $this->category(','); ?> / <?php Views_Plugin::theViews('', ' 次围观'); ?> / <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('抢沙发！', '一次吐槽', '%d 次吐槽'); ?></a></p>
      <div class="content">
        <?php $this->content(); ?>
 <p class="tag"><?php _e('标签'); ?>：<?php $this->tags(', ', true, '没有标签呢'); ?></p>
      </div>
<?php if ($this->options->rssDisplay == 'display'): ?>
<div id="img">
<?php $this->related(5)->to($relatedPosts); ?>
<ul>
<?php if ($relatedPosts->have()): ?>
<h5>相关文章</h5><a href="<?php if ($this->options->rssUrl): ?><?php $this->options->rssUrl() ?><?php else : ?><?php $this->options->feedUrl(); ?><?php endif; ?>" title="立即订阅<?php $this->options->title() ?>"><div class="rss_single">订阅<?php $this->options->title() ?></div></a>
<?php while ($relatedPosts->next()): ?>
<li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
<?php endwhile; ?>
<?php else : ?>
<a href="<?php if ($this->options->rssUrl): ?><?php $this->options->rssUrl() ?><?php else : ?><?php $this->options->feedUrl(); ?><?php endif; ?>" title="立即订阅<?php $this->options->title() ?>"><div class="msg-warn">暂无相关文章，建议订阅<?php $this->options->title() ?>，及时阅读最新文章！</div></a>
<?php endif; ?>
</ul>
</div>
<?php endif; ?>
    </div>
<?php $this->need('comments.php'); ?>
  </div>
<?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
<?php }?>