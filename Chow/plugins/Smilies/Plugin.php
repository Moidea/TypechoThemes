<?php
/**
 * 评论表情及贴图
 * 
 * @package Smilies
 * @author willin kan
 * @version 1.0.4
 * @update: 2011.07.09
 * @link http://kan.willin.org/typecho/
 */
class Smilies_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->beforeRender = array('Smilies_Plugin', 'ini');
        Typecho_Plugin::factory('Widget_Abstract_Comments')->contentEx = array('Smilies_Plugin', 'ini');
        Typecho_Plugin::factory('Widget_Abstract_Comments')->contentEx = array('Smilies_Plugin', 'convertSmilies');

    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
    echo "<div style='
    width:330px; position:absolute; top:0; right:80px; padding:10px 20px; background:#DFE5C6; font-size:13px;
    -moz-border-radius:7px; -webkit-border-radius:7px; -khtml-border-radius:7px; border-radius:7px; z-index:10;
    '>
    <b>使用说明：</b><span style='font-size:12px;'>在 comments.php 合适的位置插入代码</span><br/>
    <b style='color:#E47E00;'>&lt;?php Smilies_Plugin::output(); ?&gt;</b><br/>
    <span style='font-size:12px;'>且评论內容 &lt;textarea&gt; 要有 <b style='color:#E47E00;'>id=\"comment\"</b> 才能使用。</span>
    </div>";

    $allow_img = new Typecho_Widget_Helper_Form_Element_Radio(
      'allowPostImg', array('0'=> '不开放', '1'=> '开放'), 1, '贴图功能', '开放贴图功能可让访客在评论上贴图.<br/><br/>');
    $form->addInput($allow_img);

    $smily_url = new Typecho_Widget_Helper_Form_Element_Text(
      'smiliesUrl', NULL, Typecho_Widget::widget('Widget_Options')->siteUrl . "usr/plugins/Smilies/img/", '表情位址', '可自定义表情图片位址, 记得要以 <b>/</b> 结尾.<br/><br/>
      默认表情栏位使用的是 id="smiley"; 在表情图片使用的是 class="smiley".<br/>
      贴图和表情的文字链接只是用 &lt;span&gt; 包含, 可视情况改为 &lt;div&gt; 或 &lt;p>.<br/>
      ');
    $form->addInput($smily_url->addRule('url', '请填入一个url地址'));

    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    public static function output()
    {
        include('Smilies/Smilies.php');
    }

    /**
     * 初始化
     *
     * @access public
     * @return arrays
     */
    public static function ini()
    {
        global $smilies_trans, $smilies_tag, $smilies_replace;

        // setting at first time
        if (!isset($smilies_trans)) {
          $smilies_trans = array(
          ':?:'        => 'icon_question.gif',
          ':razz:'     => 'icon_razz.gif',
          ':sad:'      => 'icon_sad.gif',
          ':evil:'     => 'icon_evil.gif',
          ':!:'        => 'icon_exclaim.gif',
          ':smile:'    => 'icon_smile.gif',
          ':oops:'     => 'icon_redface.gif',
          ':grin:'     => 'icon_biggrin.gif',
          ':eek:'      => 'icon_surprised.gif',
          ':shock:'    => 'icon_eek.gif',
          ':???:'      => 'icon_confused.gif',
          ':cool:'     => 'icon_cool.gif',
          ':lol:'      => 'icon_lol.gif',
          ':mad:'      => 'icon_mad.gif',
          ':twisted:'  => 'icon_twisted.gif',
          ':roll:'     => 'icon_rolleyes.gif',
          ':wink:'     => 'icon_wink.gif',
          ':idea:'     => 'icon_idea.gif',
          ':arrow:'    => 'icon_arrow.gif',
          ':neutral:'  => 'icon_neutral.gif',
          ':cry:'      => 'icon_cry.gif',
          ':mrgreen:'  => 'icon_mrgreen.gif',
          '8-)'        => 'icon_cool.gif',
          '8-O'        => 'icon_eek.gif',
          ':-('        => 'icon_sad.gif',
          ':-)'        => 'icon_smile.gif',
          ':-?'        => 'icon_confused.gif',
          ':-D'        => 'icon_biggrin.gif',
          ':-P'        => 'icon_razz.gif',
          ':-o'        => 'icon_surprised.gif',
          ':-x'        => 'icon_mad.gif',
          ':-|'        => 'icon_neutral.gif',
          ';-)'        => 'icon_wink.gif',
          '8)'         => 'icon_cool.gif',
          '8O'         => 'icon_eek.gif',
          ':('         => 'icon_sad.gif',
          ':)'         => 'icon_smile.gif',
          ':?'         => 'icon_confused.gif',
          ':D'         => 'icon_biggrin.gif',
          ':P'         => 'icon_razz.gif',
          ':o'         => 'icon_surprised.gif',
          ':x'         => 'icon_mad.gif',
          ':|'         => 'icon_neutral.gif',
          ';)'         => 'icon_wink.gif',
          );

        // generates $smilies_tag & $smilies_replace arrays
        $imgUrl = Typecho_Widget::widget('Widget_Options')->plugin('Smilies')->smiliesUrl;
        foreach($smilies_trans as $smiley => $img) {
            $smilies_tag[] = $smiley;
            $smilies_replace[] = "<img src=\"$imgUrl$img\" alt=\"\" class=\"smiley\" />";
        }
      }
    }

    /**
     * 替换 :) 或 [img] 为 <img src="..."/>
     *
     * @access public
     * @param integer $text 评论內容
     * @return string
     */
    public static function convertSmilies($text)
    {
        global $smilies_tag, $smilies_replace;
        $output = '';

        // HTML loop taken from texturize function, could possible be consolidated
        $textarr = preg_split("/(<.*>)/U", $text, -1, PREG_SPLIT_DELIM_CAPTURE); 
        $stop = count($textarr);
          for ($i = 0; $i < $stop; $i++) {
            $content = $textarr[$i];
            if ((strlen($content) > 0) && ('<' != $content{0})) { 
              $content = str_replace($smilies_tag, $smilies_replace, $content);
            }
            $output .= $content;
          }
        if (Typecho_Widget::widget('Widget_Options')->plugin('Smilies')->allowPostImg)
          $output = preg_replace('/\[img=?\]*(.*?)(\[\/img)?\]/e', '"<img src=\"$1\" alt=\"" . basename("$1") . "\" />"', $output);
        return $output;
    }

}
