<?php

class Auth
{
    private $salt = 'e3FGde4';

    function __construct()
    {

    }

    function validateLogin($user, $pass)
    {
        global $SK;

        if ($stmt = $SK->Database->prepare("SELECT * FROM users WHERE username = ? AND password = ?"))
        {
            $userPass = md5($pass . $this->salt);
            $stmt->bind_param("ss", $user, $userPass);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0)
            {
                $stmt->close();
                return TRUE;
            }
            else
            {
                $stmt->close();
                return FALSE;
            }
        }
        else
        {
            die();
        }
    }

    //check if user is logged in
    function checkloginStatus()
    {
        if (isset($_SESSION['loggedIn']))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function checkAuthorization()
    {
        global $SK;
        if ($this->checkloginStatus() == FALSE)
        {
            $SK->Template->error('unathorized');
            exit;
        }

    }
    //function loggout user
    function logout()
    {
        session_destroy();
        session_start();
    }
}