<?php

namespace app\engine;


class Session 
{
    protected $session;

    public function __construct()
    {
        $this->session = session_id(); 
    }

    
    public function getSession()
    {
        return $this->session;
    }

    public function newSession($newSessionID = null)
    {
        session_id($newSessionID);
        return session_start();
    }

    public function destroySession()
    {
        setcookie("PHPSESSID", null, time() - 1, '/');
        return session_destroy();
    }

    public function setCookie($name, $value, $time, $path)
    {
        return setcookie($name, $value, $time, $path);
    }

}