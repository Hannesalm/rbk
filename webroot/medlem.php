<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Medlem";

$Orange['main'] = <<<EOD
<h1></h1>
<fieldset>
<legend>Intresseanmälan för medlemskap</legend>
<div class="medlems-text">
<p>
<h2>Detta får du som medlem i Rödeby BK </h2>

<div>
  <ol class="simple-list">
    <li>Delta i klubbens kurser och övriga aktiviteter</li>
    <li>Tidningen från SBK "Brukshunden" i din brevlåda</li>
    <li>Försäkrad på klubbens aktiviteter</li>
    <li>Träna på alla på alla planer.</li>
    <li>Träna med belysning på kvällstid.</li>
    <li>Tränar du ofta kan du få nyckel till stugan mot att du hamnar på Städlistan.Styelsen beslutar.</li>
    <li>Delta och rösta på Medlemsmöten.</li>
    <li>Rabatt på Djurkompaniet i Karlskrona, mot uppvisande av medlemskort.</li>
</ol>
</div>
</div>
<div class="form">
<form method="post" action="index.php">
   <p><label>Namn:<br/><input type='text' name='newsTitle' placeholder="Namn...."></label></p>
   <p><label>E-post:<br/><input type='text' name='url' placeholder="E-post...."></label></p>
   <p><label>Meddelande:<br/><textarea name='meddelande' placeholder="Meddelande...."></textarea></label></p>
    <div class="add"><input type='submit' name='submit' value='Skicka'/></div>

</form>
</div>
</fieldset>
EOD;




// Finally, leave it all to the rendering phase of Anax.
include(Orange_THEME_PATH);