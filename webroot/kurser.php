<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Kurser";

$Orange['main'] = <<<EOD
<h1>Kurser</h1>

EOD;




// Finally, leave it all to the rendering phase of Anax.
include(Orange_THEME_PATH);