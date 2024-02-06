<?php 

include 'Utils/Validation.php';

$fname = $uname = $email = "";
if (isset($_GET["fname"])) {
    $fname = $_GET["fname"];
}
if (isset($_GET["uname"])) {
    $uname = $_GET["uname"];
}
if (isset($_GET["email"])) {
    $email = $_GET["email"];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>

    <link rel="stylesheet" href="Assets/css/style.css">

</head>
<body>
    <div class="wrapper">
        <div class="form-holder">
            <h2>Criar nova conta</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?= Validation::clean($_GET['error']) ?></p>
            <?php }; ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?= Validation::clean($_GET['success']) ?></p>
            <?php }; ?>
            <form class="form" action="Action/signUp.action.php" method="POST">
                <div class="form-group">
                    <input type="text" name="fullName" placeholder="Nome completo" value="<?= $fname ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="userName" placeholder="Nome de usuário" value="<?= $uname ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" value="<?= $email ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="password" placeholder="Senha">
                </div>
                <div class="form-group">
                    <input type="text" name="confirmPassword" placeholder="Confirme sua senha">
                </div>
                <div class="form-group">
                    <button type="submit">Registrar</button>
                </div>
                <div class="form-group">
                    <p>Já possui uma conta?
                        <a href="login.php">Logar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>