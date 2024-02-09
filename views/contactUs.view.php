<?php 

session_start();

include '../Utils/Util.php';

if (isset($_SESSION['user_name']) && ($_SESSION['user_id'])) {

    include '../Controller/User.php';
    $user->init($_SESSION['user_id']);
    $user_data = $user->getUser();

?>

<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>


<!-- page -->

<div class="wrapper">
<div class="form-contact">
    <h2>Envie uma mensagem!</h2>
    <form class="form" action="../Action/contactUs.action.php" method="POST">

        <label for="userId">
            <div class="form-group">
                <input type="hidden" name="userId" value="<?= $user_data['user_id'] ?>">
            </div>
        </label>
        <label for="fullName">
            <div class="form-group">
                <input type="text" name="fullName" placeholder="Nome completo"  value="<?= $user_data['full_name'] ?>">
            </div>
        </label>
        <label for="userName">
            <div class="form-group">
                <input type="text" name="userName" placeholder="Nome de usuário" value="<?= $user_data['user_name'] ?>">
            </div>
        </label>
        <label for="email">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" value="<?= $user_data['user_email'] ?>">
            </div>
        </label>
        <label for="tel">
            <div class="form-group">
                <input type="tel" name="tel" placeholder="Telefone">
            </div>
        </label>
        <label for="message">
            <div class="form-group">
                <textarea name="message" id="contact-message" cols="91" rows="15" placeholder="Digite sua mensagem"></textarea>
            </div>
        </label>

        <div class="form-group">
            <button type="submit">Enviar</button>
        </div>
    </form>
</div> 

<?php require('partials/footer.php') ?>

<?php 
    } else {
        $errorMessage = "Logue primeiro!";
        Util::redirect('login.php', 'error', $errorMessage);
    };
?>