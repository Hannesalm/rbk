<?php

class CUser extends CDatabase{


    public function __construct() {
        parent::__construct();
    }

    public function setSessionVariablesAtLogin($res){
        $user = $res[0];
        $_SESSION['loggedIn'] = 1;
        $_SESSION['userID'] = $user->id;
        $_SESSION['userName'] = $user->name;
        $_SESSION['username'] = $user->username;
    }
    public function login($user, $password){
        $params = array($user, $password);
        $res = $this->ExecuteSelectQueryAndFetchAll("SELECT * FROM users WHERE username = ? AND password = md5(concat(?, salt));", $params);
        return $res;
    }
    public static function logOut(){
        session_destroy();
    }
    public static function isAuthenticated(){
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1){
            return true;
        }
        return false;
    }
    public static function getUsername(){
        return $_SESSION['username'];
    }
    public static function getName(){
        return $_SESSION['userName'];
    }

    public function addUser($username, $name, $password){
        $params = array($username, $name);
        $this->ExecuteQuery("INSERT INTO users (acronym, name, salt) VALUES(?, ?, unix_timestamp());", $params);

        $userparams = array($password, $username);
        $this->ExecuteQuery("UPDATE users SET password = md5(concat(? , salt)) WHERE acronym = ?;", $userparams);
    }

    public function getWinns(){

        return $this->ExecuteSelectQueryAndFetchAll("SELECT * FROM user ORDER BY winns DESC LIMIT 5");
    }
}