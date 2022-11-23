<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectAdm.php');


$consulta = "SELECT feedback,nome from tblFeedback as f inner join tblCliente as c on f.idCliente = c.idCliente;";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <!--<link rel="icon" type="imagem/png" href="assets/img/leafg (1).png">-->
    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!--=============== LETRA ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/stylesFeedbacks.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Radix</title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a id="radix" href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>


            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

            <a href="php/logout.php" class="button button__header">LOGOUT</a>
        </nav>

    </header>

    <!--=============== BODY ===============-->

    <section class="home section" id="home">

        <div class="perfil">
            <div class="perfil__data">
                <h1 class="perfil__title"><a href="indexAdm.php" style="color: #70C28D;">Aréa De Admnistração </a> > Feedback de nossos clientes e Vendedores</h1>
            </div>
        </div>
    </section>
    <div id="cima">
        <?php if ($con->rowCount() > 0) {
            while ($dado = $conn->fetch_array()) { ?>
                <div class="box">
                    <h2><?php echo $dado["nome"]; ?></h2>
                    <p><?php echo $dado["feedback"]?></p>
                </div>
            <?php }
        } else {
            ?>
            <h1 class="title__sem">Sem feedbacks</h1>
        <?php
        } ?>

    </div>


    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>