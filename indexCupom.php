<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectAdm.php');


$consulta = "SELECT * FROM tblCupom";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styleICupons.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <title>Radix</title>

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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

    <div class="caixa__grande">
        <h2 class="title__top"> <a href="indexAdm.php" style="color: #70C28D;">Aréa De Admnistração </a> > Editar Cupons</h2>
        <div class="boxes">
            <?php if ($con->rowCount() > 0) {
                while ($dado = $conn->fetch_array()) { ?>
                    <div class="home__container container grid box">
                        <div class="home__box home__container container grid">

                            <div class="title">
                                <h1 class="title__prod"><?php echo $dado["nomeCupom"]; ?></h1>
                                <h6>ID do Cliente: <?php echo $dado["idCliente"]; ?></h6>
                            </div>
                            <div class="description">
                                <a class="btn4" href="alterarCupom.php?idCupom=<?php echo $dado["idCupom"]; ?>"><i class="uil uil-pen"></i></a>
                                <p class="home__description2" style=" max-width: 35ch;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;"><?php echo $dado["detalhe"]; ?></p>
                                <p class="home__price"> <span style="color: #70C28D;">R$ </span><?php echo number_format($dado["num"], 2, ",", "."); ?> </p>
                            </div>

                        </div>
                    </div>
                <?php }
            } else {
                ?>
                <h1 class="title__sem">Nenhum Cupom adicionado</h1>
                <h1 class="title__sem2">Clique no botão abaixo para adicionar um cupom.</h1>
                <img class="img2" src="assets/img/Discount-pana.svg" alt="" style="width:25rem !important; margin-left:70%; margin-top: -1rem;  margin-bottom: 3rem;">
            <?php
            } ?>
        </div>


        <div class="btns">
            <a href="cupom.php"><input type="submit" class="btn3" value="Adicionar Cupom" name="sub" /></a>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>