<?php
/**
 * 一套随便做的 Typecho 主题,BUG略多
 * 
 * @package 操节
 * @author 酱爆灵梦
 * @version 1.0(Alpha)
 * @link http://www.windim.org
 */
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="description" content="<?php $this->options->description(); ?>">
		<meta name="keywords" content="<?php $this->options->keywords(); ?>">
		<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery-1.9.0.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php $this->options->themeUrl('js/chow.js'); ?>"></script>
		<link rel="stylesheet" href="<?php $this->options->themeUrl('reset.css'); ?>" />
		<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" />
		<link rel="Shortcut Icon" href="<?php $this->options->themeUrl('favicon.ico'); ?>"> 
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php $this->options->feedUrl(); ?>" />
		<link rel="alternate" type="application/rdf+xml" title="RSS 1.0" href="<?php $this->options->feedUrl(''); ?>rss/" />
		<link rel="alternate" type="application/atom+xml" title="ATOM 1.0" href="<?php $this->options->feedUrl(); ?>atom/" />
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<div class="navbar">
					<ul>
					<li><a class="current" href="<?php $this->options->siteUrl(); ?>">HOME</a></li>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
					<?php while($pages->next()): ?>
					<li><a <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
					<div class="search">
						<form method="post" action="">
							<input type="text" name="s" class="text" size="32" value="Search..." x-webkit-speech />
							<input type="submit" class="submit" value="" />
						</form>
					</div>
				</div>
				<div class="logo">
					<span class="title"><?php $this->options->title(); ?></span>
					<span class="description"><?php $this->options->description(); ?></span>
				</div>
			</div>
 			<div class="content">
 				<div class="error404"></div>
 			</div>
<?php $this->need('footer.php'); ?>