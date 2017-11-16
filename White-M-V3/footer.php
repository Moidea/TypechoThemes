 <div class="foot">
    <div class="copy">
      <ul>
        <li><a href="<?php $this->options->siteurl(); ?>">&copy; <?php $this->options->title(); ?></a></li>
        <li>/</li>
        <li><a href="http://www.typecho.org" rel="nofollow">Powered by Typecho)))</a></li>
        <li>/</li>
        <li><a href="http://www.microhu.com">White-M Theme</a></li>
      </ul>
    </div>
    <div class="weibo"><?php if ($this->options->sinaUrl): ?><a href="<?php $this->options->sinaUrl() ?>" class="sina" target="_blank" title="新浪微博" rel="nofollow"></a><?php endif; ?> <?php if ($this->options->qqUrl): ?><a href="<?php $this->options->qqUrl() ?>" class="qq" target="_blank" title="腾讯微博" rel="nofollow"></a><?php endif; ?></div>
  </div>
</div>
<?php $this->footer(); ?>
<script src="<?php $this->options->themeUrl('white-m.js'); ?>"></script>
<a href='#' id='w2b-StoTop' style='display:none;'> 
返回顶部 
</a>
</body>
</html>