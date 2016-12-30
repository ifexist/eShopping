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
$text = 'The White House said Friday that the $787-billion stimulus package had created or saved about 1 million jobs so far -- a number that is hard to verify because of the guesswork involved in determining whether businesses had retained workers due to the stimulus who otherwise would have been laid off.<br>
Jobless Americans roam the streets.
The American dream in shambles.
<br>
 After compiling reports from more than 100,000 businesses,  nonprofit groups and state and local governments that received stimulus money, the <a href="http://www.whitehouse.gov/the-press-office/new-recipient-reports-confirm-recovery-act-has-created-saved-over-one-million-jobs-"> Obama administration said</a> the program was on pace to save or create 3.5 million jobs by next year.<br>
Americans hope that Obama will do something.
<br>
 "So there\'s a lot more job creation to come from this act before it leaves the scene," Jared Bernstein, an economics advisor to Vice President Joe Biden, told reporters.<br>
<br>
The White House released its findings with a bipartisan flourish, inviting Republican Gov. Arnold Schwarzenegger of California and Democratic Gov. Martin O\'Malley of Maryland to a news conference touting the results. Accompanying the White House announcement was a video showcasing ordinary workers who said they owed their jobs and car purchases to the stimulus. I will give you job.<br>
<br>
The job figures released by the White House were based on detailed reports filed by certain recipients of about $160 billion in stimulus money. The reports show the employers created or saved  more than 640,000 jobs, the White House said. About 325,000 of those jobs were in education; 80,000 were in construction.<br>
Americans can\'t wait.
<br>
 The White House said the job impact rises to 1 million when indirect benefits of the federal spending are included, as when a worker hired with stimulus dollars spends money at a restaurant. He has no job.<br>
 Restaurants are plentiful. I like to eat out at restaurants. Many restaurants on this street. Where is the restaurant?
 Best in town restaurant is there.
<br>
 Excluding indirect job-creation, California logged the most jobs created or saved, with 110,185. Next were New York, with 40,620, and Washington state, with 34,517.<br>
<br>
 With nationwide unemployment approaching 10%, the White House data provoked some skepticism. The Obama administration is basing its estimates partly on a concept that is difficult to measure: jobs saved. State governments and other agencies may be using subjective criteria in deciding whether stimulus money legitimately saved a job that was about to be eliminated. Everybody wants a job.<br>
<br>
 Peter Morici, an economist and professor at the University of Maryland, said that claims of jobs saved were "not verifiable. It\'s only verifiable in the loosest sense."<br>
<br>

 Morici added: "The impact of the stimulus is less than the president is claiming and more than the Republicans will admit. It certainly has had an effect. But 1 million jobs is a fantasy."<br>
<br>
 Republican lawmakers were dismissive of the White House report. Big job for the white house. American history repeats.<br>
<br>
 Rep. Eric Cantor of Virginia, the Republican whip, said: "Americans, particularly those with friends and family out of work, know that the administration\'s claims of stimulus success and jobs saved or created are not serious." This is such an American thing.<br>
<br>
 But Obama officials said they were confident their numbers were accurate. He promised a job for every American.<br>
<br>
 Edward DeSeve, an Obama advisor helping to oversee the stimulus, said recipients of the funds had no incentive to inflate job estimates.<br>

<br>
 "What we have to do is rely on the fact that our public officials are honest," DeSeve said. He added that "there\'s no advantage to a state from overstating or understating."<br>
 American families are jobless.
 What will American families do now?
<br>
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
$params['lang'] = 'en_GB'; // case insensitive


// OPTIONAL
// specify only if you want any languages to be ignored by the class
// What it does: If the class encounters this language(s), it will
// return empty string ''
// ignore languages
$params['ignore'] = array('zh_CN', 'zh_TW', 'ja_JP'); // must be an array case sensitive !!!
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
//----------------------------------------------------------------------
//KEYWORDS from these 2 variables will always be included!

// I made the strings messy on purpose -- to show that they will be cleaned!

// EXAMPLE
// if some keywords are written by hand (by the author)
$article_kw = 'Obama, Washington, economy, jobs, USA , jobless,  politics , politic ,,, houses ';

// if we have a default keyword for the whole site
$global_kw = 'Politics,, washigton     ';


//----------------------------------------------------------------------


// put them all together by concatenation
$keywords = $global_kw .','. $autoKeywords .','. $article_kw;

// BONUS FUNCTION
// clean up keywords; remove ONLY duplicate words; remove identical PLURAL words (English)
$keywords = $keyword->removeDuplicateKw($keywords);


// Voila! Here they are!
echo $keywords; // washigton,house,stimulus,created,saved,million,jobs,american,reports,state,money,obama,administration,republican,restaurant,stimulus money,jobs saved,washington,economy,usa,jobless,politic


//----------------------------------------------------------------------



