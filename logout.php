<?php 

session_start();
include 'Utils/Util.php';
session_unset();
session_destroy();

$errorMessage = "Deslogado!";
Util::redirect('Controller/login.php', 'error', $errorMessage);