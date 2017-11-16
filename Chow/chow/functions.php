<?php

function themeConfig($form) {
	$sideshowBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sideshowBlock', 
    array('ShowSideShow' => _t('显示幻灯片'),
    'ShowSNS' => _t('显示社交模块'),),
    array('ShowSideShow', 'ShowSNS'), _t('幻灯片显示'));
    $form->addInput($sideshowBlock->multiMode());
	
	$sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowCategory' => _t('显示文章分类'),
    'ShowRecentComments' => _t('显示最新回复'),
    'ShowBGM' => _t('显示Bangumi信息'),
    'ShowLinks' => _t('显示友情链接 (需要"Links"插件)')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowShowLink'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());
	
    $noticeText = new Typecho_Widget_Helper_Form_Element_Text('noticeText', NULL, NULL, _t('公告栏文字'), _t('在此处填入公告栏文字（留空则不显示）'));
    $form->addInput($noticeText);
	
	$twitterAccount = new Typecho_Widget_Helper_Form_Element_Text('twitterAccount', NULL, NULL, _t('Twitter'), _t('在此处填入"Twitter"链接 (带http://)'));
    $facebookAccount = new Typecho_Widget_Helper_Form_Element_Text('facebookAccount', NULL, NULL, _t('Facebook'), _t('在此处填入"Facebook"链接 (带http://)'));
    $gplusAccount = new Typecho_Widget_Helper_Form_Element_Text('gplusAccount', NULL, NULL, _t('Google+'), _t('在此处填入"Google+"链接 (带http://)'));
    $weiboAccount = new Typecho_Widget_Helper_Form_Element_Text('weiboAccount', NULL, NULL, _t('新浪微博'), _t('在此处填入"新浪微博"链接 (带http://)'));
    $doubanAccount = new Typecho_Widget_Helper_Form_Element_Text('doubanAccount', NULL, NULL, _t('豆瓣'), _t('在此处填入"豆瓣"链接 (带http://)'));
    $form->addInput($weiboAccount);
    $form->addInput($twitterAccount);
    $form->addInput($facebookAccount);
    $form->addInput($gplusAccount);
    $form->addInput($doubanAccount);
}
function getThumbnail($widget, $width, $height)
{
    $options = $widget->widget('Widget_Options');
 
    /** 默认图片目录、后缀 */
    $path = $options->themeUrl . '/images/category/'; // 路径：模板文件夹/images/category/图片为分类缩略名
    $suffix = '.jpg';
 
    /** 文章相关 */
    $cid = $widget->cid;
    $title = $widget->title;
    $content = $widget->text;
    $category = $widget->category;
    $link = $widget->permalink;
 
    $db = Typecho_Db::get();
    $sql = $db->select('text')
              ->from('table.contents')
              ->where('type = ? AND parent = ?', 'attachment', $cid)
              ->limit(1);
    $attach = $db->fetchRow($sql);
 
    if (empty($attach)) { // 没有附件时从文章内容读取
        $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; // 匹配文章内容中的图片
 
        if (preg_match_all($pattern, $content, $thumbUrl)) {
            echo '<a href="' . $link . '"><img src="' . $thumbUrl[1][0] . '" width="' . $width . '" height="' . $height . '" alt="' . $title . '" /></a>';
        } else {
            echo '<a href="' . $link . '"><img src="' . $path . $category . $suffix . '" width="' . $width . '" height="' . $height . '" alt="' . $title . '" ></a>';
        }
    } else { // 从附件中读取
        $attachText = unserialize($attach['text']);
        $isImage = '/gif|jpg|jpeg|bmp|png/i'; // 匹配图片附件类型
 
        if (preg_match($isImage, $attachText['type'])) {
            echo '<img src="' . $options->themeUrl . '/timthumb.php?src=' . $options->siteUrl . $attachText['path'] . '&q=95&w=' . $width . '&h=' . $height . '" alt="' . $title . '" />';
        } else {
            echo '<img src="' . $path . $category . $suffix . '" width="' . $width . '" height="' . $height . '" alt="' . $title . '" >';
        }
    }
}
/* BGM List */
function getBangumiList($bgmusr,$bgmStr)
{
	$rssfeed = array("http://bgm.tv/feed/user/" .$bgmusr ."/interests");
	//RSS地址
	header('Content-Type:text/html;charset= UTF-8'); 
	for($i=0;$i<sizeof($rssfeed);$i++){
	$buff = ""; 
	$rss_str=""; 
	$fp = fopen($rssfeed[$i],"r") or die("can not open $rssfeed"); 
	while ( !feof($fp) ) { 
		$buff .= fgets($fp,4096); 
	} 
	fclose($fp); 
	$parser = xml_parser_create(); 
	xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1); 
	xml_parse_into_struct($parser,$buff,$values,$idx); 
	xml_parser_free($parser); 
	$rss_str = array();
		foreach ($values as $val) { 
		$tag = $val["tag"]; 
		$type = $val["type"]; 
		@$value = $val["value"]; 
		$tag = strtolower($tag); 
		if ($tag == "item" && $type == "open"){ 
			$is_item = 1; 
		}else if ($tag == "item" && $type == "close") { 
			$rss_str[] = "<li><a href='".$link."' target='_blank' rel='external nofollow'>".$title."</a></li>";
		if(count($rss_str)==$bgmStr) break; 
		//运行次数，默认输出5条
			$is_item = 0; 
		} 
		if(@$is_item==1){ 
			if ($tag == "title") {$title = $value;} 
			if ($tag == "link") {$link = $value;} 
		} 
		} 
	echo implode('', $rss_str);
	}
}

?>