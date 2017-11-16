<?php
//缩略图
function img_postthumb($cid) {
   $db = Typecho_Db::get();
   $rs = $db->fetchRow($db->select('table.contents.text')
       ->from('table.contents')
       ->where('table.contents.cid=?', $cid)
       ->order('table.contents.cid', Typecho_Db::SORT_ASC)
       ->limit(1));

   preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
   $img_src = $thumbUrl[1][0];  //将赋值给img_src
   $img_counter = count($thumbUrl[0]);  //一个src地址的计数器

   switch ($img_counter > 0) {
       case $allPics = 1:
           echo $img_src;  //当找到一个src地址的时候，输出缩略图
           break;
       default:
           echo ("http://microcdn.cdn.duapp.com/nopic.png");  //没找到(默认情况下)，不输出任何内容
   };
}
function themeConfig($form) {
		echo('<style>body{font-family:Microsoft Yahei,微软雅黑;}</style><div style="font-size:14px;border-left:5px solid #1A1A1A;padding-left:8px;">White-M&nbsp;Theme&nbsp;版本：3.3&nbsp;&nbsp;<strong>主题设置页</strong>&nbsp;&nbsp;<a href="http://www.microhu.com" title="检查更新">检查更新</a></div>');
	/** Logo显示 */
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('Logo地址'), _t('<strong>留空即显示文字Logo</strong>&nbsp;在这里填入一个logo图片的地址'));
    $form->addInput($logoUrl);
	/** 导航显示内容 */
    $menuDisplay = new Typecho_Widget_Helper_Form_Element_Checkbox('menuDisplay', 
    array('cat' => _t('显示分类目录'),
    'page' => _t('显示独立页面')),
    array('cat'), _t('导航显示内容'));
    
    $form->addInput($menuDisplay->multiMode());
	/** 社会化 */
    $sinaUrl = new Typecho_Widget_Helper_Form_Element_Text('sinaUrl', NULL, NULL, _t('新浪微博'), _t('<strong>留空即不显示</strong>&nbsp;在这里填入一个新浪微博地址'));
    $form->addInput($sinaUrl);
    $qqUrl = new Typecho_Widget_Helper_Form_Element_Text('qqUrl', NULL, NULL, _t('腾讯微博'), _t('<strong>留空即不显示</strong>&nbsp;在这里填入一个腾讯微博地址'));
    $form->addInput($qqUrl);
	/** 缩略图显示 */
    $thumbDisplay = new Typecho_Widget_Helper_Form_Element_Radio('thumbDisplay', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'close', 
    _t('显示缩略图'),_t('请将主题目录下的Cache文件夹设置为777.<br /><span style="color:red;font-weight:bold;">SAE或BAE等不兼容timthumb的用户请保持禁用此功能！</span>'));
    $form->addInput($thumbDisplay);
	/** RSS开关 */
    $rssDisplay = new Typecho_Widget_Helper_Form_Element_Radio('rssDisplay', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('显示RSS订阅和相关文章'));
    $form->addInput($rssDisplay);
    $rssUrl = new Typecho_Widget_Helper_Form_Element_Text('rssUrl', NULL, NULL, _t('自定义RSS地址'), _t('<strong>留空即为自带RSS源</strong>&nbsp;在这里填入自定义的RSS地址，比如通过FeedSky烧录的地址以方便统计数据'));
    $form->addInput($rssUrl);
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowHotPosts' => _t('显示热门文章'),
    'ShowRecentPosts' => _t('在内页显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'Links' => _t('在首页显示友情链接')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'Links'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());

	//背景花纹配置
    $options = Typecho_Widget::widget('Widget_Options');
    $pattern = new Typecho_Widget_Helper_Form_Element_Radio('pattern', 
    array(
        'pattern' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern1' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern1.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern2' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern2.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern3' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern3.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern4' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern4.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern5' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern5.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern6' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern6.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern7' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern7.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span><br />'),
        'pattern8' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern8.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern9' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern9.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern10' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern10.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern11' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern11.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern12' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern12.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern13' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern13.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern14' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern14.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern15' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern15.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span><br />'),
        'pattern16' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern16.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern17' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern17.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern18' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern18.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern19' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern19.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern20' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern20.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern21' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern21.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern22' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern22.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern23' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/pattern_samples/pattern23.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>')
        ),
    'pattern',
    _t('背景花纹'));
    
    $form->addInput($pattern);
}
//获得读者墙
function getFriendWall()
{
$db = Typecho_Db::get();
$sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')
->from('table.comments')
->where('status = ?', 'approved')
->where('type = ?', 'comment')
->where('authorId = ?', '0')
->where('mail != ?', '')   //排除自己上墙
->group('author')
->order('cnt', Typecho_Db::SORT_DESC)
->limit('24');    //读取几位用户的信息
$result = $db->fetchAll($sql);
 
if (count($result) > 0) {
$maxNum = $result[0]['cnt'];
foreach ($result as $value) {
 $mostactive .= '<li><img alt src="http://1.gravatar.com/avatar/'.md5(strtolower($value['mail'])).'?s=36&d=&r=G" height="48" width="48"></img><a target="_blank" rel="nofollow" href="' . $value['url'] . '" title="' . $value['author'] . '-' . $value['cnt'] . '条评论">' . $value['author'] . '</a><br><strong>' . $value['cnt'] . '条</strong></li>';   
}
echo $mostactive;
}
}