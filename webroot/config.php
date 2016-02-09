<?php
/**
 * Config-file for Orange. Change settings here to affect installation.
 *
 */

/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly


/**
 * Define Orange paths.
 *
 */
define('Orange_INSTALL_PATH', __DIR__ . '/..');
define('Orange_THEME_PATH', Orange_INSTALL_PATH . '/theme/render.php');


/**
 * Include bootstrapping functions.
 *
 */
include(Orange_INSTALL_PATH . '/src/bootstrap.php');
include "./../src/cNavigation.php";


/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();


/**
 * Create the Orange variable.
 *
 */
$Orange = array();
$Orange['lang']         = 'sv';
$Orange['title_append'] = ' | Rödeby BK';
$Orange['modernizr'] = 'js/modernizr.js';
$Orange['jquery'] = '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js';
$Orange['google_analytics'] = 'UA-22093351-1'; // Set to null to disable google analytics

$menu = array(
    'index'  => array('text'=>'Hem',  'url'=>'index.php?p=index'),
    'kurser'  => array('text'=>'Kurser',  'url'=>'kurser.php?p=kurser'),
    'medlem' => array('text'=>'Medlem', 'url'=>'medlem.php?p=medlem'),
);

$Orange['header'] = <<<EOD
<meta name="viewport" content="width=device-width">
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image",
    toolbar2: "print preview | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

<img class='sitelogo' src='img/logotransparent.png' alt='Logo'/>
<span class='sitetitle'>Rödeby Brukshundklubb</span>
<span class='siteslogan'>Välkommen till Rödeby BK</span>

EOD;

$Orange['footer'] = <<<EOD
<span class='sitefooter'>
Copyright (c) Rödeby BK |
Sofielund, Rödeby  Telnr: 0729642674 |
BG 505-9993 |
webmaster@rodebybrukshundklubb.se
</span>
EOD;

//$Orange['navbar'] = cNavigation::get_navbar($dropmenu);
$Orange['navbar'] = cNavigation::getMenu();

//dump($_GET);

/**
 * Theme related settings.
 *
 */

$Orange['stylesheets'] = array('css/style.css', 'css/slideshow.css');
$Orange['favicon']    = 'img/logo.jpg';