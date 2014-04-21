<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.88861500 1398115288";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:72:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\SignIn\default.latte";i:2;i:1397841496;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\SignIn\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '9sj8e3trc5')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb716c92f2a8_content')) { function _lb716c92f2a8_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>


<a href="<?php echo htmlSpecialChars($fbUrl) ?>"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/login_fb.png" /></a>

<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("signInForm") ? "signInForm" : $_control["signInForm"]), array()) ?>
<div class="sign-in-form">
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

        <div class="pair">
<?php $_input = is_object("email") ? "email" : $_form["email"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="input"><?php $_input = (is_object("email") ? "email" : $_form["email"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
        <div class="pair">
<?php $_input = is_object("password") ? "password" : $_form["password"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="input"><?php $_input = (is_object("password") ? "password" : $_form["password"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
       

        <div class="pair">
                <div class="input"><?php $_input = (is_object("sign") ? "sign" : $_form["sign"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
</div>



<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbeabcad8e3d_title')) { function _lbeabcad8e3d_title($_l, $_args) { extract($_args)
?><h1>Přihlášení</h1>
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
$robots = 'noindex' ?>


<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 