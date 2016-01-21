<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $orange variable with its defaults.
include(__DIR__.'/config.php');


// Do it and store it all in variables in the Anax container.
$orange['title'] = "404";
$orange['header'] = "";
$orange['main'] = "This is a Anax 404. Document is not here.";
$orange['footer'] = "";

// Send the 404 header
header("HTTP/1.0 404 Not Found");


// Finally, leave it all to the rendering phase of Anax.
include(Orange_THEME_PATH);