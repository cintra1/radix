<?php
include('php/protect.php');
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
    <link rel="stylesheet" href="assets/css/stylesFale.css">

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
    <h1 class="fale"> FALE CONOSCO</h1>
    <form action="#" method="POST" class="fale">
        <div>
            <textarea id="tel" cols="100" rows="20" name="feedback" size="30" placeholder="Sua Sugestão/Reclamação"></textarea>
        </div>

        <div class="enviar" id="enviarlimpar">
            <input class="enviar" type="submit" value="Enviar" name="sub">
        </div>
    </form>
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

    <?php
    include('php/conexao.php');
    require_once 'php/adicionarFeedback.php';
    
    $u = new Usuario;
    //verificar se a pessoa clicou no btnCadastrar
    if (isset($_POST['sub'])) {

        $feedback = addslashes($_POST['feedback']);
        $idCliente = addslashes($_SESSION['idCliente']);

        //verificar se esta preenchido
        if (!empty($feedback)) {
            $u->conectar("Radix", "localhost", "root", "");
            if ($u->msgErro == "") //ta ok
            {
                if ($u->cadastrar($feedback, $idCliente)) {
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

                    $idCliente =  $_SESSION['idCliente'];

                    $sql_code2 = "SELECT * FROM tblCupom WHERE idCliente = $idCliente";
                    $sql_query2 = $mysqli->query($sql_code2) or die("Falha na exec do código SQL: ".$mysqli->error);
            
                   $quant = $sql_query2->num_rows;
            
                   $nomeCupom = 'FALE5';
                   $detalhe = 'Cupom de R$ 5,00 para todos que deram suas sugestões para nosso app, aproveite!';
                   $num = '5';
            
                    if($quant == 1){
                      $u->conectar("Radix","localhost","root","");
                      $u->cadastrarCupom($nomeCupom, $detalhe, $num, $idCliente);
                      header("Location: initial.php");
                    }else{
                      header("Location: initial.php");
                    }
                    
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