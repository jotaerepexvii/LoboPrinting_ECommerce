<?php

function errorLogin($email, $pass)
{

}

function verificarLogin($user)
{
    if($user == '1')
    {
        return;
    }
    else
    {
        header('location: login.php');	
    }
}

?>