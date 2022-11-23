<?php
include('php/conexao.php');
require('php/connection.php');
include('php/protect.php');
include('php/loadItem.php');

if (isset($_POST['sub'])) {
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

$_SESSION['dados'] = array();
$idCliente = $_SESSION['idCliente'];

$consulta = "SELECT * FROM tblProduto WHERE statusProduto <> 0  ORDER BY RAND() LIMIT 8";

$con = $pdo->query($consulta) or die($mysqli->error);
$conn = $mysqli->query($consulta) or die($mysqli->error);

$consulta2 = "SELECT * from tblItem as i inner join tblProduto as p on i.idProduto = p.idProduto
    inner join tblVendedor as v on p.idVendedor = v.idVendedor where idCliente = $idCliente and statusItem <> 0";

$con2 = $pdo->query($consulta2) or die($mysqli->error);
$conn2 = $mysqli->query($consulta2) or die($mysqli->error);

$consulta3 = "SELECT * FROM tblProduto WHERE statusProduto <> 0 ORDER BY RAND() LIMIT 8";

$con3 = $pdo->query($consulta3) or die($mysqli->error);
$conn3 = $mysqli->query($consulta3) or die($mysqli->error);

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

if (!empty($_GET['idVendedor'])) {
    $data = $_GET['idVendedor'];

    $sqlVend = "SELECT * from tblVendedor WHERE idVendedor = $data";
    $sv = $pdo->query($sqlVend) or die($mysqli->error);
    $svv = $mysqli->query($sqlVend) or die($mysqli->error);

    $sqlProd = "SELECT * from tblProduto WHERE idVendedor = $data";
    $sp = $pdo->query($sqlProd) or die($mysqli->error);
    $spp = $mysqli->query($sqlProd) or die($mysqli->error);
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
    <link rel="stylesheet" href="assets/css/styleVendedor.css">

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
    <header class="header" id="header" style="box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);">
        <nav class="nav nav__container">

            <nav class="navbar naves">
                <a href="initial.php">Home</a>
                <a href="#packages">Produtores</a>
                <a href="fruta.php">Frutas</a>
                <a href="#pricing">Vegetais</a>
                <a href="#review">Especiarias</a>
            </nav>

            <a href="initial.html" class="nav__logo first"> <i class="fa fa-leaf"></i>Radix</a>

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
                            <div id="cart-btn" class="uil uil-shopping-bag nav__link"></div>
                        </li>

                        <li class="nav__item">
                            <a href="perfilCliente.php" class="fas fa-user nav__link"></a>
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
                <input class="btn" type="submit" name="sub" value="Finalizar Compra">

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

        <span class="main_bg"></span>
        <?php while ($dadoV = $svv->fetch_array()) { ?>
            <div class="container">
                <section class="userProfile card">
                    <div class="profile">
                        <figure><img src="upload/<?php echo $dadoV['imagemVend']; ?>" alt="profile" width="250px" height="250px"></figure>
                    </div>
                </section>

                <section class="work_skills card">
                    <div class="work">
                        <h1 class="heading">Dados<h1>
                        <div class="primary">
                            <h1>Produtor da Radix</h1>
                            <p>Alimentos agrícolas certificados e fiscalizados pela ANVISA.</p>
                        </div>
                    </div>
                </section>

                <section class="userDetails card">
                    <div class="userName">
                        <h1 class="name"><?php echo $dadoV['nomeVend']; ?></h1>
                        <div class="map">
                            <i class="uil uil-map-marker"></i>
                            <span><?php echo $dadoV['enderecoVend']; ?></span>
                        </div>
                        <p>Produtor</p>
                    </div>

                    <div class="rank">
                        <h1 class="heading" >SELO</h1>
                          <?php 
                                $idVendedor = $_GET['idVendedor'];
                                $consultaVe = "SELECT count(*) as entrega from tblEntrega where idVendedor = $idVendedor;";

                                $connVe = $mysqli->query($consultaVe) or die($mysqli->error);

                                ?>
                              
                                <?php while ($dado5 = $connVe->fetch_array()) {
                                   if($dado5['entrega'] == 0){  ?>
                                <img src="assets/img/semente.png" alt="" class="star__img">
                                <div class="rating">
                            <span>Selo semente azul de novo produtor</span>
                        </div>

                                <?php }else if($dado5['entrega'] < 3){ ?>

                                    <img src="assets/img/folha.png" alt="" class="star__img">
                                    <div class="rating">
                                    <span>Selo folha de produtor na média</span>
                        </div>
                                <?php }else if($dado5['entrega'] > 3 ){ ?>
                                    <img src="assets/img/tree.png" alt="" class="star__img">
                                    <div class="rating">
                            <span>Selo árvore de produtor ultra confiável</span>
                        </div>
                                    <?php }?>

                    </div>
                </section>

                <section class="timeline_about card produtos1">
                    <div class="tabs">
                        <ul>
                            <li class="timeline">
                                <i class="uil uil-crockery"></i>
                                <span>Produtos</span>
                            </li>
                        </ul>
                    </div>
                    <div class="contact_Info">
                    <div class="prod__container">
                        <?php if ($sp->rowCount() > 0) {
                            while ($dadoP = $spp->fetch_array()) {
                                $idProduto = $dadoP["idProduto"];
                                $consultaVend = "SELECT nomeVend as nomeVend FROM tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor where idProduto = $idProduto";

                                $connVend = $mysqli->query($consultaVend) or die($mysqli->error); ?>
                                <div class="prod">
                                    <img src="upload/<?php echo $dadoP['foto']; ?>" alt="">
                                    <div class="des">
                                        <span>Produtor: <?php while ($dado2 = $connVend->fetch_array()) {
                                                            echo $dado2['nomeVend']; ?> </span><?php } ?>
                                    <h5><?php echo $dadoP['nomeProd']; ?></h2>
                                        
                                        <h4>R$ <?php echo number_format($dadoP["preco"], 2, ",", "."); ?></h4>
                                    </div>
                                    <a href="sproduto.php?idProduto=<?php echo $dadoP["idProduto"]; ?>"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            <?php }
                        } else {
                            ?>
                            <div class="sem-prod">
                                <img src="assets/img/Marketplace-pana.svg" alt="" style="width: 15rem;">
                                <h1>Nenhum produto encontrado.</h1>
                                <p> Esse produtor ainda não tem produtos, aguarde ou envie uma mensagem para se informar melhor.</p>
                            </div>
                        <?php
                        } ?>
                    </div>

                    </div>
                </section>
            </div>
        <?php }} ?>


       

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
                window.location = 'pesquisar.php?search=' + search.value;
            }
        </script>



</body>

</html>