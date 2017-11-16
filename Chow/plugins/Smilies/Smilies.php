<?php
global $smilies_trans;
if (!$smilies_trans) return;
$smilies_setting = Typecho_Widget::widget('Widget_Options')->plugin('Smilies');
$allow_post_img = $smilies_setting->allowPostImg;
$imgUrl = $smilies_setting->smiliesUrl;
$shadow = 'box-shadow: rgba(190,190,190,1) 1px 3px 15px';
$border = 'border-radius: 11px';
?>
<span id="smiley" style="<?php echo "display:none; position:absolute; z-index:99; width:255px; margin-top:-110px; padding:10px; background:#fff; border:1px solid #bbb; -moz-$shadow; -webkit-$shadow; -khtml-$shadow; $shadow; -moz-$border; -webkit-$border; -khtml-$border; $border;"; ?>">
<a href="javascript:Smilies.grin(':?:')"      ><img src="<?php echo $imgUrl; ?>icon_question.gif"  alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':razz:')"   ><img src="<?php echo $imgUrl; ?>icon_razz.gif"      alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':sad:')"    ><img src="<?php echo $imgUrl; ?>icon_sad.gif"       alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':evil:')"   ><img src="<?php echo $imgUrl; ?>icon_evil.gif"      alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':!:')"      ><img src="<?php echo $imgUrl; ?>icon_exclaim.gif"   alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':smile:')"  ><img src="<?php echo $imgUrl; ?>icon_smile.gif"     alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':oops:')"   ><img src="<?php echo $imgUrl; ?>icon_redface.gif"   alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':grin:')"   ><img src="<?php echo $imgUrl; ?>icon_biggrin.gif"   alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':eek:')"    ><img src="<?php echo $imgUrl; ?>icon_surprised.gif" alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':shock:')"  ><img src="<?php echo $imgUrl; ?>icon_eek.gif"       alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':???:')"    ><img src="<?php echo $imgUrl; ?>icon_confused.gif"  alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':cool:')"   ><img src="<?php echo $imgUrl; ?>icon_cool.gif"      alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':lol:')"    ><img src="<?php echo $imgUrl; ?>icon_lol.gif"       alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':mad:')"    ><img src="<?php echo $imgUrl; ?>icon_mad.gif"       alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':twisted:')"><img src="<?php echo $imgUrl; ?>icon_twisted.gif"   alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':roll:')"   ><img src="<?php echo $imgUrl; ?>icon_rolleyes.gif"  alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':wink:')"   ><img src="<?php echo $imgUrl; ?>icon_wink.gif"      alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':idea:')"   ><img src="<?php echo $imgUrl; ?>icon_idea.gif"      alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':arrow:')"  ><img src="<?php echo $imgUrl; ?>icon_arrow.gif"     alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':neutral:')"><img src="<?php echo $imgUrl; ?>icon_neutral.gif"   alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':cry:')"    ><img src="<?php echo $imgUrl; ?>icon_cry.gif"       alt="" class="smiley" /></a>
<a href="javascript:Smilies.grin(':mrgreen:')"><img src="<?php echo $imgUrl; ?>icon_mrgreen.gif"   alt="" class="smiley" /></a>
</span>
<?php
if ($allow_post_img) {
    echo '<span id="embed" class="embedImage"><a href="javascript:Smilies.embedImage();"><img src="', $imgUrl,'pic.png" alt="添加图片" title="添加图片"/></a></span>';
}
?>
<span id="embed" class="embedSmiley"><a href="javascript:Smilies.showBox();"><img src="<?php echo $imgUrl; ?>smile.png" alt="添加表情" title="添加表情" /></a></span>

<script type="text/javascript">
// <![CDATA[
// Smilies v1.0.4 for Typecho Comments - by willin kan - URI: http://kan.willin.org/typecho/
Smilies = {
 dom : function(id) {
   return document.getElementById(id);
 },

 showBox : function () {
   this.dom('smiley').style.display = 'block';
   document.onclick = function() {
     Smilies.hideBox();
   }
 },

 hideBox : function () {
   this.dom('smiley').style.display = 'none';
 },

 grin : function (tag) { // 表情
   tag = ' ' + tag + ' '; myField = this.dom('comment');
   document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
 },

 embedImage : function () { // 贴图
   URL = prompt('请输入图片的 URL 位址:', 'http://'); if (URL) {tag = '[img]' + URL + '[/img]'; this.insertTag(tag);}
 },

 insertTag : function (tag) { // 插入评论中
   myField = Smilies.dom('comment');
   myField.selectionStart || myField.selectionStart == '0' ? (
     startPos = myField.selectionStart,
     endPos = myField.selectionEnd,
     cursorPos = startPos,
     myField.value = myField.value.substring(0, startPos)
                   + tag
                   + myField.value.substring(endPos, myField.value.length),
     cursorPos += tag.length,
     myField.focus(),
     myField.selectionStart = cursorPos,
     myField.selectionEnd = cursorPos
   ) : (
     myField.value += tag,
     myField.focus()
   );
   this.hideBox();
 }
}
// ]]>
</script>
