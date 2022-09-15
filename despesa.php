<?php
include('php/protectAdm.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styleDespesas.css">
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
        <h2 class="title">Nova Despesa</h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa">
                <input type="text" id="taskValue" placeholder="Descrição" name="descricao">
            </div>
            <div class="caixa__div">
                <input type="text" id="creatorValue" placeholder="Conta" name="conta">
                <input type="date" id="dateValue" placeholder="Data" name="dia">
            </div>
            <div>
                <input type="text" id="reqValue" placeholder="Valor" name="valor">
            </div>
            <div>
                <select id="statusValue" placeholder="Situação" name="situacao">
                    <option value="Não Pago" style="color: red;"> Não Pago </option>
                    <option value="Pago" style="color: green;"> Pago </option>
                </select>
            </div>

            <button type="submit" id="addBtn" class="btn" name="sub"> <i class="fa fa-plus"></i> Criar Despesa </button>
        </form>
    </div>

    <?php
    include('php/conexao.php');

    require_once 'php/adicionarDespesa.php';
    $u = new Usuario;
    //verificar se a pessoa clicou no btnCadastrar
    if (isset($_POST['sub'])) {

        $descricao = addslashes($_POST['descricao']);
        $conta = addslashes($_POST['conta']);
        $valor = addslashes($_POST['valor']);
        $dia = addslashes($_POST['dia']);
        $idAdm = addslashes($_SESSION['idADM']);
        $situacao = addslashes($_POST['situacao']);

        //verificar se esta preenchido
        if (!empty($descricao) && !empty($conta) && !empty($valor) && !empty($dia) && !empty($situacao)) {
            $u->conectar("Radix", "localhost", "root", "");
            if ($u->msgErro == "") //ta ok
            {
                if ($u->cadastrar($dia, $descricao, $valor, $conta, $situacao, $idAdm)) {
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
                    header("Location: indexPagamentos.php");
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>