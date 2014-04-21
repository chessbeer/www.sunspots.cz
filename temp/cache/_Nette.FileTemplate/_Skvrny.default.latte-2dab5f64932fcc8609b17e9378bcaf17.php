<?php //netteCache[01]000394a:2:{s:4:"time";s:21:"0.01419200 1398115086";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:72:"C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Skvrny\default.latte";i:2;i:1397977053;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"0ce871c released on 2012-11-28";}}}?><?php

// source file: C:\Users\jayt\diplom\work\sunspots.cz\app\templates\Skvrny\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'jel4p0r6i4')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb3591721979_title')) { function _lb3591721979_title($_l, $_args) { extract($_args)
?>Sluneční skvrny<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb8ef67f21c4_content')) { function _lb8ef67f21c4_content($_l, $_args) { extract($_args)
?><div id="menu_skvrny">

<ul class="menu_skvrny">
              <li><a title="skvrny" href="<?php echo htmlSpecialChars($_control->link("this#slunecni_skvrny")) ?>
">Sluneční skvrny</a></li>
              <li><a title="Klasifikujte" href="<?php echo htmlSpecialChars($_control->link("this#historie")) ?>
">Historie</a></li>
              <li><a title="Zobrazte informace" href="<?php echo htmlSpecialChars($_control->link("this#slunecni_skvrna")) ?>
">Sluneční skvrna</a></li>
              <li><a title="Kontaktujte nás" href="<?php echo htmlSpecialChars($_control->link("this#slozeni")) ?>
">Složení</a></li>
              <li><a title="Zobrazte nápovědu" href="<?php echo htmlSpecialChars($_control->link("this#vznik")) ?>
">Vznik</a></li>
              <li><a title="Zobrazte nápovědu" href="<?php echo htmlSpecialChars($_control->link("this#velikost")) ?>
">Velikost</a></li>
              <li><a title="Zobrazte nápovědu" href="<?php echo htmlSpecialChars($_control->link("this#cyklus")) ?>
">Cyklus</a></li>
              <li><a title="Zobrazte nápovědu" href="<?php echo htmlSpecialChars($_control->link("this#klasifikace")) ?>
">Klasifikace</a></li>
      </ul>
</div>

<div id="skvrny_content">
<div id="slunecni_skvrny">
<h1>Sluneční skvrny</h1>

Sluneční skvrny jsou tmavé oblasti, které se objevují na povrchu Slunce.
Jsou tmavé, protože jsou chladnější než oblasti okolo nich. Velké sluneční skvrny
mohou mít teplotu okolo 4000 K, což je mnohem méně než je teplota fotosféry,
která obklopuje sluneční skvrny. Fotosféra má teplotu 5800K.
</div>

<div id="historie">
<h2>Historie</h2>
První písemné záznamy slunečních skvrn byly vytvořeny čínskými astronomy okolo roku 800 př. n. l.<br /><br />

Astrologové ve starověké Číně a Koreji, kteří věřili, že sluneční skvrny předpovídají důležité události,
vedli záznamy slunečních skvrn po stovky let. Z této doby nejsou známy žádné ilustrace slunečních událostí nebo aktivity slunečních skvrn.<br /><br />

První kresba slunečních skvrn byla vytvořena anglickým mnichem Johnem z Worcesteru v prosinci 1128.<br /><br />

Detailnější pozorování slunečních skvrn bylo umožněno vynálezem dalekohledu roku 1608. V roce 1610 popsal ve svém zápisníku Thomas Harriot
aktivitu slunečních skvrn a přiložil i několik kreseb. To je nejstarší známý detailní záznam slunečního pozorování. Následující rok publikoval
Johannes Fabricius brožuru s názvem „On the Spots Observed in the Sun and their apparent rotation with the sun“.<br /><br />

V témže roce došel Galileo Galilei na základě pozorování k závěru, že skvrny jsou součásti povrchu slunce a postupují od východního
k západnímu okraji slunečního disku, čímž objevil rotaci slunce.<br /><br />

V roce 1843 publikoval Samuel Heinrich Schwabe poznatky svých pozorování v článku nazvaném Solar Observations during 1843.
V tomto článku zmínil předpoklad desetileté periody slunečních cyklů.<br /><br />

V roce 1938 Max Waldmeier vymyslel klasifikaci slunečních skvrn, která se nazývá Curyšská klasifikace.<br / /><br />

V roce 1966 Patrick McIntosh představil systém klasifikace slunečních skvrn, který je zlepšením starší Curyšské klasifikace.
</div>

<div id="slunecni_skvrna">
<h2>Sluneční skvrna</h2>
<div id="slozeni">
<h3>Složení</h3>
Typická sluneční skvrna se skládá ze dvou oblastí. Vnitřní tmavší oblast se nazývá umbra, která je obklopena světlejší oblastí, která se nazývá penumbra.<br /><br />

Sluneční skvrny jsou ve skutečnosti tmavé pouze v kontrastu s okolním povrchem slunce. Pokud bychom skvrnu mohli umístit na oblohu v noci, zářila by přibližně jako měsíc v úplňku.<br /><br />

Slunce není jedinou hvězdou se skvrnami. Nedávno astronomové odhalili skvrny i na jiných hvězdách.<br /><br />

<img alt="umbra" src="<?php echo htmlSpecialChars($basePath) ?>/images/umbra.jpg" />

</div>
<div id="vznik">
<h3>Vznik</h3>
Sluneční skvrny jsou způsobeny velmi silnými magnetickými poli na slunci. Magnetické pole vytryskne do fotosféry, v místě odkud vychází, vzniká jedna skvrna a v místě kde dopadá zpět, vzniká druhá skvrna.
Tyto dvě skvrny mají opačnou magnetickou polaritu.

<img alt="vznik" src="<?php echo htmlSpecialChars($basePath) ?>/images/vznik.jpg" />
</div>
<div id="velikost">
<h3>Velikost a počet slunečních skvrn</h3>
Sluneční skvrny jsou velmi velké oblasti. Většina skvrn má průměr pohybující se v rozmezí od 1500 km do 50000km.<br /><br />

Počet slunečních skvrn se rok od roku mění. Je těžké získat přesný počet skvrn na slunci. Švýcarský astronom Rudolf Wolf vymyslel v roce 1848
vzorec sloužící k počítání skvrn: R = k ( 10g + s ), kde R (Wolfovo číslo) je počet slunečních skvrn, g je počet skupin slunečních skvrn
na slunečním disku, s je celkový počet všech skvrn a k je faktor (obvykle < 1), který odpovídá podmínkám a typu dalekohledu. Vědci kombinují
data z mnoha observatoří – každá má svůj k faktor – aby určili denní hodnotu.

</div>
<div id="cyklus">
<h3>Cyklus slunečních skvrn</h3>
Cyklus byl objeven Samuelem Heinrichem Schwabem v roce 1843. Délka cyklu je v průměru 11 let, ale může se měnit. Každý cyklus má sluneční
maximum a minimum (doba, kdy se objeví nejvíce, respektive nejméně slunečních skvrn). Rudolf Wolf použil dřívější data k rekonstruování počtu
slunečních skvrn, až se dostal k cyklu 1755 – 1766, který označil jako „cyklus 1“. Momentálně se nacházíme v cyklu 24. Na obrázku 4 vidíme průběhy
cyklů za posledních 100 let.

<img alt="prubeh" src="<?php echo htmlSpecialChars($basePath) ?>/images/prubeh_100.jpg" />

<img alt="prubeh" src="<?php echo htmlSpecialChars($basePath) ?>/images/prubeh_400.jpg" />
</div>

</div>

<div id="klasifikace">
<h2>Klasifikace slunečních skvrn</h2>
V současné době se používá McIntoshova klasifikace slunečních skvrn, která zlepšuje starší Curyšskou klasifikaci. McIntoshova klasifikace se skládá ze tří složek – Zpc, kde Z je upravená Curyšská třída,
p popisuje typ největší skvrny ve skupině (primárně zaměřeno na pneumbru) a c popisuje rozložení skvrn v rámci skupiny. Existuje 60 platných klasifikací. <br /><br />

<img alt="klasifikace" src="<?php echo htmlSpecialChars($basePath) ?>/images/klasifikace.jpg" />
<h3>Složka Z nabývá hodnot:</h3>
<ul>
<li>A – jedna malá unipolární skvrna, reprezentující buď formativní, nebo závěrečnou fázi vývoje</li>
<li>B – bipolární skupina slunečních skvrn bez jediné pneumbry</li>
<li>C – bipolární skupina slunečních skvrn, jedna skvrna musí mít pneumbru</li>
<li>D – bipolární skupina slunečních skvrn s penumbrou na obou koncích skupiny, podélný rozsah nepřesahuje 10 °</li>
<li>E – bipolární skupina slunečních skvrn s penumbrou na obou koncích skupiny, podélný rozsah přesahuje 10 °, ale nepřesahuje 15 °</li>
<li>F – podlouhlá bipolární skupina slunečních skvrn s penumbrou na obou koncích skupiny, podélný rozsah pneumbry přesahuje 15 °</li>
<li>H – unipolární skupina skvrn s pneumbrou
</ul>
<h3>Složka p nabývá hodnot:</h3>
<ul>
<li>x – žádná pneumbra (skupiny třída A nebo B)</li>
<li>r – pneumbra v zárodku, neúplná a nepravidelná</li>
<li>s – malá, symetrická pneumbra, průměr skvrny nepřesahuje 2,5 °</li>
<li>a – malá, asymetrická pneumbra, obsahuje alespoň dvě umbry, průměr skvrny nepřesahuje 2,5 °</li>
<li>h – velká, symetrická pneumbra, průměr skvrny přesahuje 2,5 °</li>
<li>k – velká, asymetrická pneumbra, obsahuje alespoň dvě umbry, průměr skvrny přesahuje 2,5 °</li>
</ul>
<h3>Složka c nabývá hodnot:</h3>
<ul>
<li>x – definováno pro unipolární skupiny (třídy A nebo H)</li>
<li>o – otevřená, v prostor mezi vedoucí a koncovou skvrnou se nachází málo skvrn nebo žádné skvrny</li>
<li>i – střední, v prostoru mezi vedoucí a koncovou skvrnou se nachází mnoho skvrn, ovšem žádná nemá významnou pneumbru</li>
<li>c – kompaktní, v prostoru mezi vedoucí a koncovou skvrnou se nachází mnoho skvrn s pneumbrami</li>
</ul>

</div>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>



<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 