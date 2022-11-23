<?php
include('php/protectVend.php');
include('php/conexao.php');
require('php/connection.php');
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
    <link rel="stylesheet" href="assets/css/stylesSelo.css">

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
                <h1 class="perfil__title"> <a href="indexVendedor.php" style="color: #70C28D;">Home Vendedor </a> > Selo de Produtor</h1>
            </div>
        </div>
    </section>

    <div class="caixa container2">
        <div class="caixa__cima">
            <div class="semente"></div>
            <div class="gradiente"></div>
            <div class="selos">
                <div class="icon">
                    <img src="assets/img/semente.png" style="width: 2.7rem !important; margin-left: 4.5rem;" alt="">
                    
                </div>

                <div class="icon">
                    <img src="assets/img/tree.png" style="width: 3rem !important;" alt="">
                    
                </div>

                <div class="icon">
                    <img src="assets/img/tulip.png" style="width: 3rem !important;" alt="">
                </div>

                <div class="icon">
                    <img src="assets/img/folha (2).png" style="width: 3rem !important;" alt="">
                </div>

                <div class="icon">
                    <img src="assets/img/flor-morta.png" style="width: 3.5rem !important;" alt="">
                </div>

                <div class="icon">
                    <img src="assets/img/arvore-morta.png" style="width: 3.7rem !important;" alt="">
                </div>
            </div>
        </div>

        <div class="caixa__baixo">
        <h2>Para nós do Radix, o cliente vem em primeiro lugar. Por isso, com base<br>
                nas suas vendas e nas avaliações dos clientes, você irá ser ranqueado<br>
                entre 6 selos (semente, árvore, flor, folha, flor morta e árvore morta).<br>
                Para aprender sobre os selos e seus benefícios, <a href="expSelo.html" style="color: #71D6A7">clique aqui.</a></h2>
      <?php 
        $idVendedor = $_SESSION['idVendedor'];
         $consultaVend = "SELECT * from tblVendedor where idVendedor = $idVendedor;";

         $connVend = $mysqli->query($consultaVend) or die($mysqli->error);
        while ($dado2 = $connVend->fetch_array()) { 
                                
                                $idVendedor = $dado2["idVendedor"];
                                $consultaV = "SELECT count(*) as entrega from tblEntrega where idVendedor = $idVendedor;";

                                $connV = $mysqli->query($consultaV) or die($mysqli->error);

                                ?>
                               <h1 style="margin-top:10rem; white-space:nowrap"> Seu selo é:
                                <?php while ($dado3 = $connV->fetch_array()) {
                                   if($dado3['entrega'] == 0){  ?>
                                <img src="assets/img/semente.png" alt="" class="star__img">

                                <?php }else if($dado3['entrega'] <= 3){ ?>
                                    <img src="assets/img/folha.png" alt="" class="star__img">
                                <?php }else if($dado3['entrega'] > 3 ){ ?>
                                    <img src="assets/img/tree.png" alt="" class="star__img">
                                    <?php } } }?></h1>
       

          
        </div>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>