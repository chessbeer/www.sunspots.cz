<?php //netteCache[01]000387a:2:{s:4:"time";s:21:"0.56748300 1398115096";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:65:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\@layout.latte";i:2;i:1398115087;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'p7cipegbnk')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb848f413970_title')) { function _lb848f413970_title($_l, $_args) { extract($_args)
?>Homepage<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lba83a96c9f0_head')) { function _lba83a96c9f0_head($_l, $_args) { extract($_args)
;
}}

//
// block menu
//
if (!function_exists($_l->blocks['menu'][] = '_lb7267f0d309_menu')) { function _lb7267f0d309_menu($_l, $_args) { extract($_args)
?>        
          <div id="menu">
            <ul class="menu">
              <li><a title="Klasifikace" href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">Klasifikace</a></li>
              <li><a title="Informace" href="<?php echo htmlSpecialChars($_control->link("Informace:")) ?>
">O projektu</a></li>
              <li><a title="Sluneční skvrny" href="<?php echo htmlSpecialChars($_control->link("Skvrny:")) ?>
">Skvrny</a></li>
              <li><a title="Kontaktujte nás" href="<?php echo htmlSpecialChars($_control->link("Kontakt:")) ?>
">Kontakt</a></li>
              <li><a title="Zobrazte nápovědu" href="<?php echo htmlSpecialChars($_control->link("Napoveda:")) ?>
">Nápověda</a></li>
<?php if (!empty($session->user['admin'])): ?>
              <li><a title="Administrace" href="<?php echo htmlSpecialChars($_control->link("Admin:")) ?>
">Administrace</a></li>
<?php endif ?>
              <div class="clearer"></div>
            </ul>
          </div>
          
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
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-language" content="en" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?> | Klasifikace slunečních skvrn</title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/jquery.Jcrop.css" type="text/css"  />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/demos.css" type="text/css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo htmlSpecialChars($basePath) ?>/css/main.css" /> 
   <link rel="stylesheet" type="text/css" media="all" href="<?php echo htmlSpecialChars($basePath) ?>/css/skvrny.css" />  
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/css/styleZoom.css" type="text/css" />

<?php $iterations = 0; foreach ($styles as $style): ?>
        
          <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>
/css/<?php echo htmlSpecialChars($style) ?>" />
<?php $iterations++; endforeach ?>
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
     
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
      <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.Jcrop.js"></script>
      <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.rwdImageMaps.js"></script>
      <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.dependent-selects.js"></script>  

  <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/klas.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>

    
    <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-panzoom.js"></script>
    <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.mousewheel.js"></script>
      

  
<?php $iterations = 0; foreach ($scripts as $script): ?>
          <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>
/js/<?php echo htmlSpecialChars($script) ?>"></script>
<?php $iterations++; endforeach ?>

	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
  <div id="container">
    <div id="header">
    <div id="user-zone">
            
           
            <ul class="menu">
<?php if (!empty($session->user['email'])): ?>
             <h3><?php echo Nette\Templating\Helpers::escapeHtml($session->user['email'], ENT_NOQUOTES) ?></h3>
               <li><a title="Odhlásit se" href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlášení</a></li>
                <li><a title="Moje klasifikace" href="<?php echo htmlSpecialChars($_control->link("Mojeklasifikace:")) ?>
">Moje klasifikace</a></li>
                  
<?php else: ?>
              
                
                <li><a title="Registration" href="<?php echo htmlSpecialChars($_control->link("Registration:")) ?>
">Registrace</a></li>
                <li><a title="Login" href="<?php echo htmlSpecialChars($_control->link("SignIn:", array('url'=>$session->url))) ?>
">Přihlášení</a></li>
<?php endif ?>
            </ul>
            
          </div>
     </div>
        
        <div id="menu-container">
<?php call_user_func(reset($_l->blocks['menu']), $_l, get_defined_vars())  ?>
    </div>

    <div id="content">

<?php $iterations = 0; foreach ($flashes as $flash): ?>	<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
    </div>
    <div id="footer-container">
    <div id="footer">
       
    <ul class="menu2">
              <li><a href="mailto:trepkjan@fit.cvut.cz" title="Email">© 2013 Jan Trepka</a></li>
              <li><a title="Klasifikace slunečních skvrn" href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
">Klasifikace slunečních skvrn</a></li>
          
            </ul>
 
    </div>
    </div>
  </div>
</body>
</html>
