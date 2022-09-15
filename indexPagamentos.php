<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectAdm.php');

$idADM = $_SESSION['idADM'];

$consulta = "SELECT * FROM tblDespesas WHERE idAdm = '$idADM'";

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
    <link rel="stylesheet" href="assets/css/stylePagamento.css">

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

            <a href="app.html" class="button button__header">LOGOUT</a>
        </nav>

    </header>

    <!--=============== BODY ===============-->

    <section class="home section" id="home">

        <div class="perfil">
            <div class="perfil__data">
                <h1 class="perfil__title">Aréa de Admnistração da Equipe</h1>
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
                </div>
            <?php } ?>

        </div>
        <div class="direita">
            <div class="box__direita">
                <div>
                    <h2 class="title__direita">Despesas Totais</h2>
                    <h2 class="valor__direita">R$ 8.250,00</h2>
                </div>
                <div class="box__circle2">
                    <i class="uil uil-angle-down"></i>
                </div>
            </div>

            <div class="box__direita">
                <div>
                    <h2 class="title__direita">Despesas Pagas</h2>
                    <h2 class="valor__direita">R$ 2.250,00</h2>
                </div>
                <div class="box__circle2">
                    <i class="uil uil-angle-down"></i>
                </div>
            </div>

            <div class="box__direita">
                <div>
                    <h2 class="title__direita">Despesas Pendentes</h2>
                    <h2 class="valor__direita">R$ 6.000,00</h2>
                </div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="baixo">
        <div class="box2">
            <i class="uil uil-angle-left"></i>
            <h2>Março <span style="font-weight: 500;">2021</span> </h2>
            <i class="uil uil-angle-right"></i>
        </div>

        <div class="direita2">
            <div class="box3">
                <a href="despesa.php">
                <h2><i class="fa fa-plus"></i> Nova Despesa </h2></a>
            </div>

            <div class="box3 alt">
                <h2>Alterar Situação</h2>
            </div>
        </div>

    </div>


    <!--=============== FOOTER ===============-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content1">
                <a href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>

            </div>

            <div class="footer__content">
                <a href="#" class="footer__logo">EMPRESA</a>
                <p class="footer__description">A Radix é o seu supermercado orgânico e saudável, que conecta você ao pequeno produtor. Com entrega rápida e otimizada.</p>
            </div>

            <div class="footer__content">
                <h1 class="footer__title">INTEGRANTES</h1>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Mateus Cintra </a></li>
                    <li><a href="#" class="footer__link">Diego Carvalho</a></li>
                    <li><a href="#" class="footer__link">Felipe Kurt</a></li>
                    <li><a href="#" class="footer__link">Bruna Amorin</a></li>
                    <li><a href="#" class="footer__link">Leonardo Moura</a></li>
                </ul>
            </div>



            <div class="footer__content">
                <h3 class="footer__title"></h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link"></a></li>
                    <li><a href="#" class="footer__link"></a></li>
                    <li><a href="#" class="footer__link"></a></li>
                </ul>
            </div>

            <div class="footer__social">
                <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                <a href="#" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
            </div>
        </div>

    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>