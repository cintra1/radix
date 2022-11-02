<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protect.php');
include('php/loadItem.php');
include('php/protectIDEnd.php');
include('php/loadEnd.php');

if (isset($_POST['subAttEnd'])) {
    header("Location: perfilCliente.php");
}

if (isset($_POST['sub5'])) {
    foreach ($_SESSION['dados'] as $produtos) {
        $insert = $pdo->prepare("
        INSERT INTO tblPedido (idCliente,idItem,idVendedor) VALUES (?,?,?)");
        $insert->bindParam(1, $produtos['idCliente']);
        $insert->bindParam(2, $produtos['idItem']);
        $insert->bindParam(3, $produtos['idVendedor']);
        $insert->execute();
        $bol = true;
    }
    header("Location: carrinho.php");
}

$idCliente = $_SESSION['idCliente'];

$sql = $pdo->query("SELECT * from tblCliente where idCliente = '$idCliente'");
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $value3) {
    }
}

$_SESSION['dados'] = array();
$idCliente = $_SESSION['idCliente'];

$consulta = "SELECT * FROM tblProduto WHERE statusProduto <> 0  ORDER BY RAND() LIMIT 20";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);

$consulta2 = "SELECT * from tblItem as i inner join tblProduto as p on i.idProduto = p.idProduto
    inner join tblVendedor as v on p.idVendedor = v.idVendedor where idCliente = $idCliente and statusItem <> 0";

$con2 = $pdo->query($consulta2) or die($mysqli->error);
$conn2 = $mysqli->query($consulta2) or die($mysqli->error);

$consulta3 = "SELECT * FROM tblProduto WHERE statusProduto <> 0 ORDER BY RAND() LIMIT 8";

$con3 = $pdo->query($consulta3) or die($mysqli->error);
$conn3 = $mysqli->query($consulta3) or die($mysqli->error);

$consultaEndereco = "SELECT * from tblEndereco where idCliente = $idCliente;";

$conEndereco = $pdo->query($consultaEndereco) or die($mysqli->error);
$connEndereco = $mysqli->query($consultaEndereco) or die($mysqli->error);

$soma = "SELECT SUM(p.preco*i.qtde) AS total FROM tblProduto as p inner join tblItem as i on p.idProduto = i.idProduto where statusItem <> 0 and idCliente = $idCliente";
$s = $mysqli->query($soma) or die($mysqli->error);

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
                'nomeProd' => $value['nomeProd']
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
    <link rel="stylesheet" href="assets/css/stylePClient.css">

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



            <a href="initial.php" class="nav__logo first"> <i class="fa fa-leaf"></i>Radix</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list__initial">
                    <div></div>
                    <form action="" class="search-form">
                        <input id="enter" type="search" placeholder="busque por produtor ou item..." id="search-box">
                        <a href="search.html">
                            <label for="search-box" class="fas fa-search"></label></a>
                    </form>

                    <div class="nav__icon">

                        <div class="fas fa-search" id="search-btn" style="display: none"></div>

                        <li class="nav__item">
                            <div id="cart-btn" class="uil uil-shopping-bag nav__link"></div>
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



        <div class="shopping-cart cartes carts">
            <?php if ($con2->rowCount() > 0) { ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="box__maior" style=" overflow-y: scroll;height: 18rem;">
                        <?php while ($dado2 = $conn2->fetch_array()) {   ?>
                            <div class="box">
                                <a href="remover.php?idItem=<?php echo $dado2["idItem"]; ?>"><i class="fas fa-times"></i></a>
                                <img src="upload/<?php echo $dado2["foto"]; ?>" alt="">
                                <div class="content">
                                    <h3><?php echo $dado2["nomeProd"]; ?></h3>
                                    <span class="quantity"><?php echo $dado2["qtde"]; ?></span>
                                    <span class="multiply">x</span>
                                    <span class="price">R$ <?php echo number_format($dado2["preco"], 2, ",", "."); ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <h3 class="total"> Total : <?php while ($dado = $s->fetch_array()) {
                                                    echo number_format($dado['total'], 2, ",", "."); ?></h3> <?php } ?> </h3>
                <input class="btn" type="submit" name="sub5" value="Finalizar Compra">

        </div>
    <?php } else { ?>
        <div class="box">
            <img src="assets/img/carrinho-vazio.svg" alt="" class="carrinho__img">
        </div>
        <h3 class="total2"> Seu carrinho está vazio. Clique no botão abaixo para começar a comprar. </h3>
        <a href="produtores.php" class="btn">Começar a comprar</a>
    <?php } ?>
    </form>
    </header>

    <main class="main initial__home">
        <!--=============== Perfil ===============-->

      
        <section class="page__header">
            <div class="alinhar">
                <div id="linha-horizontal"></div>
            </div>
            <h2 style="margin-top: 4rem">Editar Endereço</h2>

            <div class="caixa__grande"  style="margin-bottom: 2rem;">
                <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
                            <div class="caixa">
                                <label for="nome">ㅤㅤEndereço:
                                    <input type="text" id="endereco" placeholder="Endereço" name="endereco" value="<?php echo $valueEnd['endereco']; ?>">
                                </label>
                            </div>
                            <div class="caixa2">
                                <label for="detalhe">Número:
                                    <input type="text" id="cpf" placeholder="Número" name="numero" value="<?php echo $valueEnd['numero']; ?>">
                                </label>
                            </div>
                            <div class="caixa2">
                                <label for="detalhe">ㅤㅤComplemento:
                                    <input type="text" id="email" placeholder="Complemento" name="complemento" value="<?php echo $valueEnd['complemento']; ?>">
                                </label>
                            </div>
                            <div class="caixa3">
                                <label for="detalhe">Apelido:
                                    <input type="text" id="cpf" placeholder="Apelido" name="apelidoEndereco" value="<?php echo $valueEnd['apelidoEndereco']; ?>">
                                </label>

                            </div>
                            <input type="submit" class="btn2" value="Editar Endereco" name="subAttEnd">
                </form>
            </div>
        </section>



        <div class="alinhar">
            <div id="linha-horizontal"></div>
        </div>

        <!--=============== FOOTER ===============-->
        <footer class="section-p1">


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
        require_once 'php/editarCliente.php';
        $u = new Usuario;


          //verificar se a pessoa clicou no btnCadastrar
          if (isset($_POST['subAttEnd'])) {

            $endereco = addslashes($_POST['endereco']);
            $complemento = addslashes($_POST['complemento']);
            $numero = addslashes($_POST['numero']);
            $apelidoEndereco = addslashes($_POST['apelidoEndereco']);


            //verificar se esta preenchido
            if (!empty($endereco) && !empty($complemento) && !empty($numero) && !empty($apelidoEndereco)) {
                $u->conectar("Radix", "localhost", "root", "");
                if ($u->msgErro == "") //ta ok
                {
                    if ($u->atualizarEndereço($idEndereco, $endereco, $apelidoEndereco, $complemento, $numero)) {
        ?>
                        <div id="msg-sucesso">
                            Atualizado com sucesso!
                        </div>
                    <?php

                    } else {
                      
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

</html>