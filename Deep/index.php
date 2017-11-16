<?php
/**
 * 响应式博客模板,最大宽度为1200px,同时支持IE8+，iPad,iPhone,Andriod等移动设备 <br />欢迎与我交流QQ：373345619
 * 
 * @package deep's Theme 
 * @author Deep
 * @version 1.0.0
 * @link http://www.deepswd.com
 */
 
 $this->need('header.php');
 ?>
 <div class="slider">
  <div class="banner-overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-10 columns">
        <div class="hero">
          <h2>Hello</h2>
          <p>I'm deep, Welcome to my Blog!</p>
          <mark class="mark">前端 • 设计 • 建站 • 分享</mark>
        </div>
        <ul class="project clearfix">
           <li><h3>Web前端开发</h3>
              <p>记录前端开发工作中遇到的一些问题与解决方法,Javascript、CSS3、响应式布局,Mobile web等:-)</p>
          </li>
          <li><h3>网页设计</h3>
              <p>分享网页设计中最美好的设计理念与创意，传达最前沿与时尚的网页设计风格！眼里的世界不再单调(*^__^*)</p>           
          </li>
          <li><h3>CMS建站知识</h3>
              <p>希望能分享更多CMS建站经验与技能，让建站更简单与便捷。尽管自己还是一名菜鸟 o(∩_∩)o</p>            
          </li>
          <li><h3>资源分享</h3>
              <p>进步与成长需要更多交流与沟通，分享具有学习价值的优质资源→</p>          
          </li>
        </ul>
      </div>
      <div class="col-6 columns" id="flash">
            <div class="panel-flash">
              <a href="" class="stag stage3" style="display:block" ><img src="<?php $this->options->themeUrl('images/prev1.jpg'); ?>" alt="deep"></a>
              <a href="" class="stag stage1" style="display:none"><img src="<?php $this->options->themeUrl('images/prev2.jpg'); ?>" alt="about-me"></a>
              <a href="" class="stag stage2" style="display:none"><img src="<?php $this->options->themeUrl('images/prev3.jpg'); ?>" alt="code"></a>
            </div>
      </div>
    </div>
  </div>
</div>
<div class="container">

	<div class="col-11 columns" id="mainbody">

 	<?php while($this->next()): ?>
    <!-- article -->
    <div class="post type-post" >
   
            <!-- post title -->
            <h2 class='loading-title' itemprop="name headline">
              <a itemtype="url" href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a>
            </h2>
            <?php $this->need('/inc/meta.php'); ?>
         
           <!-- /post details --> 
   			 <div class="entry"><?php $this->content('阅读全文&raquo;'); ?></div>
				
 	 </div>
	<?php endwhile; ?>
	<div class="type-post" id="pagination">
	<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
	</div>
	</div>

	 <?php $this->need('sidebar.php'); ?>

</div>

 <?php $this->need('footer.php'); ?>

