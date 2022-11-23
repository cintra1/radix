<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectVend.php');

$idVendedor = $_SESSION['idVendedor'];


$soma = "SELECT SUM(p.preco*i.qtde) as saldo from tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto inner join tblVendedor as v on p.idVendedor = v.idVendedor where e.idVendedor = $idVendedor";
$s = $mysqli->query($soma) or die($mysqli->error);


$soma2 = "SELECT SUM(p.preco*i.qtde) as saldo from tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto inner join tblVendedor as v on p.idVendedor = v.idVendedor where e.idVendedor = $idVendedor";
$s2 = $mysqli->query($soma2) or die($mysqli->error);

$soma3 = "SELECT count(*) as vendas from tblPedido where idVendedor = $idVendedor;";
$s3 = $mysqli->query($soma3) or die($mysqli->error);

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
    <link rel="stylesheet" href="assets/css/styleGastos.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Radix</title>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            <?php
            include("php/conexao.php");
            require('php/connection.php');

            $sql = "SELECT distinct nomeProd,preco,qtde from tblVendedor as v inner join tblProduto as p on v.idVendedor = p.idVendedor inner join tblItem as i on p.idProduto = i.idProduto where v.idVendedor = $idVendedor order by (p.preco*i.qtde) DESC LIMIT 5;";

            $buscar = mysqli_query($mysqli,$sql);

            while($dados = mysqli_fetch_array($buscar)){
                $preco = $dados['preco']*$dados['qtde'];
                $nomeProduto = $dados['nomeProd'];
            
            ?>
            data.addRows([
                ['<?php echo $nomeProduto?>', <?php echo $preco ?>],
            ]);

            <?php } ?>

            // Set chart options
            var options = {
                'width': 300,
                'height': 140,
                colors: ['#076D61', '#26A69A', '#227587', '#78E389', '#9AC2AB']

            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
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
                <h1 class="perfil__title"> <a href="indexVendedor.php" style="color: #70C28D;">Home Vendedor </a> > Gastos Semanais</h1>
            </div>
        </div>
    </section>
    <form action="" style="display:flex;">
        <div class="caixa container2">

            <div class="caixa__grid">
                <h2 class="title__adm">Carteira</h2>
                <div id="um" class="box">
                    <h2 class="title__box">Saldo</h2>
                    <label for="saldo">
                        <h1>R$ <?php while ($dado = $s->fetch_array()) {
                                    echo number_format($dado['saldo'], 2, ",", "."); ?> <?php } ?></h1>
                    </label>
                    <input type="text" id="saldo" style="display: none;" name="saldo" readonly>
                </div>
            </div>

            <div class="caixa__grid">
                <h2 class="title__adm">ﾠ</h2>
                <div id="dois" class="box">
                    <h2 class="title__box">Conta Bancária</h2>
                    <h1>R$ 0,00</h1>
                </div>
            </div>

            <div class="caixa__grid2">
                <button type="submit" name="sub" style="border: none; background-color: #fff; cursor:pointer;">
                    <h2 class="title__box2">Transferir Fundos <i class="uil uil-arrow-circle-right"></i></h2>
                </button>
            </div>
        </div>
        </div>
    </form>

    <div class="caixa2 container2">
        <div class="caixa__grid">
            <h2 class="title__adm">Controle de Vendas</h2>
            <div id="pad" class="box__second">
                <p>Vendas</p>
                <h1>R$ <?php while ($dado2 = $s2->fetch_array()) {
                                    echo number_format($dado2['saldo'], 2, ",", "."); ?> <?php } ?></h1>
     
            </div>
        </div>

        <div class="caixa__grid">
            <h2 class="title__adm">Avaliações</h2>
            <div class="box__second">
                <p>Engajamento</p>
                <h1><?php while ($dado3 = $s3->fetch_array()) {
                                 echo $dado3['vendas']; ?> <?php } ?> Vendas</h1>
            </div>
        </div>

        <div class="caixa__grid">
            <h2 class="title__adm">Produtos com mais vendas</h2>
            <div id="chart_div"></div>
        </div>
    </div>


    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

</body>

</html>