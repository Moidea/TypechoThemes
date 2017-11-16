<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<!-- Apple设备支持Start -->
<meta id="viewport" name="viewport" content="width=320; initial-scale=1.0;maximum-scale=1.0; user-scalable=no;"/>
<meta name=”apple-mobile-web-app-capable” content=”yes” />       
<meta name=”apple-mobile-web-app-status-bar-style” content=black” />    
<meta content="black" name="apple-mobile-web-app-status-bar-style" /> 
<meta content="telephone=no" name="format-detection" /> 
<!-- Apple设备支持END -->
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="shortcut icon" href="<?php $this->options->siteUrl(); ?>favicon.ico" />
<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('skin/blue.css'); ?>" />
<!-- 通过自有函数输出HTML头部信息 -->
<?php if($this->is('index')): ?>
<link rel="canonical" href="<?php $this->options->siteUrl(); ?>" />
<?php endif; ?>
<?php if($this->is('post')): ?>
<link rel="canonical" href="<?php $this->permalink() ?>" />
<?php endif; ?>
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw='); ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('lazyload.js'); ?>"></script>
<script type="text/javascript">
	jQuery(function() {          
    	jQuery("img").not(".thumb").lazyload({
        	placeholder:"<?php $this->options->themeUrl('loading.gif'); ?>",
            effect:"fadeIn"
          });
    	});
</script>
<style type="text/css">
body { background: <?php echo $this->options->background . ' url(' . $this->options->themeUrl . '/patterns/' . $this->options->pattern . '.png)'; ?>; }
</style>
<!--[if lte IE 8]>
<div style="border: 1px solid rgb(255, 204, 0); line-height: 25px; background-color: rgb(255, 255, 203); font-size: 14px; display: block; background-position: initial initial; background-repeat: initial initial;text-align:center;">
您正在使用的是老版IE浏览器哦，页面显示会不正常，强烈建议您升级至IE8或使用其他内核的浏览器！
</div>
<style>
#w2b-StoTop{margin:-300px 0 0 300px !important;display:none !important}
iframe,.cut_line{display:none !important}
.logo{padding:0px 20px;float:left;width:198px;}
.logo a{color:#1ba1e2;line-height:70px;height:70px;display:block;font-size:28px;}
</style>
<![endif]-->
</head>

<body>
<div class="fuck">
<div class="head">
<h1 class="logo"><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>">
<?php if ($this->options->logoUrl): ?>
<img src="<?php $this->options->logoUrl() ?>"></h1>
<?php else: ?>
<?php $this->options->title() ?>
<?php endif; ?>
</a></h1>
  <ul class="nav">
    <li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>" title="<?php _e('首页'); ?>"><?php _e('首页'); ?></a></li>
	  <?php if (empty($this->options->menuDisplay) || in_array('cat', $this->options->menuDisplay)): ?>
            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php while($categories->next()): ?>
                <li<?php if($this->is('category', $categories->slug)): ?> class="current"<?php endif; ?>><a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a></li>
            <?php endwhile; ?>
 <?php endif; ?>
	  <?php if (empty($this->options->menuDisplay) || in_array('page', $this->options->menuDisplay)): ?>
	<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
	<?php while($pages->next()): ?>
    <li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
	<?php endwhile; ?>
 <?php endif; ?>
  </ul>
</div>