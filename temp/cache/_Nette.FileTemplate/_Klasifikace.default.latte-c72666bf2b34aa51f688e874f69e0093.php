<?php //netteCache[01]000399a:2:{s:4:"time";s:21:"0.03415000 1398116909";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:77:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Klasifikace\default.latte";i:2;i:1398116903;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Klasifikace\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'fde4i9xqxj')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb84804541a4_head')) { function _lb84804541a4_head($_l, $_args) { extract($_args)
?>  

		<script type="text/javascript">
  
     $(function(){
     
         $('#frmklasifikaceForm-klasifikace').dependentSelects();        
        
       
});
          $(function(){
          if( $('#dependent-sub').val() === '' ){
        alert('Dopln udaje');
        }
          });
          </script>
          
    
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6356a4ef90_content')) { function _lb6356a4ef90_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
<h3>Snímek s id <?php echo Nette\Templating\Helpers::escapeHtml(substr($num, 0, -2), ENT_NOQUOTES) ?>
, oblast číslo <?php echo Nette\Templating\Helpers::escapeHtml(substr($num, -1), ENT_NOQUOTES) ?></h3>

<div id="cropp">
<a href="" id="z">McIntoshova klasifikace</a>
<img src="<?php echo htmlSpecialChars($basePath) ?>/images/klasifikace.jpg" id="z_img" width="100%" />  
  <div id="clear"></div>

<?php if ($crop_count > 1): if ($number == 1): ?>
<a href="<?php echo htmlSpecialChars($_control->link("this", array('id' =>substr($num, 0, -2).'-'.$crop_count))) ?>
"><img alt="previous" src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_l.png" width="50" height="50" /></a>
<?php else: ?>
<a href="<?php echo htmlSpecialChars($_control->link("this", array('id' =>substr($num, 0, -2).'-'.(($number+($crop_count-1))%$crop_count)))) ?>
"><img alt="previous" src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_l.png" width="50" height="50" /></a>
<?php endif ;endif ?>

 <a title="img" class="show_form" href="#">
<img src="<?php echo htmlSpecialChars($basePath) ?>/obrazky/<?php echo htmlSpecialChars(substr($num, 0, -2)) ?>
/<?php echo htmlSpecialChars(substr($num, -1)) ?>.jpg" />
</a>

<?php if ($crop_count > 1): ?>
<a href="<?php echo htmlSpecialChars($_control->link("this", array('id' =>substr($num, 0, -2).'-'.(($number%$crop_count)+1)))) ?>
"><img alt="previous" src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow_r.png" width="50" height="50" /></a>
<?php endif ?>


<?php if (!empty($zpc) && $zpc != '61'): ?>
 <img src="<?php echo htmlSpecialChars($basePath) ?>/images/ok.png" /> 
<?php endif ?>
<div id="clear2">
<a title="img" class="show_form" href="#">Klasifikovat</a>
</div>  
</div>



<div id="form_wrapper">

<?php if (!empty($session->user['email'])): ?>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("klasifikaceForm") ? "klasifikaceForm" : $_control["klasifikaceForm"]), array()) ?>
<div class="klasifikace-form">
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

        <div class="pair">
<?php $_input = is_object("klasifikace") ? "klasifikace" : $_form["klasifikace"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="input"><?php if (!empty($zpc)): ?>

<?php $_input = (is_object("klasifikace") ? "klasifikace" : $_form["klasifikace"]); echo $_input->getControl()->addAttributes(array('value' => $zpc)) ?>
                <?php else: $_input = (is_object("klasifikace") ? "klasifikace" : $_form["klasifikace"]); echo $_input->getControl()->addAttributes(array()) ;endif ?></div>         
        </div>
  


        <div class="pair">
<?php $_input = is_object("comment") ? "comment" : $_form["comment"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="input"><?php if (!empty($comment)): ?>

<?php $_input = (is_object("comment") ? "comment" : $_form["comment"]); echo $_input->getControl()->addAttributes(array('value' => $comment)) ?>
                <?php else: $_input = (is_object("comment") ? "comment" : $_form["comment"]); echo $_input->getControl()->addAttributes(array()) ;endif ?></div>
        </div>
         <div class="pair">
<?php $_input = is_object("num") ? "num" : $_form["num"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="num">
<?php $_input = (is_object("num") ? "num" : $_form["num"]); echo $_input->getControl()->addAttributes(array('value' => $num)) ?>
                </div>
        </div>
       

        <div class="pair">
                <div class="klas_send"><?php $_input = (is_object("send") ? "send" : $_form["send"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
        
        <div class="pair">
                <div class="klas_cancel"><?php $_input = (is_object("cancel") ? "cancel" : $_form["cancel"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
        <div id="clear"></div>
</div>



<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;else: ?>
Pro klasifikaci se musíš <a title="Přihlášení" href="<?php echo htmlSpecialChars($_control->link("SignIn:")) ?>
">přihlásit</a> / <a title="Registrace" href="<?php echo htmlSpecialChars($_control->link("Registration:")) ?>
">registrovat</a>.
<?php endif ?>
</div>

     
<?php if (!empty($session->user['admin']) && $session->user['admin'] == 2): ?>
<div id="other_class">
<?php if (!empty ($other_class)): ?>
<h2>Klasifikace ostatních uživatelů</h2>
<ul>
<?php $iterations = 0; foreach ($other_class as $class): ?>

<li><?php echo Nette\Templating\Helpers::escapeHtml($class[0], ENT_NOQUOTES) ?>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("opravaForm") ? "opravaForm" : $_control["opravaForm"]), array()) ?>
<div class="klasifikace-form">
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

         <div class="pair">
<?php $_input = is_object("num") ? "num" : $_form["num"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="num">
<?php $_input = (is_object("num") ? "num" : $_form["num"]); echo $_input->getControl()->addAttributes(array('value' => $num)) ?>
                </div>
        </div>
         <div class="pair">
<?php $_input = is_object("user") ? "user" : $_form["user"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="user">
<?php $_input = (is_object("user") ? "user" : $_form["user"]); echo $_input->getControl()->addAttributes(array('value' => $class[1])) ?>
                </div>
        </div>
         <div class="pair">
<?php $_input = is_object("zpc") ? "zpc" : $_form["zpc"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="zpc">
<?php $_input = (is_object("zpc") ? "zpc" : $_form["zpc"]); echo $_input->getControl()->addAttributes(array('value' => $zpc)) ?>
                </div>
        </div>
        <div class="pair">
<?php $_input = is_object("user_zpc") ? "user_zpc" : $_form["user_zpc"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="user_zpc">
<?php $_input = (is_object("user_zpc") ? "user_zpc" : $_form["user_zpc"]); echo $_input->getControl()->addAttributes(array('value' => $class[2])) ?>
                </div>
        </div>

        <div class="pair">
                <div class="send"><?php $_input = (is_object("send") ? "send" : $_form["send"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>         
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</li>

<?php $iterations++; endforeach ?>
</ul>  
<?php else: ?>
<h2>Skvrna nebyla nikým klasifikována</h2>
<?php endif ?>
</div>


<?php endif ?>
<div id="back">
<a href="<?php echo htmlSpecialChars($_control->link("Homepage:", array('id'=> $back))) ?>
">Zpět</a>  
</div>

<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb916ed36f46_title')) { function _lb916ed36f46_title($_l, $_args) { extract($_args)
?><h1>Klasifikuj skvrny:</h1> 
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