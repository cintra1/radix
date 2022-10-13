<?php
include('php/protectAdm.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylesCupom.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
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

    <div class="caixa__grande">
        <h2 class="title">Emitir Cupom</h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa__div1">
                <input type="text" id="idValue" placeholder="ID do Cliente" name="idCliente">
            </div>
            <div class="caixa__div">
                <input type="text" id="creatorValue" placeholder="Cupom" name="nomeCupom">
                <input type="text" id="dateValue" placeholder="Desconto" name="num">
            </div>
            <div>
                <input type="text" id="detValue" placeholder="Detalhes sobre o Cupom" name="detalhe">
            </div>
            <button type="submit" id="addBtn" class="btn" name="sub"> <i class="fa fa-plus"></i> Emitir </button>
        </form>
    </div>

    <?php
    include('php/conexao.php');

    require_once 'php/adicionarCupom.php';
    $u = new Usuario;
    //verificar se a pessoa clicou no btnCadastrar
    if (isset($_POST['sub'])) {

        $nomeCupom = addslashes($_POST['nomeCupom']);
        $detalhe = addslashes($_POST['detalhe']);
        $num = addslashes($_POST['num']);
        $idCliente= addslashes($_POST['idCliente']);

        //verificar se esta preenchido
        if (!empty($nomeCupom) && !empty($detalhe) && !empty($num) && !empty($idCliente)) {
            $u->conectar("Radix", "localhost", "root", "");
            if ($u->msgErro == "") //ta ok
            {
                if ($u->cadastrar($nomeCupom, $detalhe, $num, $idCliente)) {
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
                    header("Location: indexCupom.php");
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