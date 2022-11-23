<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protect.php');
include('php/loadItem.php');
include('php/protectCarrinho.php');


if (isset($_POST['sub'])) {
    header("Location: initial.php");
}

$_SESSION['dados'] = array();

$sql0 = $pdo->query("SELECT v.idVendedor from tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor inner join tblItem as i on p.idProduto = i.idProduto where i.idCliente = $idCliente");

if ($sql0->rowCount() > 0) {
    $idProduto = $value['idProduto'];
    $sql2 = $pdo->query("SELECT v.idVendedor from tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor inner join tblItem as i on p.idProduto = i.idProduto where p.idProduto = $idProduto");
    if ($sql2->rowCount() > 0) {
        foreach ($sql2->fetchAll() as $value2) {
        }
    }
}

$idCliente = $_SESSION['idCliente'];
$consulta = "SELECT * FROM tblPedido as ped inner join tblItem as i on ped.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto WHERE ped.idCliente = $idCliente and statusItem <> 0";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);

$soma = "SELECT SUM(p.preco*i.qtde) AS total FROM tblProduto as p inner join tblItem as i on p.idProduto = i.idProduto where statusItem <> 0 and idCliente = $idCliente";
$s = $mysqli->query($soma) or die($mysqli->error);

$idCupom = $_GET['idCupom'];

$sqlCupom = $pdo->query("SELECT num as desconto FROM tblCupom WHERE idCupom = $idCupom");

if ($sqlCupom->rowCount() > 0) {
    $soma2 = "SELECT GREATEST(SUM(p.preco*i.qtde)-c.num, 0) AS total FROM tblCupom as c inner join tblCliente as cli on c.idCliente = cli.idCliente inner join tblItem as i on cli.idCliente = i.idCliente inner join tblProduto as p on i.idProduto = p.idProduto where statusItem <> 0 and cli.idCliente = $idCliente and c.idCupom = $idCupom";
    $s2 = $mysqli->query($soma2) or die($mysqli->error);
} else {
    $soma2 = "SELECT SUM(p.preco*i.qtde) AS total FROM tblProduto as p inner join tblItem as i on p.idProduto = i.idProduto where statusItem <> 0 and idCliente = $idCliente";
    $s2 = $mysqli->query($soma2) or die($mysqli->error);
}


$cupom = "SELECT num as desconto FROM tblCupom WHERE idCupom = $idCupom";
$c = $mysqli->query($cupom) or die($mysqli->error);

$cupom2 = "SELECT nomeCupom as n FROM tblCupom WHERE idCupom = $idCupom";
$c2 = $mysqli->query($cupom2) or die($mysqli->error);



$sql = $pdo->query("SELECT * from tblItem as i inner join tblProduto as p on i.idProduto = p.idProduto
   inner join tblVendedor as v on p.idVendedor = v.idVendedor where idCliente = $idCliente and statusItem <> 0;");
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $value) {
        array_push(
            $_SESSION['dados'],
            array(
                'idCliente' =>  $value['idCliente'],
                'idItem' =>  $value['idItem'],
                'idVendedor' =>  $value2['idVendedor'],
                'qtde' => $value['qtde'],
                'preco' => $value['preco'],
                'nomeProd' => $value['nomeProd'],
                'statusEntrega' => 1
            )
        );
    }
}

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
    <link rel="stylesheet" href="assets/css/styleCarr.css">

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

            <nav class="navbar">
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

        <main class="main initial__home">

    </header>

    <main class="main initial__home">
        <!--=============== CARRINHO ===============-->
        <section class="page__header">
            <h2>carrinho</h2>
            <p>Conclua sua Compra</p>
        </section>
        <section class="cart section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Excluir</td>
                        <td>Imagem</td>
                        <td>Produto</td>
                        <td>Preço</td>
                        <td>Quantidade</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($con->rowCount() > 0) {
                        while ($dado = $conn->fetch_array()) {   ?>
                            <tr>
                                <td> <a href="remover2.php?idItem=<?php echo $dado["idItem"]; ?>"><i class="far fa-times-circle"></i></a></td>
                                <td><img src="upload/<?php echo $dado["foto"]; ?>" alt=""></td>
                                <td><?php echo $dado["nomeProd"]; ?></td>
                                <td>R$ <?php echo number_format($dado['preco'], 2, ",", "."); ?></td>
                                <td><input type="number" value="<?php echo $dado["qtde"]; ?>" style="width: 3rem" readonly></td>
                                <td>R$ <?php echo number_format(($dado['preco'] * $dado['qtde']), 2, ",", "."); ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>Você não tem produtos adicionados no carrinho.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="cart-add section-p12">
            <div class="cupom">
                <h3>Aplicar Cupom</h3>
                <div>
                    <form action="#">
                        <select name="idCupom" id="idCupom">

                            <?php
                            $query = $pdo->query("SELECT idCupom,nomeCupom FROM tblCupom WHERE idCliente = $idCliente");
                            $registros = $query->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <?php if ($_GET['idCupom'] == 0) { ?>
                                <option value="0">Escolha seu Cupom </option>
                            <?php } else { ?>
                                <option value="0"> <?php while ($dado5 = $c2->fetch_array()) {
                                                        echo $dado5['n']; ?> <?php } ?> (Selecionado) </option>
                            <?php } ?>

                            <?php
                            foreach ($registros as $option) {
                            ?>


                                <option value="<?php echo $option['idCupom'] ?>"><?php echo $option['nomeCupom'] ?></option>

                            <?php } ?>

                        </select>

                        <button type="submit" class="normal" name="subCupom">Aplicar</button>
                    </form>
                </div>
            </div>

            <div class="subtotal">
                <h3>Total</h3>
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>R$ <?php while ($dado = $s->fetch_array()) {
                                    echo number_format($dado['total'], 2, ",", "."); ?> <?php } ?></td>
                    </tr>
                    <tr>
                        <td>Cupom</td>
                        <td>
                            <?php if ($sqlCupom->rowCount() > 0) { ?>
                                - R$ <?php while ($dado3 = $c->fetch_array()) {
                                            echo number_format($dado3['desconto'], 2, ",", "."); ?> <?php }
                                                                                            } else { ?>
                                Nenhum cupom adicionado<?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Entrega</td>
                        <td>Grátis</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>R$ <?php while ($dado2 = $s2->fetch_array()) {
                                            echo number_format($dado2['total'], 2, ",", "."); ?> <?php } ?></strong></td>
                    </tr>
                </table>
            </div>

        </section>

        <div class="containr">

<form action="" method="POST" enctype="multipart/form-data">

    <div class="row">

        <div class="col">

            <h3 class="title">dados pessoais</h3>

            <div class="inputBox">
                <span>Nome Completo :</span>
                <input type="text" placeholder="João da Silva">
            </div>
            <div class="inputBox">
                <span>E-mail :</span>
                <input type="email" placeholder="exemplo@gmail.com">
            </div>
            <div class="inputBox">
                <span>Cidade :</span>
                <input type="text" placeholder="São Paulo">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>Estado :</span>
                    <input type="text" placeholder="Minas Gerais">
                </div>
                <div class="inputBox">
                    <span>CEP :</span>
                    <input type="text" placeholder="01015-050">
                </div>
            </div>

        </div>

        <div class="col">

            <h3 class="title">pagamentos</h3>

            <div class="inputBox">
                <span>Cartões aceitos :</span>
                <img src="assets/img/card_img.png" alt="">
            </div>
            <div class="inputBox">
                <span>Número do Cartão :</span>
                <input type="number" placeholder="1111-2222-3333-4444">
            </div>
            <div class="inputBox">
                <span>Mês de expiração :</span>
                <input type="text" placeholder="Janeiro">
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>Ano de expiração :</span>
                    <input type="number" placeholder="2022">
                </div>
                <div class="inputBox">
                    <span>CVV :</span>
                    <input type="text" placeholder="1234">
                </div>
            </div>

        </div>

    </div>

        <input class="normal final" type="submit" name="sub" value="Finalizar Compra" style="background-color: #70C28D !important;
color: #FFF !important;
padding: 12px 20px;">


</form>

</div>

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

        if (isset($_POST['sub'])) {
            foreach ($_SESSION['dados'] as $produtos1) {
                $insert1 = $pdo->prepare("
        INSERT INTO tblEntrega (statusEntrega,idCliente,idItem,idVendedor) VALUES (?,?,?,?)");
                $insert1->bindParam(1, $produtos1['statusEntrega']);
                $insert1->bindParam(2, $produtos1['idCliente']);
                $insert1->bindParam(3, $produtos1['idItem']);
                $insert1->bindParam(4, $produtos1['idVendedor']);
                $insert1->execute();
                $bol = true;
            }

            foreach ($_SESSION['dados'] as $produtos) {
                $insert = $pdo->prepare("
                UPDATE tblItem SET statusItem = 0 WHERE idCliente = ?;");
                $insert->bindParam(1, $produtos['idCliente']);
                $insert->execute();
            }

            header("Location: initial.php");
        }


        ?>

        <?php
        if (isset($_POST['subCupom'])) {
            $idCupom = addslashes($_POST['idCupom']);


            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['idCupom'] = $idCupom;
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