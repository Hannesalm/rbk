<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Startsida";

$Orange['main'] = <<<EOD
<h1>Redovisning</h1>
<h2>Kmom01</h2>
<h3>Vilken utvecklingsmiljö använder du?</h3>
<p>Jag har installerat den utevklingsmiljö som va rekommenderad i den förra kursen. Jag har dock bytt ut bla Atom mot phpstorm, vilket jag tycker funkar kanon
   Jag har även en raspberry PI som jag använde som webserver vilket gör min lösning oberoende vilken dator jag sitter på. Jag har även börjat anvada Git</p>
<h3>Berätta hur det gick att jobba igenom guiden “20 steg för att komma igång PHP”, var något nytt eller kan du det?</h3>
<p>Jag gjorde inte mycket i den. Kände att jag ville komma igång med kmom01 momentet direkt. Jag är mer learning by doing, och då vill jag göra
   kursmomentet direkt. Tutorialfilmer är mer min melodi. Lär mig mycket på genomgångar mer än att läsa själv.</p>
<h3>Vad döpte du din webbmall Anax till?</h3>
<p>jag döpte min webmal till Orange. Mest för att jag gillar Apelsiner</p>
<h3>Vad anser du om strukturen i Anax, gjorde du några egna förbättringar eller något du hoppade över?</h3>
<p>Jag gillar strukturen. Men det är väldigt nytt så gjorde inga förändringar utan körde på samma. Vill lära mig denna innan jag ger mig på förändringar känner jag. Att jobba med klasser i php är ändå nått nytt för mig
    så att sätta mig och ändra i koden va långt bort. Tittar på koden och försöker lära mig tänket.</p>
<h3>Gick det bra att inkludera source.php? Gjorde du det som en modul i ditt Anax?</h3>
<p>Jag gjorde det som en modul. Tyckte det gick bra och va inga större problem att implementera.</p>
<h3>Gjorde du extrauppgiften med GitHub?</h3>
<p>Jag har inte lagt upp det på Git än. Håller fortfarande på att lära mig det men har för avsikt att göra det inom en snart framtid!</p>
EOD;




// Finally, leave it all to the rendering phase of Anax.
include(Orange_THEME_PATH);