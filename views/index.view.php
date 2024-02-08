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

<div class="wrapper">
<div class="form-holder">
    <h2>Bem vindo, <?= $user_data['full_name']?>!</h2>
    <h4>Email: <?= $user_data['user_email']?></h4>
    <h4>Username: <?= $user_data['user_name']?></h4>
    <form class="form" action="../logout.php" method="GET">
        <div class="form-group">
            <button type="submit">Deslogar</button>
        </div>
    </form>
</div>  

<?php require('partials/footer.php'); ?>

<?php 
    } else {
        $errorMessage = "Logue primeiro!";
        Util::redirect('login.php', 'error', $errorMessage);
    };
?>