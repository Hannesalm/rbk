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

$dropmenu = array(
    // Use for styling the menu
    'class' => 'menu-wrap',

    // Here comes the menu strcture
    'items' => array(
        // This is a menu item
        'home'  => array(
            'text'  =>'HEM',
            'url'   =>'index.php',
        ),

        // This is a menu item
        'test'  => array(
            'text'  =>'KLUBBEN',
            'url'   =>'#',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => array(

                'items' => array(
                    // This is a menu item of the submenu
                    'item 1'  => array(
                        'text'  => 'Bli medlem',
                        'url'   => 'medlem.php?p=klubben',
                    ),
                    'item 2'  => array(
                        'text'  => 'Styrelse',
                        'url'   => '#',
                    ),
                    'item 3'  => array(
                        'text'  => 'Information',
                        'url'   => '#',
                    ),
                    'item 4'  => array(
                        'text'  => 'Kurser',
                        'url'   => '#',
                    ),
                    'item 5'  => array(
                        'text'  => 'Hitta oss',
                        'url'   => '#',
                    ),
                ),
            ),
        ),

        // This is a menu item
        'about' => array(
            'text'  =>'About',
            'url'   =>'about.php',
        ),
    ),

    // This is the callback tracing the current selected menu item base on scriptname
    'callback' => function($url) {
        if(basename($_SERVER['SCRIPT_FILENAME']) == $url) {
            return true;
        }
    }
);

$Orange['header'] = <<<EOD
<meta name="viewport" content="width=device-width">
<img class='sitelogo' src='img/logotransparent.png' alt='Logo'/>
<span class='sitetitle'>Rödeby Brukshundsklubb</span>
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

$Orange['stylesheets'] = array('css/new-style.css', 'css/slideshow.css');
$Orange['favicon']    = 'img/logo.jpg';