<?php

/**
 *
 * Multibyte Keyword Generator
 * Copyright (c) 2009-2012, Peter Kahl. All rights reserved. www.colossalmind.com
 * Use of this source code is governed by a GNU General Public License
 * that can be found in the LICENSE file.
 *
 * https://github.com/peterkahl/multibyte-keyword-generator
 *
 */

// for debugging
ini_set('display_errors',1);


// the example text
$text = '<!-- začátek stredniho sloupce -->
<table border="0" cellpadding="10" cellspacing="0" width="570"><tr><td><div class="main">
<p align="center"><big>Český rozhlas šetří a odkládá digitální vysílání</big></p>
<p>PRAHA - Nový generální ředitel Českého rozhlasu (ČRo) Richard Medek chce na testování celoplošného digitálního vysílání ušetřit v příštích šesti letech zhruba 340 milionů korun.</p>

<p>Start digitálního vysílání v systému T- DAB chce pozdržet a peníze věnovat například na vybudování stanice mluveného slova.</p>
<p>Ředitel plánuje také snížit počet zaměstnanců zhruba o desetinu a zjednodušit organizační strukturu. Odmítá rušení koncesionářských poplatků.  Strategii vysílání v systému T-DAB neopouštíme, ale vzhledem k finanční situaci ČRo se musíme důkladně rozmýšlet, do jakých oblastí investujeme. Vnímáme zároveň, že spuštění digitálního rozhlasového vysílání v systému T-DAB je v podmínkách ČR zatím v nedohlednu,  uvedl Medek.</p>
<p>Pro Český rozhlas je teď podle něj významná například nová stanice. Nejen zahraniční zkušenosti mě vedou k názoru, že by v rodině stanic Českého rozhlasu měla existovat 24 hodin vysílající stanice mluveného slova. Nechci ale vznik této stanice uspěchat, je nejprve nutné vytvořit vhodné legislativní podhoubí,  uvedl Medek.</p>
<p>Vznik této stanice závisí na změně mediálního zákona. Tato změna by umožnila ČRo analogové vysílání další stanice s pokrytím 40 procent obyvatel ČR. Na tomtéž je závislé rovněž Rádio Wave. Medek nechce předjímat, jak uvedená legislativní iniciativa dopadne.</p>
<p>Bude-li přijata, pak se samozřejmě budeme ve vedení rozhlasu zamýšlet, jak takto rozšířený prostor pro naši kmitočtovou flexibilitu využijeme a jakou koncepci předložíme. Variant je víc. A Radio Wave je určitě jednou z nich,  uvedl ředitel.</p>
<p>Medek už Radě Českého rozhlasu předložil nové organizační schéma. Jeho základním principem je zjednodušení organizačních a řídících mechanismů a snížení počtu ředitelských pozic. Podle Medka by se měl v jeho funkčním období snížit počet zaměstnanců ČRo zhruba o 150 lidí, tedy o desetinu. V dubnu 2010 ČRo zruší post zahraničního zpravodaje na Balkáně.</p>
<p>Redukce personálu se má dotknout i manažerských pozic. Návrh počítá se zrušením pozic ředitelů celoplošných a speciálních (digitálních) stanic ČRo. Zrušení zdvojených funkcí, kdy na stanicích vedle šéfredaktora existoval ředitel stanice. Tyto stanice budou přesunuty do přímé podřízenosti programového ředitele. Výjimku tvoří pozice ředitele zpravodajských stanic, pod nějž spadají Radiožurnál a Rádio Česko, zpravodajský web a zahraniční zpravodajové.</p>
<p>Medek by rád navýšil koncesionářské poplatky, i když připouští, že v dnešní době je to nereálné. Právě poplatky se budou zabývat senátoři, senátor ODS Richard Svoboda navrhuje jejich zrušení a náhradu ze státního rozpočtu. V případě ČRo by šlo asi o dvě miliardy Kč.</p>
<p>Medek s návrhem nesouhlasí.  Jsem přesvědčen, že navrhovaná změna způsobu financování veřejnoprávních médií by zásadně ohrozila princip jejich nezávislosti,  uvedl. Rozhlas se podle něj snaží snižovat náklady na výběr poplatků. Ročně je to 126 milionů Kč, z toho 116 milionů posílá ČRo České poště. FOTO - internet</p>

<p align="right" class="podpis">29. října 2009, redakční zpráva</p>

';

//----------------------------------------------------------------------
// REQUIRED
// specify valid location of the class
include (dirname(__FILE__) .'/class.colossal-mind-mb-keyword-generator.php');


// REQUIRED
// load the text, either from database or a file
// text MAY contain HTML tags
$params['content'] = $text;


// OPTIONAL, but VERY IMPORTANT
// if not defined, will default to UTF-8
$params['encoding'] = 'utf-8'; // case insensitive


// this one is used so that this example is properly displayed in browser
// the encoding should be same as the value above
header('Content-type: text/html; charset=utf-8');


// OPTIONAL
// define the language of the text
// if not defined, will default to English (en_GB)
$params['lang'] = 'cs_CZ'; // case insensitive


// OPTIONAL
// specify only if you want any languages to be ignored by the class
// What it does: If the class encounters this language(s), it will
// return empty string ''
// ignore languages
$params['ignore'] = array('zh_CN', 'zh_TW', 'ja_JP'); // must be an array; case sensitive !!!
//----------------------------------------------------------------------
//OPTIONAL, but VERY IMPORTANT
// if not defined, will default to values set in the class

// 1-word keywords
$params['min_word_length'] = 4;  // min length of single words
$params['min_word_occur']  = 3;  // min occur of single words

// 2-word keyphrases
$params['min_2words_length']        = 4;  // min length of words for 2 word phrases; value 0 will DISABLE !!!
$params['min_2words_phrase_length'] = 10; // min length of 2 word phrases
$params['min_2words_phrase_occur']  = 3;  // min occur of 2 words phrase

// 3-word keyphrases
$params['min_3words_length']        = 4;  // min length of words for 3 word phrases; value 0 will DISABLE !!!
$params['min_3words_phrase_length'] = 12; // min length of 3 word phrases
$params['min_3words_phrase_occur']  = 2;  // min occur of 3 words phrase
//----------------------------------------------------------------------
//REQUIRED
$keyword = new colossal_mind_mb_keyword_gen($params);

// REQUIRED
$autoKeywords = $keyword->get_keywords();

echo $autoKeywords; // rozhlas,vysílání,ředitel,českého,rozhlasu,medek,digitálního,milionů,systému,stanice,uvedl,stanic,pozic,vysílání systému,stanice mluveného slova,snížit počet zaměstnanců


//----------------------------------------------------------------------



