<?php

 
include("init.php");


if (isset($_POST['username']))
{
    $SK->Template->setData('input_user', $_POST['username']);
    $SK->Template->setData('input_pass', $_POST['password']);

    if ($_POST['username'] == '' || $_POST['password'] == '')
    {
        $SK->Template->setAlert('Uzupełnij wymagane pola', 'error');
        echo '<script>$.colorbox.resize();</script>';
        //Load form to validate
        $SK->Template->load(APP_PATH . "core/views/v_login.php");

    }
    else if($SK->Auth->validateLogin($SK->Template->getData('input_user'), $SK->Template->getData('input_pass')) == FALSE)
    {
        $SK->Template->setAlert('Nieprawidłowy login lub hasło', 'error');
        echo '<script>$.colorbox.resize();</script>';
        //Load form to validate
        $SK->Template->load(APP_PATH . "core/views/v_login.php");
        
       
    }
    else
    {
        $_SESSION['username'] = $SK->Template->getData('input_user');
        $_SESSION['loggedIn'] = TRUE;
        $SK->Template->setAlert('Witaj ' . $SK->Template->getData('input_user'));
        $SK->Template->load(APP_PATH . "core/views/v_logginingin.php");
        
    }
}
else
{
    $SK->Template->load(APP_PATH . "core/views/v_login.php");
   
}



/*
$Template = new Template();

$Template->setAlertTypes(array('success', 'warring', 'error'));
$Template->setAlert('Komunikacik', 'success');
$Template->setData('nazwa', 'jakis tekst');
$Template->load("views/v_login.php");
*/