<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectAdm.php');

$idADM = $_SESSION['idADM'];

$consulta = "SELECT * FROM tblDespesas WHERE idAdm = '$idADM'";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);

$somaT = "SELECT SUM(valor) AS total FROM tblDespesas";
$s = $mysqli->query($somaT) or die($mysqli->error);

$somaPagas = "SELECT SUM(valor) AS total FROM tblDespesas WHERE situacao = 'Pago'";
$s2 = $mysqli->query($somaPagas) or die($mysqli->error);

$somaN = "SELECT SUM(valor) AS total FROM tblDespesas WHERE situacao = 'Não Pago'";
$s3 = $mysqli->query($somaN) or die($mysqli->error);
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
    <link rel="stylesheet" href="assets/css/stylesPagamento.css">

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
                <h1 class="perfil__title"><a href="indexAdm.php" style="color: #70C28D;">Aréa De Admnistração </a> > Controle de Despesas</h1>
            </div>
        </div>
    </section>

    <div id="cima">
        <div class="box">
            <div class="categoria">
                <h2>Situação</h2>
                <h2>Data</h2>
                <h2>Descrição</h2>
                <h2>Conta</h2>
                <h2>Valor</h2>
            </div>

            <?php while ($dado = $conn->fetch_array()) { ?>
                <div class="box__pequena">
                    <h2><?php if ($dado["situacao"] == 'Não Pago') { ?>
                            <span style="color: red;"><?php echo $dado["situacao"]; ?></span>
                        <?php } else { ?>
                            <span style="color: green;"><?php echo $dado["situacao"]; ?></span>
                        <?php } ?>
                    </h2>
                    <h2><?php echo $dado["dia"]; ?></h2>
                    <h2><?php echo $dado["descricao"]; ?></h2>
                    <h2><?php echo $dado["conta"]; ?></h2>
                    <h2><?php echo number_format($dado["valor"], 2, ",", "."); ?></h2>
                    <h2><a class="btn4" href="alterarDespesa.php?idDespesas=<?php echo $dado["idDespesas"]; ?>"><i class="uil uil-pen"></i></a></h2>
                </div>
            <?php } ?>

        </div>
        <div class="direita">
            <div class="box__direita">
                <div>
                    <h2 class="title__direita">Despesas Totais</h2>
                    <h2 class="valor__direita">R$
                        <?php while ($dado = $s->fetch_array()) {
                            echo number_format($dado['total'], 2, ",", "."); ?></h2>
                <?php } ?>
                </div>
            </div>

            <div class="box__direita">
                <div>
                    <h2 class="title__direita">Despesas Pagas</h2>
                    <h2 class="valor__direita">R$ <?php while ($dado = $s2->fetch_array()) {
                                                        echo number_format($dado['total'], 2, ",", "."); ?></h2>
                <?php } ?></h2>
                </div>
            </div>

            <div class="box__direita" style="margin-bottom: 1.2rem">
                <div>
                    <h2 class="title__direita">Despesas Pendentes</h2>
                    <h2 class="valor__direita">R$ <?php while ($dado = $s3->fetch_array()) {
                                                        echo number_format($dado['total'], 2, ",", "."); ?></h2>
                <?php } ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="baixo" d>
        <div class="box2" style="visibility: hidden;">
            <i class="uil uil-angle-left"></i>
            <h2>Março <span style="font-weight: 500;">2021</span> </h2>
            <i class="uil uil-angle-right"></i>
        </div>

        <div class="direita2">
            <div class="box3">
                <a href="despesa.php">
                    <h2> Nova Despesa </h2>
                </a>
            </div>
        </div>

    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>