<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">

    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <meta name="renderer" content="webkit"> <!-- 强制双核浏览器使用webkit内核 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp"> <!-- 禁止百度手机版转码 -->
    <meta http-equiv="Cache-Control" content="no-transform">

    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link rel="shortcut icon" href="//cdn.brdev.org/favicon.ico">
    <link rel="apple-touch-icon" href="//cdn.brdev.org/icon.png">

    <?php $this->header(); ?>
</head>
<body>
    <div class="main">
        <header id="header">
            <div class="wrapper">
                <nav id="nav" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
                        <?php _e('首页'); ?>
                    </a>

                    <!-- 分类列表，判断结构为if{if...}else{if...} -->
                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()): ?>
                        <a <?php if ($this->is('post')): ?><?php if($this->category == $category->slug): ?> class="current"<?php endif; ?><?php else: ?><?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?><?php endif; ?> href="<?php $category->permalink(); ?>" >
                            <?php $category->name(); ?>
                        </a>
                    <?php endwhile; ?>

                    <!-- 独立页面 -->
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                        <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>">
                            <?php $pages->title(); ?>
                        </a>
                    <?php endwhile; ?>
                </nav>
            </div>

            <h1 class="title">
                <?php $this->options->title() ?>
                <div id="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </h1>
        </header>
