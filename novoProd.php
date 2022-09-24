<?php
include('php/protectVend.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylesNovoProduto.css">
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
        <h2 class="title">Home Vendedor > Editar Produtos > Novo Produto</h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa">
                <input type="text" id="taskValue" placeholder="Nome Produto" name="nomeProd">
                <input type="text" id="recValue" placeholder="Preço" name="preco">
            </div>
            <div>
                <input type="text" id="reqValue" placeholder="Detalhes Produto" name="detalhe">
            </div>
            <div class="baixo__vend">
                <input id='img' name="imagem" type="file">
                <label for='img'>ADICIONAR FOTO</label>
                <input type="submit" class="btn3" value="Limpar Campos" name="sub" />
                <input type="submit" class="btn2" value="Adicionar Produto" name="sub">
            </div>
        </form>

    </div>

    <?php
    include('php/conexao.php');

    require_once 'php/adicionarProd.php';
    $u = new Usuario;
    //verificar se a pessoa clicou no btnCadastrar
    if (isset($_POST['sub'])) {

        $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "upload/";

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);

        $nomeProd = addslashes($_POST['nomeProd']);
        $preco = addslashes($_POST['preco']);
        $detalhe = addslashes($_POST['detalhe']);
        $idVendedor = addslashes($_SESSION['idVendedor']);
        $foto = $novo_nome;
        $statusProduto = '1';

        //verificar se esta preenchido
        if (!empty($nomeProd) && !empty($preco) && !empty($detalhe) && !empty($idVendedor)) {
            $u->conectar("Radix", "localhost", "root", "");
            if ($u->msgErro == "") //ta ok
            {
                if ($u->cadastrar($nomeProd, $preco, $foto, $detalhe, $idVendedor, $statusProduto)) {
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
                    header("Location: produtos.php");
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