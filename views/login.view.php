<?php 

include '../Utils/Validation.php';

?>

<?php require('partials/head.php'); ?>

<div class="wrapper">
<div class="form-holder">
    <h2>Logar</h2>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?= Validation::clean($_GET['error']) ?></p>
    <?php }; ?>
    <form class="form" action="../Action/login.action.php" method="POST">
        <div class="form-group">
            <input type="text" name="userName" placeholder="Nome de usuário">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Senha">
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

<?php require('partials/footer.php'); ?>