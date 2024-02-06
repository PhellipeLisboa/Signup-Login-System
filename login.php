<?php 

include 'Utils/Validation.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logar</title>

    <link rel="stylesheet" href="Assets/css/style.css">

</head>
<body>
    <div class="wrapper">
        <div class="form-holder">
            <h2>Logar</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?= Validation::clean($_GET['error']) ?></p>
            <?php }; ?>
            <form class="form" action="Action/login.action.php" method="POST">
                <div class="form-group">
                    <input type="text" name="userName" placeholder="Nome de usuário">
                </div>
                <div class="form-group">
                    <input type="text" name="password" placeholder="Senha">
                </div>
                <div class="form-group">
                    <button type="submit">Logar</button>
                </div>
                <div class="form-group">
                    <p>Ainda não possui uma conta?
                        <a href="signUp.php">Cadastrar</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>