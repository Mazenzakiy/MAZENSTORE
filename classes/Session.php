<?php
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes;

// now we need to make class called Session has functions which deal with data in SUPER GLOBAL SESSION (($_SESSION))
class Session
{
    ////// in this function we need this senario (when make object from class Session ,session start direct) 
    ////// we must use <<_construct()>> // magic function it is calle it,s self automatic 
    /////  i cann use it in several ways ex. some properity i need them essentially
    public function __construct()
    {
        // now we need to ensure that session starts just one 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // In this function we set key and value 
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    // In this function we get value of session
    public function get($key)
    {
        return $_SESSION[$key];
    }

    // In this function we ensure if session key exist or not 
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    // In this function we remove session key 
    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    // In this function we destroy Session
    public function destroy()
    {
        // from careness we should empty super global before destroing
        $_SESSION = [];
        session_destroy();
    }
}

