<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php $this->header(); ?>
<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>style.css">
<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>css/font-awesome.min.css">
</head>
<body>
<section class="section">
  <div class="container">
    <nav class="nav">
      <div class="nav-left">
        <a class="nav-item" href="<?php $this->options->siteUrl(); ?>">
		<?php if ($this->options->logoUrl): ?>
        <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
        <?php else: ?>
		<h1 class="title is-4"><?php $this->options->title() ?></h1>
		<?php endif; ?>
		</a>
      </div>
      <div class="nav-right">
        <nav class="nav-item level is-mobile">
          
          <a class="level-item" href="https://instagram.com/" target="_blank">
            <span class="icon">
              <i class="fa fa-instagram"></i>
            </span>
          </a>
          
          <a class="level-item" href="https://facebook.com/" target="_blank">
            <span class="icon">
              <i class="fa fa-facebook"></i>
            </span>
          </a>
          
          <a class="level-item" href="https://twitter.com/" target="_blank">
            <span class="icon">
              <i class="fa fa-twitter"></i>
            </span>
          </a>
          
          <a class="level-item" href="/feed/" target="_blank">
            <span class="icon">
              <i class="fa fa-rss"></i>
            </span>
          </a>
          
        </nav>
      </div>
    </nav>
  </div>
</section>