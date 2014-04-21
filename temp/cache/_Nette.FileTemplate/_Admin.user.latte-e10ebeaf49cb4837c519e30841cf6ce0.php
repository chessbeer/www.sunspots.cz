<?php //netteCache[01]000390a:2:{s:4:"time";s:21:"0.66410300 1398116676";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:68:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Admin\user.latte";i:2;i:1395861635;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Admin\user.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4zfov0iwya')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbcb80cfc011_content')) { function _lbcb80cfc011_content($_l, $_args) { extract($_args)
;Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("userForm") ? "userForm" : $_control["userForm"]), array()) ?>
<div class="sign-in-form">
<?php if (is_object($form)) $_ctrl = $form; else $_ctrl = $_control->getComponent($form); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('errors') ?>

        <div class="pair">
<?php $_input = is_object("user") ? "user" : $_form["user"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="input"><?php $_input = (is_object("user") ? "user" : $_form["user"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
        <div class="pair">
<?php $_input = is_object("role") ? "role" : $_form["role"]; if ($_label = $_input->getLabel()) echo $_label->addAttributes(array()) ?>
                <div class="input"><?php $_input = (is_object("role") ? "role" : $_form["role"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
       
   
        <div class="pair">
                <div class="input"><?php $_input = (is_object("send") ? "send" : $_form["send"]); echo $_input->getControl()->addAttributes(array()) ?></div>
        </div>
</div>



<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>

<a title="Administrace" href="<?php echo htmlSpecialChars($_control->link("Admin:")) ?>
">Zpět</a>
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
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 