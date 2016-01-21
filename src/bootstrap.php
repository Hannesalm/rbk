<?php
/**
 * Bootstrapping functions, essential and needed for Orange to work together with some common helpers.
 *
 */

/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
    echo "Orange: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Autoloader for classes.
 *
 */
function myAutoloader($class) {
    $path = Orange_INSTALL_PATH . "/src/{$class}/{$class}.php";
    $path1 = Orange_INSTALL_PATH . "/src/CCalender/{$class}.php";

    if(is_file($path)) {
        include($path);
    }
    else if (is_file($path1)) {
        include($path1);
    }
    else {
        throw new Exception("Classfile '{$class}' does not exists.");
    }
}
function dump($array){
    echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}
spl_autoload_register('myAutoloader');