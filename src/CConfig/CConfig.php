<?php

class CConfig {
    public static function getDatabaseOptions(){
        $dbOptions = array();

        if($_SERVER['SERVER_NAME'] == 'walm.no-ip.org') {
            define('DB_PASSWORD', 'Ppt8ue77'); // The database password
            define('DB_USER', 'root');
            $dbOptions['dsn']                 = 'mysql:host=127.0.0.1;dbname=rbk;';
            $dbOptions['username']            = DB_USER;
            $dbOptions['password']            = DB_PASSWORD;
            $dbOptions['driver_options']      = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
        }

        return $dbOptions;
    }
}