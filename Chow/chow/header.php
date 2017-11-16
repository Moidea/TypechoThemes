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
					<li><a <?php if($this->is('index')): ?>class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">HOME</a></li>
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
				<?php if (empty($this->options->sideshowBlock) || in_array('ShowSideShow', $this->options->sideshowBlock)): ?>
				<div class="sideshow">
					<?php if (empty($this->options->sideshowBlock) || in_array('ShowSNS', $this->options->sideshowBlock)): ?>
					<div class="sns">
						<a target="_blank" class="rss" title="订阅本站" href="<?php $this->options->feedUrl(); ?>"></a>
						<a target="_blank" class="twitter" title="Twitter" href="<?php $this->options->twitterAccount() ?>"></a>
						<a target="_blank" class="weibo" title="Weibo" href="<?php $this->options->weiboAccount() ?>"></a>
						<a target="_blank" class="douban" title="豆瓣" href="<?php $this->options->doubanAccount() ?>"></a>
						<a target="_blank" class="gplus" title="Google+" href="<?php $this->options->gplusAccount() ?>""></a>
						<a target="_blank" class="facebook" title="Facebook" href="<?php $this->options->facebookAccount() ?>"></a>
					</div>
					<?php endif; ?>
					<div class="sideshow-control">
						<ul>
						<?php $this->widget('Widget_Contents_Post_Recent')->to($post); ?> 
						<?php while($post->next()): ?> 
						<li>
						<div class="thumb">
							<?php getThumbnail($post, 880, 189); ?>
						</div>
						<div class="title" style="width:<?php if (empty($this->options->sideshowBlock) || in_array('ShowSNS', $this->options->sideshowBlock)): ?>650px;margin-left:230px;<?php else: ?>880px<?php endif; ?>">
							<span class="title-text"><?php $post->title(); ?></span>
							<a class="title-button" title="阅读全文" href="<?php $post->permalink(); ?>"></a>
						</div>
						</li>
						<?php endwhile; ?>
						</ul>
					</div>
				</div>
				<?php endif; ?>
				<?php if($this->options->noticeText !== ""): ?>
				<div class="notice"><span><?php $this->options->noticeText(); ?><span></div>
				<?php endif; ?>
			</div>