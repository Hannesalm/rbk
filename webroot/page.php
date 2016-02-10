<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');

$get_page = new CContent();
$id = isset($_GET['p']);
if(isset($_GET['p'])){
    $params = array($id = $_GET['p']);
    $res = $get_page->getPage($params);
    $content = $res[0]->content;
}

// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Galleri";

$Orange['main'] = <<<EOD
<div class="link">
$content
</div>
<div class="link"><a href='add-content.php?p=$id'>Uppdatera</a></div>


EOD;




// Finally, leave it all to the rendering phase of Anax.
include(Orange_THEME_PATH);