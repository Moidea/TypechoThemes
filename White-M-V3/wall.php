<?php
   /**
   * 读者墙 For White-M
   *
   * @package custom
   */
   ?>
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
  <p class="entry_data"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('木有评论', '一次吐槽', '%d 次吐槽'); ?></a></p>
      <div class="content">
	  		<h2>读者墙</h2>
		<div class="readers">		
   <?php getFriendWall(); ?>
</div>
        <?php $this->content(); ?>
      </div>
    </div>
<?php $this->need('comments.php'); ?>
  </div>
<?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
<?php }?>