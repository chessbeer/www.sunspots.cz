<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.20791900 1398116604";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:74:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Homepage\default.latte";i:2;i:1398116575;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'op6trtkxaa')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbcaf423a150_head')) { function _lbcaf423a150_head($_l, $_args) { extract($_args)
?>  

		<script type="text/javascript">
			$(document).ready(function () {
      
        function initPanZoom() {
          $('#pan img').panZoom({
            'zoomIn'   	: 		$('#zoomin'),
            'zoomOut' 	: 		$('#zoomout'),
            'panUp'		  :		$('#panup'),
            'panDown'		:		$('#pandown'),
            'panLeft'		:		$('#panleft'),
            'panRight'	:		$('#panright'),
            'fit'       :   $('#fit'),
            'destroy'   :   $('#destroy'),
            'out_x1'    :   $('#x1'),
            'out_y1'    :   $('#y1'),
            'out_x2'    :   $('#x2'),
            'out_y2'    :   $('#y2'),
            'directedit':   true,
            'debug'     :   false
          });
           
        };
        
         initPanZoom();
       
				// init the image switcher
				$('#images img').bind('click', function () {
					$('#pan img').attr('src', $(this).attr('src'));
 
				});

        // init the init button (for testing destroy/recreate)
        $('#reinit').bind('click', function (event) {
          if ($('#pan img').data('panZoom')) {
            alert('Click destroy before trying to re-initialise panZoom');
            return;
          }
          event.preventDefault();
           
          initPanZoom();
              
        }); 

          
         $('img[usemap]').rwdImageMaps();
         
			});
       
       $('img[usemap]').rwdImageMaps();

        

       
        
        
		</script>

<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb4138b4e84e_content')) { function _lb4138b4e84e_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>


<div id="photos">
<?php if ($count == 0): ?>
Nejsou k dispozici zadne snimky.

<?php else: if ($count >1): ?>
<div id="l_a">
<a href="<?php echo htmlSpecialChars($_control->link("this", array('id' => (($num+($count-1))%$count)))) ?>
"><img alt="previous" src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_l.png" width="50" height="50" /></a>
</div>
<?php else: ?>
<div id="l_a">
<a href="<?php echo htmlSpecialChars($_control->link("this", array('id' => (($num+($count-1))%$count)))) ?>
"><img alt="previous" src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_l.png" width="50" height="50" style="visibility:hidden" /></a>
</div>
<?php endif ?>


<div id="img">   

<div id="pan">
<img id="jay" alt="klasifikace" src="<?php echo htmlSpecialChars($basePath) ?>/obrazky/<?php echo htmlSpecialChars($images[$num]) ?>" usemap="#spots"  />
<?php if ($crop_images_count[$num] != 0): ?>
<map name="spots">
<ul>
<?php for ($i=1;  $i <= $crop_images_count[$num]; $i++): ?>
 <li><a shape="rect" coords="<?php echo htmlSpecialChars($crop_images[$num][$i][1]) ?>
,<?php echo htmlSpecialChars($crop_images[$num][$i][3]) ?>,<?php echo htmlSpecialChars($crop_images[$num][$i][2]) ?>
,<?php echo htmlSpecialChars($crop_images[$num][$i][4]) ?>" alt="skvrna" title="skvrna<?php echo htmlSpecialChars($i) ?>
"  href="<?php echo htmlSpecialChars($_control->link("Klasifikace:", array('id'=>substr($images[$num], 0, -4).'-'.$i))) ?>
"/></a></li>

<?php endfor ?>
</ul>
</map>
<?php endif ?>
</div>
</div>
<?php if ($count >1): ?>
<div id="r_a">
<a href="<?php echo htmlSpecialChars($_control->link("this", array('id' => (($num+1)%$count)))) ?>
"><img alt="next" src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_r.png" width="50" height="50" /></a>
</div>
<?php else: ?>
<div id="r_a">
<a href="<?php echo htmlSpecialChars($_control->link("this", array('id' => (($num+1)%$count)))) ?>
"><img alt="next" src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_r.png" width="50" height="50" style="visibility:hidden" /></a>
</div>
<?php endif ?>
<div id="controls-container">
<div id="controls">
     
        <a id="zoomin" href="#">
          <img src="<?php echo htmlSpecialChars($basePath) ?>/images/zoom_in.png" /><br />
          Přiblížit
        </a>
        <a id="zoomout" href="#">
          <img src="<?php echo htmlSpecialChars($basePath) ?>/images/zoom_out.png" /><br />
          Oddálit
        </a>
        <a id="fit" href="#">
          <img src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_out.png" /><br />
          Původní velikost
        </a>
          </div>
      <div id="done">   
             
<?php if ($class_done[$num]): ?>
 <img src="<?php echo htmlSpecialChars($basePath) ?>/images/ok2.png" /> 
<?php else: ?>
<img src="<?php echo htmlSpecialChars($basePath) ?>/images/ok2.png" style="visibility: hidden" /> 
<?php endif ?>
       </div>
</div>        


  <div id="images">
         <h3>Snímky</h3>
        <div id="popis">
        Snímek ze Štefánikovy observatoře: <br />
Datum: <?php echo Nette\Templating\Helpers::escapeHtml(substr($images[$num], 10, 2), ENT_NOQUOTES) ?>
. <?php echo Nette\Templating\Helpers::escapeHtml(substr($images[$num], 7, 2), ENT_NOQUOTES) ?>
. <?php echo Nette\Templating\Helpers::escapeHtml(substr($images[$num], 2, 4), ENT_NOQUOTES) ?>

Čas: <?php echo Nette\Templating\Helpers::escapeHtml(substr($images[$num], 13, 2), ENT_NOQUOTES) ?>
:<?php echo Nette\Templating\Helpers::escapeHtml(substr($images[$num], 16, 2), ENT_NOQUOTES) ?> <br />
        </div>
        <img alt="klasifikace" src="<?php echo htmlSpecialChars($basePath) ?>/obrazky/<?php echo htmlSpecialChars($images[$num]) ?>" width="150" height="134" />
        <img alt="klasifikace_nasa" src="<?php echo htmlSpecialChars($basePath) ?>
/obrazky/<?php echo htmlSpecialChars($images_nasa[$num]) ?>" width="150" height="134" />
        <div id="popis">
        Nejbližší existující snímek od NASA: <br />
Datum: <?php echo Nette\Templating\Helpers::escapeHtml(substr($images_nasa[$num], 10, 2), ENT_NOQUOTES) ?>
. <?php echo Nette\Templating\Helpers::escapeHtml(substr($images_nasa[$num], 7, 2), ENT_NOQUOTES) ?>
. <?php echo Nette\Templating\Helpers::escapeHtml(substr($images_nasa[$num], 2, 4), ENT_NOQUOTES) ?>

Čas: <?php echo Nette\Templating\Helpers::escapeHtml(substr($images_nasa[$num], 13, 2), ENT_NOQUOTES) ?>
:<?php echo Nette\Templating\Helpers::escapeHtml(substr($images_nasa[$num], 16, 2), ENT_NOQUOTES) ?>  <br />
       </div>
        </div>
       <div id="clear">
<?php if (!empty($comment[$num])): ?>
       Komentář autora: <?php echo Nette\Templating\Helpers::escapeHtml($comment[$num], ENT_NOQUOTES) ;endif ?>


       
      </div>
      
<?php endif ?>
</div>

<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb33b72684dd_title')) { function _lb33b72684dd_title($_l, $_args) { extract($_args)
?><h1>Klasifikace slunečních skvrn</h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 