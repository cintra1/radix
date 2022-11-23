<?php
include('php/conexao.php');
require('php/connection.php');

$consulta = "SELECT * FROM tblProduto WHERE statusProduto <> 0  ORDER BY RAND() LIMIT 8";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);


$consulta3 = "SELECT * FROM tblProduto WHERE statusProduto <> 0 ORDER BY RAND() LIMIT 8";

$con3 = $pdo->query($consulta3) or die($mysqli->error);
$conn3 = $mysqli->query($consulta3) or die($mysqli->error);


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
    <link rel="stylesheet" href="assets/css/styleMyIni.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--==================== GOOGLE ICONS ====================-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Radix</title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav nav__container">

            <nav class="navbar naves">
                <a href="initial.php">Home</a>
                <a href="#packages">Produtores</a>
                <a href="fruta.php">Frutas</a>
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
                            <div id="cart-btn" id="carts" class="uil uil-shopping-bag nav__link"></div>
                        </li>

                        <li class="nav__item">
                            <a href="login.php" class="fas fa-user nav__link"></a>
                        </li>

                       
                      
                    </div>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>
        </nav>


        <div class="shopping-cart cartes carts">
            <div class="box">
                <img src="assets/img/carrinho-vazio.svg" alt="" class="carrinho__img">
            </div>
            <h3 class="total2"> Você não está logado. Clique no botão abaixo para fazer login e começar a comprar.  </h3>
            <a href="login.php" class="btn">Fazer Login</a>
        </div>
        
    </header>

    <main class="main initial__home">

        <!--=============== HOME ===============-->
        <section class="home" id="home">
            <div class="svg">
                <div class="initial__container grid">
                    <div class="content">
                        <div class="fist">
                            <h3><span>orgânicos frescos<br></span> na sua mão com até<br> 50% de economia</h3>
                            <p>Nós levamos seu orgânico com qualidade radix que você já conhece, sem <br>
                                taxa de adesão e com frete grátis. Incrível, não?</p>
                        </div>
                        <div class="inputs">
                            <i class="material-icons">place</i>
                            
                            <a href="login.php" style="cursor: pointer;"><input type="text" style="cursor: pointer;" placeholder="Faça login para adicionar um endereço" id="search_address" readonly></a>
                               
                             
                            <i class="uil uil-angle-down" id="search_arrow" style="visibility: hidden;"></i>
                            <i class="uil uil-ticket"></i>
                            <select name="" id="" class="search2">
                                <option value="">Sem cupons...</option>
                    
                            </select>
                            <div class="location__box" id="location__box" style="display: none;">
                                <div class="loc">
                                    <h3>
                                        <i class="uil uil-compass"></i>
                                        Detectar Localização Atual
                                    </h3>
                                    <p>Usando GPS</p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="boxin" style="display: none">
                        <select name="" id="">
                            <option value="">Escolha uma cesta...</option>
                            <option value="">Cesta Júnior</option>
                            <option value="">Cesta Normal</option>
                            <option value="">Cesta Jumbo</option>
                        </select>
                        <a href="" class="button3">Faça sua cesta</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="invisivel">
            <div class="box__inv">
                <div class="content2">
                    <h3><span>orgânicos frescos<br></span> na sua mão com até<br> 50% de economia</h3>
                    <p>Nós levamos seu orgânico com qualidade radix que você já conhece, sem <br>
                        taxa de adesão e com frete grátis. Incrível, não?</p>
                </div>
                <a href="" class="button3">Começe a comprar já</a>
            </div>
        </div>

        <section class="feature section-p1">
            <div class="f__box">
                <img src="assets/img/solo.png" style="width: 150px;" alt="">
                <p>Faltou um tomate na sua salada?</p>
                <h6>Peça na Radix, a entrega é rápida.</h6>
            </div>

            <div class="f__box">
                <img src="assets/img/casal.png" style="width: 150px;" alt="">
                <p>Vai fazer um prato especial?</p>
                <h6>Peça os ingredientes na Radix e arrase.</h6>
            </div>

            <div class="f__box">
                <img src="assets/img/family.png" style="width: 150px;" alt="">
                <p>Quer fazer as compras do mês?</p>
                <h6>Ideal para uma família.</h6>
            </div>


            </div>
        </section>

        <section class="produtos1 section-p1" id="prod">
            <h2>Produtos em Destaques</h2>
            <p>Itens mais amados entre nossos clientes</p>
            <div class="prod__container">
                <?php

                while ($dado = $conn->fetch_array()) {

                    $idProduto = $dado["idProduto"];
                    $consultaVend = "SELECT nomeVend,v.idVendedor FROM tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor where idProduto = $idProduto";

                    $connVend = $mysqli->query($consultaVend) or die($mysqli->error);
                ?>
                    <div class="prod">
                        <img src="upload/<?php echo $dado["foto"]; ?>" alt="">
                        <div class="des">
                            <?php while ($dado2 = $connVend->fetch_array()) { 
                                
                                $idVendedor = $dado2["idVendedor"];
                                $consultaV = "SELECT count(*) as entrega from tblEntrega where idVendedor = $idVendedor;";

                                $connV = $mysqli->query($consultaV) or die($mysqli->error);

                                ?>
                                <a href="sVendedor.php?idVendedor=<?php echo $dado2["idVendedor"]; ?>"><span>Produtor: <?php
                                                                                                                        echo $dado2['nomeVend']; ?>ﾠ</span></a> 
                                <?php while ($dado3 = $connV->fetch_array()) {
                                   if($dado3['entrega'] == 0){  ?>
                                <img src="assets/img/semente.png" alt="" class="star__img">

                                <?php }else if($dado3['entrega'] <= 3){ ?>

                                    <img src="assets/img/folha.png" alt="" class="star__img">
                                <?php }else if($dado3['entrega'] > 3 ){ ?>
                                    <img src="assets/img/tree.png" alt="" class="star__img">
                                    <?php } }?>
                                <h5><?php echo $dado["nomeProd"]; ?></h5><?php } ?></h2>
                          
                            <h4>R$ <?php echo number_format($dado["preco"], 2, ",", "."); ?></h4>
                        </div>
                        <a href="login.php"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="banner section-m1">
            <h4>cupom de desconto</h4>
            <h2>Dê sua sugestão na tela de <span>feedbacks</span> para ganhar o cupom FALE5</h2>
            <span>Cupom oferece R$ 5,00 na compra de qualquer produto no app.</span>
            <a href="login.php"><button class="normal">Dar seu feedback</button></a>
        </section>

        <section class="produtos1 section-p1">
            <h2>Novos produtos</h2>
            <p>Seja o primeiro a experimentar esses produtos</p>
            <div class="prod__container">
                <?php

                while ($dado3 = $conn3->fetch_array()) {

                    $idProduto = $dado3["idProduto"];
                    $consultaVend2 = "SELECT nomeVend,v.idVendedor FROM tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor where idProduto = $idProduto";

                    $connVend2 = $mysqli->query($consultaVend2) or die($mysqli->error);
                ?>
                    <div class="prod">
                        <img src="upload/<?php echo $dado3["foto"]; ?>" alt="">
                        <div class="des">
                        <?php while ($dado4 = $connVend2->fetch_array()) { 
                                
                                $idVendedor = $dado4["idVendedor"];
                                $consultaVe = "SELECT count(*) as entrega from tblEntrega where idVendedor = $idVendedor;";

                                $connVe = $mysqli->query($consultaVe) or die($mysqli->error);

                                ?>
                                <a href="sVendedor.php?idVendedor=<?php echo $dado3["idVendedor"]; ?>"><span>Produtor: <?php
                                                                                                                        echo $dado4['nomeVend']; ?>ﾠ</span></a> 
                                <?php while ($dado5 = $connVe->fetch_array()) {
                                   if($dado5['entrega'] == 0){  ?>
                                <img src="assets/img/semente.png" alt="" class="star__img">

                                <?php }else if($dado5['entrega'] <= 3){ ?>

                                    <img src="assets/img/folha.png" alt="" class="star__img">
                                <?php }else if($dado5['entrega'] > 3 ){ ?>
                                    <img src="assets/img/tree.png" alt="" class="star__img">
                                    <?php } }?>
                                <h5><?php echo $dado3["nomeProd"]; ?></h5><?php } ?></h2>
                          
                      
                        <h4>R$ <?php echo number_format($dado3["preco"], 2, ",", "."); ?></h4>
                        </div>
                        <a href="login.php"><i class="fas fa-shopping-cart"></i></a>
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
                <a href="index.html#sobre">Sobre nós</a>
                <a href="#">Informações sobre entrega</a>
                <a href="#">Política de privacidade</a>
            </div>

            <div class="col">
                <h4>Minha Conta</h4>
                <a href="login.php">Fazer Login</a>
                <a href="carrinho.php">Carrinho</a>
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

        <script src="assets/js/initial.js"></script>

        <script>
            var search = document.getElementById('enter');

            search.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    searchData();
                }
            });

            function searchData() {
                window.location = 'login.php';
            }
        </script>



</body>

</html>