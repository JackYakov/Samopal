<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 18.07.2017
 * Time: 16:46
 */
class Users {
    static private $LogIn = '';

    function SetSession (){
        if (isset( $_SESSION['logIn'])) {
            Users::$LogIn = $_SESSION['logIn'];
           return Users::$LogIn;
        } else {
            return Users::$LogIn;
        }
    }
    function LogIn (string $name, string $flag){
        $_SESSION['logIn'] = true;
        Users::$LogIn = true;
        $_SESSION['name'] = $name;
        $_SESSION['flag'] = $flag;
    }
    function getName(){
        if(isset($_SESSION['name'])) return $_SESSION['name'];
        else return '';
    }
    function getFlag(){
        if (isset($_SESSION['flag'])) return $_SESSION['flag'];
        else return '';
    }
}