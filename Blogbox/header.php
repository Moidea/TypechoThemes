<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="/favicon.ico">
<title><?php $this->archiveTitle(array(
'category'  =>  _t('分类 %s 下的文章'),
'search'    =>  _t('包含关键字 %s 的文章'),
'tag'       =>  _t('标签 %s 下的文章'),
'author'    =>  _t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw='); ?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Serif:400,400italic,700,700italic%7COpen+Sans:400,700,400italic,700italic" />
<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl(); ?>style.css">
</head>
<body class="fixed-nav home-template">

	<div id="page" class="site">
	
<nav class="site-nav" aria-label="Main Menu">
	<div class="inner">
			<button id="menu-toggle" class="menu-toggle" aria-expanded="false"><span class="icon-menu" aria-hidden="true"></span> Menu</button>
<div id="nav-menu" class="nav-menu">
	<ul class="menu">
	<li class="menu-item home <?php if($this->is('index')): ?>current-menu-item<?php endif; ?>"><a href="<?php $this->options->siteUrl(); ?>">Home</a></li>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<li class="menu-item <?php if($this->is('page', $pages->slug)): ?>current-menu-item<?php endif; ?>" role="presentation"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
<?php endwhile; ?>
	</ul>
</div><!-- .nav-menu -->

<a class="subscribe-button" href="<?php $this->options->siteUrl(); ?>feed/"><i class="fa-rss" aria-hidden="true"></i><span class="screen-reader-text">Subscribe</span></a>
	</div><!-- .inner -->
</nav><!-- .site-nav -->

<header class="site-header">
	<div class="inner">
		<h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></h1>
		<p class="site-description"><?php $this->options->description() ?></p>
	</div><!-- .inner -->
</header><!-- .site-header -->

<main class="content">