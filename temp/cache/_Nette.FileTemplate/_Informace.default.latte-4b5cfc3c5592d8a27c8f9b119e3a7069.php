<?php //netteCache[01]000397a:2:{s:4:"time";s:21:"0.62808100 1398115059";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:75:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Informace\default.latte";i:2;i:1397939462;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Informace\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '953lsvnghf')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf163ca4130_content')) { function _lbf163ca4130_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

Tato webová aplikace umožňuje veřejnosti přistupovat ke digitalizovanému archivu snímků Slunce,
poskytnutého Štefánikovou hvězdárnou na Petříně. <br />   
Zájemcům o tuto problematiku umožňuje klasifikovat sluneční skvrny. <br />
V budoucnu pravděpodobně půjde určovat i další sluneční jevy. <br />
Aplikace bude doplňována o nové snímky.<br /> <br />
Pokud máte jakékoliv připomínky, návrhy nebo dotazy neváhejte nás kontaktovat pomocí formuláře v sekci "Kontakt".

<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb49067d5e2a_title')) { function _lb49067d5e2a_title($_l, $_args) { extract($_args)
?><h1>Informace</h1>
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