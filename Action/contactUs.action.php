<?php

// senha: Teste,12

include '../Utils/Validation.php';
include '../Utils/Util.php';
include '../Core/Database.php';
include '../Models/User.php';
include '../Models/ContactUsMessage.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userId = $_POST["userId"];
    $fullName = Validation::clean($_POST["fullName"]);
    $userName = Validation::clean($_POST["userName"]);
    $email = Validation::clean($_POST["email"]);
    $tel = Validation::clean($_POST["tel"]);
    $messageText = Validation::clean($_POST["message"]);

    $data = "fname=".$fullName."&uname=".$userName."&email=".$email."&tel=".$tel."&message=".$message;

    if (!Validation::name($fullName)) {

        $errorMessage = "Nome completo inválido! Preencha o nome completo apenas com letras.";
        Util::redirect('../Controller/contactUs.php', 'error', $errorMessage, $data);

    } else if (!Validation::userName($userName)) {

        $errorMessage = "Nome de usuário inválido! 1 - Preencha apenas com letras e números. 2 - Deve conter 6-8 caracteres. 3 - Deve começar com uma letra.";
        Util::redirect('../Controller/contactUs.php', 'error', $errorMessage, $data);

    } else if (!Validation::email($email)) {

        $errorMessage = "Endereço de email inválido!";
        Util::redirect('../Controller/contactUs.php', 'error', $errorMessage, $data);

    } else if (!Validation::tel($tel)) {

        $errorMessage = "Número de telefone inválido!";
        Util::redirect('../Controller/contactUs.php', 'error', $errorMessage, $data);

    } else {
        $db = new Database();
        $conn = $db->connect();
        $message = new Message($conn);

        $message_data = [$userName, $userId, $email, $fullName, $tel, $messageText];
        $res = $message->insert($message_data);
        if ($res) {
            $successMessage = "Mensagem registrada com sucesso!";
            Util::redirect('../Controller/contactUs.php', 'success', $successMessage);
        } else {
            $errorMessage = "Ocorreu um erro!";
            Util::redirect('../Controller/contactUs.php', 'error', $errorMessage, $data);
        }

    }

} else {
    $errorMessage = "Ocorreu um erro!";
    Util::redirect('../Controller/contactUs.php', 'error', $errorMessage);
}