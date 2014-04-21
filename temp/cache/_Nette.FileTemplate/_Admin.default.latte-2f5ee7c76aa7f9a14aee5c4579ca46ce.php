<?php //netteCache[01]000393a:2:{s:4:"time";s:21:"0.90212800 1398115195";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:71:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Admin\default.latte";i:2;i:1397939628;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Admin\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hkq6ljkrcd')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb3502ba8391_title')) { function _lb3502ba8391_title($_l, $_args) { extract($_args)
?>Administrace<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1aea0def1d_content')) { function _lb1aea0def1d_content($_l, $_args) { extract($_args)
?><h2>Vyber akci</h2>  


<ul>
<li><a title="Upload" href="<?php echo htmlSpecialChars($_control->link("Admin:Upload")) ?>
">Upload snímku</a></li>
<li><a title="Contact" href="<?php echo htmlSpecialChars($_control->link("Admin:Contact")) ?>
">Zobraz zprávy</a></li>
<?php if (!empty($session->user['admin']) && $session->user['admin'] == 2): ?>
<li><a title="User" href="<?php echo htmlSpecialChars($_control->link("Admin:User")) ?>
">Nastavit práva uživatelů</a></li>
<li><a title="Image" href="<?php echo htmlSpecialChars($_control->link("Admin:Image")) ?>
">Vybrat oblasti se skvrnami</a></li>
<?php endif ?>
</ul>
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
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>



<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 