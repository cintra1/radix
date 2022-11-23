<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectVend.php');


$idVendedor = $_SESSION['idVendedor'];

$consulta = "SELECT * FROM tblProduto WHERE statusProduto <> 0 and idVendedor = $idVendedor";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylesProdutos.css">
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
        <h2 class="title__top"> <a href="indexVendedor.php" style="color: #70C28D;">Home Vendedor </a> > Editar Produtos</h2>
        <div class="boxes">
            <?php if ($con->rowCount() > 0) {
                while ($dado = $conn->fetch_array()) { ?>
                    <div class="home__container container grid box">
                        <div class="home__box home__container container grid">

                            <div class="title">
                                <h1 class="title__prod"><?php echo $dado["nomeProd"]; ?></h1>
                                <div class="box__img">
                                    <img src="upload/<?php echo $dado["foto"]; ?>" alt="">
                                </div>
                            </div>
                            <div class="description">
                                <a class="btn4" href="alterarProd.php?idProduto=<?php echo $dado["idProduto"]; ?>"><i class="uil uil-pen"></i></a>
                                <p class="home__description2" style=" max-width: 35ch;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;"><?php echo $dado["detalhe"]; ?></p>
                                <p class="home__price"> <span style="color: #70C28D;">R$ </span><?php echo number_format($dado["preco"], 2, ",", "."); ?> </p>
                            </div>

                        </div>
                    </div>
                <?php }
            } else {
                ?>
                <h1 class="title__sem">Nenhum produto adicionado</h1>
                <h1 class="title__sem2">Clique no botão abaixo para iniciar sua jornada como vendedor.</h1>
                <img class="img2" src="assets/img/sem-prod.svg" alt="" style="width:23rem !important; margin-left:75%; margin-top: -1rem;  margin-bottom: 5rem;">
            <?php
            } ?>
        </div>


        <div class="btns">
            <a href="novoProd.php"><input type="submit" class="btn3" value="Adicionar Produto" name="sub" /></a>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>