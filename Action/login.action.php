<?php

session_start();

include '../Utils/Validation.php';
include '../Utils/Util.php';
include '../Core/Database.php';
include '../Models/User.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $userName = Validation::clean($_POST["userName"]);
    $password = Validation::clean($_POST["password"]);

    if (!Validation::userName($userName)) {

        $errorMessage = "Nome de usuário inválido!";
        Util::redirect('../Controller/login.php', 'error', $errorMessage);

    } else if (!Validation::password($password)) {

        $errorMessage = "Senha inválida!";
        Util::redirect('../Controller/login.php', 'error', $errorMessage);

    } else {

        $db = new Database();
        $conn = $db->connect();
        $user = new User($conn);
        $auth = $user->auth($userName, $password);

        if ($auth) {
            $user_data = $user->getUser();
            $_SESSION['user_name'] = $user_data["user_name"];
            $_SESSION['user_id'] = $user_data["user_id"];
            $successMessage = "Logado!";
            Util::redirect('../Controller/index.php', 'success', $successMessage);
        } else {
            $errorMessage = "Nome de usuário ou senha incorretos!";
            Util::redirect('../Controller/login.php', 'error', $errorMessage);
        }
    }

    //echo $fullName, $userName, $email, $password, $confirmPassword;
} else {
    $errorMessage = "Ocorreu um erro!";
    Util::redirect('../Controller/login.php', 'error', $errorMessage);
}
