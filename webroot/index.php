<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');

// Define what to include to make the plugin to work
$Orange['stylesheets'][]        = 'css/slideshow.css';
$Orange['javascript_include'][] = 'js/slideshow.js';

// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Startsida";


$calender = new CCalendar();
$calender->getValues();
$calender->generateCalenderData();
$output = $calender->printMiniCalendar();

$content = new CContent();
$res = $content->getBlogContentForFirstPage();
$blog_posts = $content->drawBlogPosts($res);

$news = $content->getNews();
$printNews = $content->drawNews($news);

$slide = <<<EOD
<div id="slideshow" class='slideshow' data-host="" data-path="img/dogs/" data-images='["1.jpg", "2.jpg", "5.jpg", "6.jpg"]'>
<img src='img/dogs/6.jpg' width='962px' height='400px' alt='Me'/>
</div>
EOD;

$Orange['main'] = <<<EOD
$slide
<div>
<div class="nyheter">
<div class="rubrik"><p class="undertext">Nyheter</div>
$printNews
</div>

<div class="blogg-start">
<div class="rubrik"><p class="undertext">Senaste blogginlägg</div>

$blog_posts

</div>

<aside class="aside">
<div class="rubrik"><p class="undertext">Kalender</div>
$output
</aside>
</div>



EOD;
//dump($_GET);




// Finally, leave it all to the rendering phase of Anax.
include(Orange_THEME_PATH);