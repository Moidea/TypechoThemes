<?php $this->need('header.php'); ?>
    <div class="banner-bar">
        <div class="container">
            <div class="col-8 columns">
                <div class="place">
                    <a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo;</li>
                    <?php if ($this->is('index')): ?><!-- 页面为首页时 -->
                        Latest Post
                    <?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
                        <?php $this->category(); ?> &raquo; <?php $this->title() ?>
                    <?php else: ?><!-- 页面为其他页时 -->
                        <?php $this->archiveTitle(' &raquo; ','',''); ?>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>
<div class="container">
    <div class="col-11 columns" id="mainbody" role="main">
        <div class="post-single type-post">
            <h1  class="article-h1"><?php $this->title() ?></h1>
            <?php $this->need('inc/meta.php'); ?>
            <div class="entry">
                <?php $this->content(); ?>
            </div>
            <div itemprop="keywords" class="tags-meta"><?php _e('标签: '); ?><?php $this->tags('', true, 'none'); ?></div>
            <?php $this->related(4)->to($relatedPosts); ?>
                <div class="related">
                <h3>相关文章推荐</h3>
                <ul class="clearfix">
                <?php while ($relatedPosts->next()): ?>
                <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
                <?php endwhile; ?>
                </ul>
                </div>
            <ul class="pagetion clearfix">
                <li class="nav-prev">上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
                <li class="nav-next">下一篇：<?php $this->theNext('%s','没有了'); ?></li>     
            </ul>             
            <div class="qqlist">
              <h3>订阅本站<small>(RSS)</small></h3>
              <form method="post" target="_blank" action="http://list.qq.com/cgi-bin/qf_compose_send">
              <input type="hidden" value="qf_booked_feedback" name="t" />
              <input type="hidden" value="ae635783c073579b4c896681641ad6962add1330f98a2c28" name="id" />
              <input type="text" placeholder="E-mail" value="" class="rsstxt" name="to" id="to" />
              <button type="submit" >订阅&rarr;</button>
              </form>
            </div>     


        </div>
        <?php $this->need('comments.php'); ?>
      
    </div>
    <?php $this->need('sidebar.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
