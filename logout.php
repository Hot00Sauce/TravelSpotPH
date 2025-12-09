<?php

session_start();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
    $_SESSION['success_message'] = "You have been successfully logged out.";
}

header("Location: login.php");
die;