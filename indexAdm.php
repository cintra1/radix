<?php
include("php/conexao.php");
require('php/connection.php');
include('php/protectADM.php');

$idVendedor = $_SESSION['idVendedor'];


$soma = "SELECT SUM(p.preco*i.qtde) as saldo from tblEntrega as e inner join tblItem as i on e.idItem = i.idItem inner join tblProduto as p on i.idProduto = p.idProduto inner join tblVendedor as v on p.idVendedor = v.idVendedor;";
$s = $mysqli->query($soma) or die($mysqli->error);


$contas = "SELECT COUNT(idCliente) as total from tblCliente";
$c = $mysqli->query($contas) or die($mysqli->error);


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
        <link rel="stylesheet" href="assets/css/stylesAdministracao.css">

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

            $sql = "SELECT v.nomeVend as Vendedor, count(idEntrega) as Vendas FROM tblVendedor v, tblEntrega e WHERE v.idVendedor = e.idVendedor GROUP BY v.idVendedor;";

            $buscar = mysqli_query($mysqli,$sql);

            while($dados = mysqli_fetch_array($buscar)){
                $vendas = $dados['Vendas'];
                $nomeVend = $dados['Vendedor'];
            
            ?>
            data.addRows([
                ['<?php echo $nomeVend?>', <?php echo $vendas ?>],
            ]);

            <?php } ?>

            // Set chart options
            var options = {
                'width': 380,
                'height': 185,
                colors: ['#076D61', '#26A69A', '#227587', '#78E389', '#9AC2AB'],

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
                <a id = "radix" href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>
               

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
                        <h1 class="perfil__title">Radix, Aréa de Admnistração da Equipe</h1>
                </div>
            </div>
        </section>    
        
    <div class="caixa container2">
        <div class="caixa__grid">
            <h2 class="title__adm">Vendas</h2>
            <div id="um" class="box">
                <p>Vendas Totais no aplicativo</p>
                <h1>R$ <?php while ($dado2 = $s->fetch_array()) {
                                    echo number_format($dado2['saldo'], 2, ",", "."); ?> <?php } ?></h1>
            </div>
        </div>

        <div class="caixa__grid">
            <h2 class="title__adm">Contas no APP</h2>
            <div class="box">
                <p>Total de clientes cadastrados</p>
                <h1><?php while ($dado = $c->fetch_array()) {
                                    echo $dado['total']; ?> <?php } ?></h1>
            </div>
        </div>

        <div class="caixa__grid">
            <h2 class="title__adm">Vendedores com mais vendas</h2>
            <div id="chart_div"></div>
        </div>
    </div>

    <div class="caixa__baixo container2">
        <div class="caixa__grid">
                <div class="box__baixo" id="vendedores">
                    <a href="vendas.php">
                        <h2>Vendedores ativos</h2>
                    </a>
                </div>
            </div>
        

        <div class="caixa__grid">
            <div class="box__baixo" id="controle">
                <a href="indexPagamentos.php">
                    <h2>Controle de Gastos</h2>
                </a>
            </div>
        </div>

        <div class="caixa__grid">
            <div class="box__pequena" id="cupons">
                <a href="indexCupom.php">
                    <h2>Cupons</h2>
                </a>
            </div>
            <div class="box__pequena" id="punicoes">
                <a href="punicoes.php">
                <h2>Punições</h2>
                </a>
            </div>
            <div class="box__pequena" id="feed">
                <a href="feedback.php">
                    <h2>Feedbacks</h2>
                </a>
            </div>
            <div class="box__pequena" id="lembretes">
                <a href="indexLembretes.php">
                    <h2>Lembretes</h2>
                </a>
            </div>
        </div>
    </div>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>