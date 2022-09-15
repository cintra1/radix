<?php 
include('php/protectAdm.php');
include('php/loadDespesa.php');

include('php/protectIDDespesa.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylesAlterarDesp.css">
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
        <h2 class="title">Editar Despesa</h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa2">
            <label for="idProd">ID da Despesa:
                <input type="text" id="idDespesas" name="idDespesas" value="<?php echo $_GET['idDespesas']; ?>"  readonly=“true”>
            </label>
            </div>
            <div class="caixa">
            <label for="nome">Descrição:<BR>
                <input type="text" id="desc" placeholder="Descrição da Despesa" name="descricao" value="<?php echo $value['descricao']; ?>">
            </label>
            </div>
            <div class="caixa3">
            <label for="cr" id="cr2" >Conta:<br>
                <input type="text"  id="cr" placeholder="Conta utilizada" name="conta" value="<?php echo $value['conta']; ?>">
            </label>

            <label for="data" id="data2">Data:<br>
                <input wrap="hard" type="date" id="data" placeholder="Data da Despesa" name="dia" value="<?php echo $value['dia']; ?>">
            </label>
            </div>
            <div class="caixa">
            <label for="req" id="req2">Conta:<br>
                <input id="req" type="text" id="reqValue" name="valor" placeholder="Valor da Despesa" value="<?php echo $value['valor']; ?>">
            </div>
            </label>
            <div class="caixa">
                <!-- <input type="text" id="statusValue" placeholder="Status"> -->
                <label for="st" id="st2">Situação:<Br>
                <select id="st" placeholder="Situação da Despesa" name="situacao">
                    <?php if($value['situacao']=="Pago"){ ?>
                    <option value="<?php echo $value['situacao']; ?>"><?php echo $value['situacao']; ?></option> 
                    <option value="Não Pago">Não Pago</option>
                    <?php } else {?>
                    <option value="<?php echo $value['situacao']; ?>"><?php echo $value['situacao']; ?></option> 
                    <option value="Pago">Pago</option>
                    <?php }?>
                </select>
                </label>
            </div>

            <div class="baixo__vend"> 
                <input type="submit" class="btn3" value="Excluir Lembrete" name="del"/>
                <input type="submit" class="btn2" value="Alterar Lembrete" name="sub">
            </div>
            <div class="result"></div>
    </form> 
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/alterarProd.js"></script>

<?php

include('php/conexao.php');
require_once 'php/editarDespesas.php';
  $u = new Usuario;

//verificar se a pessoa clicou no btnCadastrar
if(isset($_POST['sub']))
{
    $idDespesas = addslashes($_GET['idDespesas']);
    $descricao = addslashes($_POST['descricao']);
    $valor = addslashes($_POST['valor']);
    $dia = addslashes($_POST['dia']);
    $conta = addslashes($_POST['conta']);
    $situacao = addslashes($_POST['situacao']);

    //verificar se esta preenchido
    if(!empty($descricao) && !empty($valor) && !empty($dia) && !empty($conta) && !empty($situacao))
    {
        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->atualizar($idDespesas, $descricao, $valor, $dia, $conta,  $situacao))
                {
                      ?>
                     <div id="msg-sucesso">
                         Atualizado com sucesso! 
                     </div>
                    <?php
                    
                }
                else
                {
                    header("Location: indexPagamentos.php");
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

</body>
</html>