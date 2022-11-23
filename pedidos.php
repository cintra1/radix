<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectVend.php');


$_SESSION['dados'] = array();

$idVendedor = $_SESSION['idVendedor'];

$nome = "SELECT distinct nome,e.idCliente FROM tblEntrega as e inner join tblCliente as i on e.idCliente = i.idCliente where idVendedor = $idVendedor and statusEntrega = 1";

$n = $pdo->query($nome) or die($mysqli->error);
$nn = $mysqli->query($nome) or die($mysqli->error);


$consultaF = "SELECT * FROM tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto WHERE e.idVendedor = $idVendedor and statusEntrega = 0";

$conF = $pdo->query($consultaF) or die($mysqli->error);
$connF = $mysqli->query($consultaF) or die($mysqli->error);

$consultaSem = "SELECT * FROM tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto WHERE e.idVendedor = $idVendedor and statusEntrega = 1";

                    $conS= $pdo->query($consultaSem) or die($mysqli->error);
                    $connS = $mysqli->query($consultaSem) or die($mysqli->error);

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
    <link rel="stylesheet" href="assets/css/stylePedid.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min11.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

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
                <h1 class="perfil__title"> <a href="indexVendedor.php" style="color: #70C28D;">Home Vendedor </a> > Pedidos Abertos</h1>
            </div>
        </div>
    </section>

    <!-- Slider main container -->
    <div class="swiper portfolio section">
        <h2 class="section__title">Pedidos Abertos</h2>
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php
             if ($conS->rowCount() > 0) {
                while ($n1 = $nn->fetch_array()) {  

                    $idCliente = $n1['idCliente'];
                    $consulta = "SELECT * FROM tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto WHERE e.idVendedor = $idVendedor and e.idCliente = $idCliente and statusEntrega = 1";

                    $con = $pdo->query($consulta) or die($mysqli->error);
                    $conn = $mysqli->query($consulta) or die($mysqli->error);

                   
                    if ($con->rowCount() > 0) {
                        ?> <h2><?php echo $n1["nome"]; ?> </h2> <?php
                    while ($dado = $conn->fetch_array()) {   ?>
                        <div class="portfolio__content swiper-slide">
                            <div class="portfolio__data">

                                <h3 class="portfolio__title">#<?php echo $dado["idEntrega"]; ?> - <?php echo $dado["nomeProd"]; ?></h3>
                                <?php
                                
                                $idEntrega = $dado["idEntrega"];
                                $consulta2 = "SELECT * from tblEntrega as e inner join tblCliente as c on e.idCliente = c.idCliente  WHERE e.idVendedor = $idVendedor and statusEntrega = 1 and idEntrega = $idEntrega";

                                $con2 = $pdo->query($consulta2) or die($mysqli->error);
                                $conn2 = $mysqli->query($consulta2) or die($mysqli->error);

                                $connEndereco = "SELECT * from tblEndereco where idCliente = $idCliente and enderecoPrincipal = 1";

                                $end = $pdo->query($connEndereco) or die($mysqli->error);
                                $ennd = $mysqli->query($connEndereco) or die($mysqli->error);

                                while ($dado3 = $conn2->fetch_array()) {   ?>
                                    <p><span class="box__span">Cliente: </span> <?php echo $dado3["nome"]; ?></p>
                                <?php } ?>
                                <p><span class="box__span">Quantidade: </span> <?php echo $dado["qtde"]; ?></p>
                                <?php while ($dado5 = $ennd->fetch_array()) { ?>
                                <p><span class="box__span">Endereço: </span> <?php   echo $dado5['endereco']; } ?> </p>
                                <p><span class="box__span">Total: </span><strong>R$
                                        <?php

                                        $soma2 = "SELECT SUM(p.preco*i.qtde) AS total FROM tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto where idEntrega = $idEntrega and statusEntrega = 1";
                                        $s2 = $mysqli->query($soma2) or die($mysqli->error);


                                        while ($dado2 = $s2->fetch_array()) {
                                            echo number_format($dado2['total'], 2, ",", "."); ?> <?php } ?></strong></p>
                            </div>

                            <div class="portfolio__inf">
                                <?php if ($dado["statusEntrega"] == 1) { ?>
                                    <input type="text" placeholder="Separando produto" readonly>
                                <?php } else if ($dado["statusEntrega"] == 2) { ?>
                                    <input type="text" placeholder="A caminho do destinatário" readonly>
                                <?php } ?>
                                <a href="removerEntrega.php?idEntrega=<?php echo $dado["idEntrega"]; ?>" class="btn">Finalizar</a>
                            </div>
                        </div>

                <?php } } } } else { ?>
                <div class="center">
                    <img src="assets/img/sem-ped.svg" alt="">
                    <p>Você está sem pedidos por enquanto,<br> aguarde que os clientes estão escolhendo as frutas e legumes.</p>
                </div>
            <?php } ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev">
            <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
        </div>

        <div class="swiper-button-next">
            <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
        </div>


    </div>

    <div class="alinhar">
        <div id="linha-horizontal"></div>
    </div>
    <!--=============== SLIDES 2 ===============-->

    <!-- Slider main container -->
    <div class="swiper portfolio section" id="finalizados">
        <h2 class="section__title">Pedidos Finalizados</h2>
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php if ($conF->rowCount() > 0) {
                while ($dado = $connF->fetch_array()) {   ?>
                    <div class="portfolio__content swiper-slide">
                        <div class="portfolio__data">

                            <h3 class="portfolio__title">#<?php echo $dado["idEntrega"]; ?> - <?php echo $dado["nomeProd"]; ?></h3>
                            <?php
                            $idEntrega = $dado["idEntrega"];
                            $consulta2 = "SELECT * from tblEntrega as e inner join tblCliente as c on e.idCliente = c.idCliente  WHERE e.idVendedor = $idVendedor and statusEntrega = 0 and idEntrega = $idEntrega";

                            $con2 = $pdo->query($consulta2) or die($mysqli->error);
                            $conn2 = $mysqli->query($consulta2) or die($mysqli->error);
                            

                            while ($dado3 = $conn2->fetch_array()) {   ?>
                                <p><span class="box__span">Cliente: </span> <?php echo $dado3["nome"]; ?></p>
                            <?php } ?>
                            <p><span class="box__span">Quantidade: </span> <?php echo $dado["qtde"]; ?></p>
            
                            <p><span class="box__span">Total: </span><strong>R$
                                    <?php

                                    $soma2 = "SELECT SUM(p.preco*i.qtde) AS total FROM tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto where idEntrega = $idEntrega and statusEntrega = 0";
                                    $s2 = $mysqli->query($soma2) or die($mysqli->error);


                                    while ($dado2 = $s2->fetch_array()) {
                                        echo number_format($dado2['total'], 2, ",", "."); ?> <?php } ?></strong></p>
                        </div>

                        <div class="portfolio__inf">
                            <p><span class="box__span">Status: </span> Entregue</p>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="center">
                    <img src="assets/img/sem-fin.svg" alt="">
                    <p>Você não tem pedidos finalizados, <br> aguarde eles chegarem para dar pauta de entregue.</p>
                </div>
            <?php } ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev">
            <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
        </div>

        <div class="swiper-button-next">
            <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
        </div>

    </div>

    <!--=============== MAIN JS ===============-->


    <script src="assets/js/mainPedido.js"></script>

    <script src="assets/js/swiper-bundle.min11.js"></script>
</body>

</html>