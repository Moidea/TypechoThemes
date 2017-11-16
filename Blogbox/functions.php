<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}


/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/


/*评论艾特*/
function getPermalinkFromCoid($coid) {   
    $db       = Typecho_Db::get();   
    $options  = Typecho_Widget::widget('Widget_Options');   
    $contents = Typecho_Widget::widget('Widget_Abstract_Contents');   
    
    $row = $db->fetchRow($db->select('cid, type, author, text')->from('table.comments')   
              ->where('coid = ? AND status = ?', $coid, 'approved'));   
    
    if (empty($row)) return 'Comment not found!';   
    $cid = $row['cid'];   
    
    $select = $db->select('coid, parent')->from('table.comments')   
              ->where('cid = ? AND status = ?', $cid, 'approved')->order('coid');   
    
    if ($options->commentsShowCommentOnly)   
        $select->where('type = ?', 'comment');   
    
    $comments = $db->fetchAll($select);   
    
    if ($options->commentsOrder == 'DESC')   
        $comments = array_reverse($comments);   
    
    foreach ($comments as $key => $val)   
        $array[$val['coid']] = $val['parent'];   
    
    $i = $coid;   
    while ($i != 0) {   
        $break = $i;   
        $i = $array[$i];   
    }   
    
    $count = 0;   
    foreach ($array as $key => $val) {   
        if ($val == 0) $count++;    
        if ($key == $break) break;    
    }   
    
    $parentContent = $contents->push($db->fetchRow($contents->select()->where('table.contents.cid = ?', $cid)));   
    $permalink = rtrim($parentContent['permalink'], '/');   
    
    $page = ($options->commentsPageBreak)   
          ? '/comment-page-' . ceil($count / $options->commentsPageSize)   
          : ( substr($permalink, -5, 5) == '.html' ? '' : '/' );   
    
    return array(   
        "author" => $row['author'],   
        "text" => $row['text'],   
        "href" => "{$permalink}{$page}#{$row['type']}-{$coid}"  
    );   
}      
