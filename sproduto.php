<?php 
include('php/protect.php');
include('php/load.php');
include('php/conexao.php');
require('php/connection.php');
include('php/protectIDProd2.php');

if (isset($_POST['sub'])) {
    header("Location: initial.php");
 }

 $consulta = "SELECT * FROM tblProduto WHERE statusProduto <> 0  ORDER BY RAND() LIMIT 4";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);

$idProduto = $value["idProduto"];
$consultaVend = "SELECT nomeVend as nomeVend FROM tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor where idProduto = $idProduto";

$connVend = $mysqli->query($consultaVend) or die($mysqli->error);


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

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/stylesSProd.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">



    <title>Radix</title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav nav__container">

            <nav class="navbar naves">
                <a href="initial.php">Home</a>
                <a href="#packages">Produtores</a>
                <a href="#services">Frutas</a>
                <a href="#pricing">Vegetais</a>
                <a href="#review">Especiarias</a>
            </nav>

            <a href="initial.php" class="nav__logo first"> <i class="fa fa-leaf"></i>Radix</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list__initial">
                    <div></div>
                    <form action="" class="search-form">
                        <input id="enter" type="search" placeholder="busque por produtor ou item..." id="search-box">
                        <button onclick="searchData()">
                            <label for="search-box" class="fas fa-search"></label></button>
                    </form>

                    <div class="nav__icon">


                        <div class="fas fa-search" id="search-btn" style="display: none"></div>

                        <li class="nav__item">
                            <a href="perfilCliente.php" class="fas fa-user nav__link"></a>
                            <!--<div id="login-btn" class="fas fa-user nav__link"></div>-->
                        </li>
                        <li class="nav__item">
                            <a href="php/logout.php" class="uil uil-signout nav__link" style="font-size: 1.2rem !important"></a>
                        </li>
                    </div>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>


        </nav>


    </header>

    <section class="prodetails section-p1">
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="single-pro-image">
            <img src="upload/<?php echo $value['foto']; ?>" width="100%" class="mainImg" alt="">
        </div>

        <div class="single-pro-details">
            <h4><?php echo $value['nomeProd']; ?></h4>
            <a href="sVendedor.php?idVendedor=<?php echo $value["idVendedor"]; ?>"><span>Produtor: <?php while ($dado2 = $connVend->fetch_array()) {
                                                echo $dado2['nomeVend']; ?></span><?php } ?></a>
                                                
            <h2>R$ <?php echo number_format($value["preco"], 2, ",", "."); ?></h2>
            <input type="number" value="1" name="qtde" min="0">
            <input type="submit" class="normal btn" name="sub" value="Adionar no carrinho">
            <h4>Detalhes do Produto</h4>
            <span><?php echo $value['detalhe']; ?></span>
        </div>
    </form>
    </section>
    
        
        <section class="produtos1 section-p1">
        <h2>Produtos em Destaques</h2>
        <p>Itens mais amados entre nossos clientes</p>
            <div class="prod__container">
                <?php

                while ($dado = $conn->fetch_array()) {

                    $idProduto = $dado["idProduto"];
                    $consultaVend = "SELECT nomeVend as nomeVend FROM tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor where idProduto = $idProduto";

                    $connVend = $mysqli->query($consultaVend) or die($mysqli->error);
                ?>
                    <div class="prod">
                        <img src="upload/<?php echo $dado["foto"]; ?>" alt="">
                        <div class="des">
                            <span>Produtor: <?php while ($dado2 = $connVend->fetch_array()) {
                                                echo $dado2['nomeVend']; ?></span>
                            <h5><?php echo $dado["nomeProd"]; ?></h5><?php } ?></h2>
                     
                        <h4>R$ <?php echo number_format($dado["preco"], 2, ",", "."); ?></h4>
                        </div>
                        <a href="sproduto.php?idProduto=<?php echo $dado["idProduto"]; ?>"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                <?php } ?>
            </div>
        </section>

    <div class="alinhar">
        <div id="linha-horizontal"></div>
    </div>

    <!--=============== FOOTER ===============-->
    <footer class="section-p1">
        <div class="col">
            <a href="index.html" class="nav__logo logo"> <i class="fa fa-leaf" style="color: #70C28D;"></i> Radix </a>
            <h4>Contato</h4>
            <p><strong>Endereço:</strong> Rua ABC, 300</p>
            <p><strong>Telefone:</strong> +55 (11) 91111-5555</p>
            <p><strong>Horas:</strong> 10:00 - 18:00, Segunda a Sexta</p>
            <div class="follow">
                <h4>Nos siga</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>Sobre</h4>
            <a href="#">Sobre nós</a>
            <a href="#">Informações sobre entrega</a>
            <a href="#">Política de privacidade</a>
        </div>

        <div class="col">
            <h4>Minha Conta</h4>
            <a href="#">Fazer Login</a>
            <a href="#">Carrinho</a>
            <a href="#">Ajuda</a>
        </div>

        <div class="col install">
            <h4>Baixar App</h4>
            <p>Baixar da App Store ou Google Play</p>
            <div class="row">
                <img src="assets/img/pay/app.jpg" alt="">
                <img src="assets/img/pay/play.jpg" alt="">
            </div>
            <p>Gateways de Pagamento Seguros</p>
            <img src="assets/img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>© Copyright 2021 - Radix - Todos os direitos reservados Radix com Agência de Restaurantes Online S.A.</p>
        </div>
    </footer>
    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== MAIN JS ===============-->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="assets/js/mainInitialss.js"></script>

    
    <?php
    include('php/conexao.php');

    require_once 'php/adicionarItem.php';
    $u = new Usuario;
    //verificar se a pessoa clicou no btnCadastrar
    if (isset($_POST['sub'])) {

        $qtde = addslashes($_POST['qtde']);
        $idProduto = $_GET['idProduto'];
        $idCliente = addslashes($_SESSION['idCliente']);
        $statusItem = '1';

        //verificar se esta preenchido
        if (!empty($qtde)) {
            $u->conectar("Radix", "localhost", "root", "");
            if ($u->msgErro == "") //ta ok
            {
                if ($u->cadastrar($qtde, $idProduto, $idCliente, $statusItem)) {
    ?>
                    <div id="msg-sucesso">
                        Cadastrado com sucesso!
                    </div>
                <?php
                } else {
                ?>
                    <div class="msg-erro">
                        Produto adicionado!
                    </div>
                <?php
                    header("Location: initial.php");
                }
            } else {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: " . $u->msgErro; ?>
                </div>
            <?php

            }
        } else {
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
    <?php

        }
    }

    ?>
</body>


<script>
            var search = document.getElementById('enter');

            search.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    searchData();
                }
            });

            function searchData() {
                window.location = 'pesquisar.php?search=' + search.value;
            }
        </script>


</html>