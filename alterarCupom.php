<?php 
include('php/protectAdm.php');
include('php/loadCupom.php');
include('php/protectIDCupom.php');
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
        <h2 class="title">Administração > Editar Cupons > Alterar Cupom</h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa2">
            <label for="idProd">ID do Cupom:
                <input type="text" id="idProd" name="idCupom" value="<?php echo $_GET['idCupom']; ?>"  readonly=“true”>
            </label>
            </div>
            <div class="caixa">
            <label for="nome">Nome do Cupom:<BR>
                <input type="text" id="nome" placeholder="Nome Produto" name="nomeCupom" value="<?php echo $value['nomeCupom']; ?>">
            </label>
            <label for="preco" id="preco">Valor (Utilizar . ):
                <input type="text"  placeholder="Preço" name="num" value="<?php echo $value['num']; ?>">
            </label>
            </div>
            <div class="caixa3">
            <label for="detalhe">Detalhes :
                <input wrap="hard" type="text" id="detalhe" placeholder="Detalhes Produto" name="detalhe" value="<?php echo $value['detalhe']; ?>">
            </label>
            </div>
            <div class="baixo__vend" style="text-align: start;"> 
                <input type="submit" class="btn3" value="Deletar Cupom" name="del" style="margin-left: -3rem"/>
                <input type="submit" class="btn2" value="Alterar Cupom" name="sub">
            </div>
            <div class="result"></div>
    </form> 
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/alterarProd.js"></script>

<?php

include('php/conexao.php');
require_once 'php/editarCupom.php';
  $u = new Usuario;

//verificar se a pessoa clicou no btnCadastrar
if(isset($_POST['sub']))
{

    $idCupom = addslashes($_GET['idCupom']);
    $nomeCupom = addslashes($_POST['nomeCupom']);
    $num = addslashes($_POST['num']);
    $detalhe = addslashes($_POST['detalhe']);


    //verificar se esta preenchido
    if(!empty($nomeCupom) && !empty($num) && !empty($detalhe))
    {
        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->atualizar($idCupom, $nomeCupom, $detalhe, $num))
                {
                      ?>
                     <div id="msg-sucesso">
                         Atualizado com sucesso! 
                     </div>
                    <?php
                    
                }
                else
                {
                    header("Location: indexCupom.php");
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
require_once 'php/editarCupom.php';
  $u = new Usuario;
if(isset($_POST['del']))
{
    $idCupom = addslashes($_GET['idCupom']);

        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->deletar($idCupom))
                {
                      ?>
                     <div id="msg-sucesso">
                         Deletado com sucesso!
                     </div>
                    <?php
                    
                }
                else
                {
                    header("Location: indexCupom.php");
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