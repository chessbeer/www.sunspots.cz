<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.21312200 1398116621";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:74:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Napoveda\default.latte";i:2;i:1397939416;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Napoveda\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'g1x0kokvfo')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0b2fa61f2a_content')) { function _lb0b2fa61f2a_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

Na úvodní stránce vyberte snímek, u kterého chcete klasifikovat skvrnu/y.<br />
Se snímkem můžete pohybovat pomocí myši, nebo pomocí tlačítek pod snímkem.     <br />
Pokud si nejste jisti, můžete si zobrazit nejbližší existující snímek od NASA.  <br />
Na snímku ze Štefánikovy hvězdárny najeďte myší na skvrnu, kterou chcete klasifikovat. <br />
Klikněte na skvrnu (po zobrazení ruky).   <br />
Pro usnadnění můžete najetím na odkaz "McIntoshova klasifikace" zobrazit obrázek McIntoshovy klasifikace, která vám usnadní rozhodování. <br />
Po kliknutí na obrázek, nebo tlačítko "Klasifikovat" se zobrazí klasifikační formulář.<br />
Zde vyberte typ skvrny a případně zanechte komentář. Pro uložení klasifikace stiskněte tlačítko "Potvrdit změny". <br />

Děkujeme!

<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb655488f5ac_title')) { function _lb655488f5ac_title($_l, $_args) { extract($_args)
?><h2>Jak klasifikovat skvrny?</h2>  
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