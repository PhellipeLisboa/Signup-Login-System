<?php 

session_start();

include 'Utils/Util.php';

if (isset($_SESSION['user_name']) && ($_SESSION['user_id'])) {

    include 'Controller/User.php';
    $user->init($_SESSION['user_id']);
    $user_data = $user->getUser();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>
<div class="wrapper">
        <div class="form-holder">
            <h2>Bem vindo, <?= $user_data['full_name']?>!</h2>
            <h4>Email: <?= $user_data['user_email']?></h4>
            <h4>Username: <?= $user_data['user_name']?></h4>
            <form class="form" action="logout.php" method="GET">
                <div class="form-group">
                    <button type="submit">Deslogar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php 
    } else {
        $errorMessage = "Logue primeiro!";
        Util::redirect('login.php', 'error', $errorMessage);
    };
?>