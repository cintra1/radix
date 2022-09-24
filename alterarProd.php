<?php 
include('php/protectVend.php');
include('php/load.php');

include('php/protectIDProd.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styleAlterarProd.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <title>Radix</title>
    
    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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

            <a href="app.html" class="button button__header">LOGOUT</a>
        </nav>
    </header>

    <div class="caixa__grande">
        <h2 class="title">Home Vendedor > Editar Produtos > Alterar Produto</h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa2">
            <label for="idProd">ID do Produto:
                <input type="text" id="idProd" name="idProduto" value="<?php echo $_GET['idProduto']; ?>"  readonly=“true”>
            </label>
            </div>
            <div class="caixa">
            <label for="nome">Nome:<BR>
                <input type="text" id="nome" placeholder="Nome Produto" name="nomeProd" value="<?php echo $value['nomeProd']; ?>">
            </label>
            <label for="preco" id="preco">Preço (Utilizar . ):
                <input type="text"  placeholder="Preço" name="preco" value="<?php echo $value['preco']; ?>">
            </label>
            </div>
            <div class="caixa3">
            <label for="detalhe">Detalhes :
                <input wrap="hard" type="text" id="detalhe" placeholder="Detalhes Produto" name="detalhe" value="<?php echo $value['detalhe']; ?>">
            </label>
            </div>
            <div class="baixo__vend"> 
                <input id='img' name="foto" type="file">
                <label for='img' class="label__img">ADICIONAR FOTO</label>
                <input type="submit" class="btn3" value="Desativar Produto" name="del"/>
                <input type="submit" class="btn2" value="Alterar Produto" name="sub">
            </div>
            <div class="result"></div>
    </form> 
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/alterarProd.js"></script>

<?php

include('php/conexao.php');
require_once 'php/editarProduto.php';
  $u = new Usuario;

//verificar se a pessoa clicou no btnCadastrar
if(isset($_POST['sub']))
{

    $extensao = strtolower(substr($_FILES['foto']['name'], -4)); 
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "upload/";

    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);

    $idProduto = addslashes($_GET['idProduto']);
    $nomeProd = addslashes($_POST['nomeProd']);
    $preco = addslashes($_POST['preco']);
    $foto = $novo_nome;
    $detalhe = addslashes($_POST['detalhe']);
    $idVendedor = addslashes($_SESSION['idVendedor']);

    //verificar se esta preenchido
    if(!empty($nomeProd) && !empty($preco) && !empty($detalhe) && !empty($foto))
    {
        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->atualizar($idProduto, $nomeProd, $preco, $foto, $detalhe))
                {
                      ?>
                     <div id="msg-sucesso">
                         Atualizado com sucesso! 
                     </div>
                    <?php
                    
                }
                else
                {
                    header("Location: produtos.php");
                }
        }
        else
        {
            ?>
             <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
                </div>
            <?php
            
        }
    }
    else
    {
        ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
        <?php
        
    }
}

?>

<?php

include('php/conexao.php');
require_once 'php/editarProduto.php';
  $u = new Usuario;
if(isset($_POST['del']))
{
    $idProduto = addslashes($_GET['idProduto']);
    $statusProduto = '0';

        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->deletar($idProduto, $statusProduto))
                {
                      ?>
                     <div id="msg-sucesso">
                         Deletado com sucesso!
                     </div>
                    <?php
                    
                }
                else
                {
                    header("Location: produtos.php");
                }
        }
        else
        {
            ?>
             <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
                </div>
            <?php
            
        }
    }

    ?>

</body>
</html>