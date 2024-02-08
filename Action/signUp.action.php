<?php

// senha: Teste,12

include '../Utils/Validation.php';
include '../Utils/Util.php';
include '../Core/Database.php';
include '../Models/User.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullName = Validation::clean($_POST["fullName"]);
    $userName = Validation::clean($_POST["userName"]);
    $email = Validation::clean($_POST["email"]);
    $password = Validation::clean($_POST["password"]);
    $confirmPassword = Validation::clean($_POST["confirmPassword"]);

    $data = "fname=".$fullName."&uname=".$userName."&email=".$email;

    if (!Validation::name($fullName)) {

        $errorMessage = "Nome completo inválido! Preencha o nome completo apenas com letras.";
        Util::redirect('../Controller/signUp.php', 'error', $errorMessage, $data);

    } else if (!Validation::userName($userName)) {

        $errorMessage = "Nome de usuário inválido! 1 - Preencha apenas com letras e números. 2 - Deve conter 6-8 caracteres. 3 - Deve começar com uma letra.";
        Util::redirect('../Controller/signUp.php', 'error', $errorMessage, $data);

    } else if (!Validation::email($email)) {

        $errorMessage = "Endereço de email inválido!";
        Util::redirect('../Controller/signUp.php', 'error', $errorMessage, $data);

    } else if (!Validation::password($password)) {

        $errorMessage = "Senha inválida! 1 - Mínimo de 4 caracteres. 2 - Ao menos uma letra maiúscula e uma minúscula. 3 - Pelo menos um algarismo. 4 - Pelo menos um caractere especial.";
        Util::redirect('../Controller/signUp.php', 'error', $errorMessage, $data);

    } else if (!Validation::match($password, $confirmPassword)) {

        $errorMessage = "Senha e confirmação de senha não são iguais";
        Util::redirect('../Controller/signUp.php', 'error', $errorMessage, $data);

    } else {
        $db = new Database();
        $conn = $db->connect();
        $user = new User($conn);
        if ($user->is_username_unique($userName)) {

            // password hash;
            $password = password_hash($password, PASSWORD_DEFAULT);
            $user_data = [$userName, $password, $fullName, $email];
            $res = $user->insert($user_data);
            if ($res) {
                $successMessage = "Usuário registrado com sucesso!";
                Util::redirect('../Controller/signUp.php', 'success', $successMessage);
            } else {
                $errorMessage = "Ocorreu um erro!";
                Util::redirect('../Controller/signUp.php', 'error', $errorMessage, $data);
            }

        } else {
            $errorMessage = "O nome de usuário ($userName) já existe!";
            Util::redirect('../Controller/signUp.php', 'error', $errorMessage, $data);
        }
    }

    //echo $fullName, $userName, $email, $password, $confirmPassword;
} else {
    $errorMessage = "Ocorreu um erro!";
    Util::redirect('../Controller/signUp.php', 'error', $errorMessage);
}