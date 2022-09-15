<?php 
include('php/protectAdm.php');
include('php/loadLembrete.php');

include('php/protectIDLembrete.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styleAlterarLembre.css">
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
        <h2 class="title">Editar Lembretes</h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa2">
            <label for="idProd">ID do Lembrete:
                <input type="text" id="idProd" name="idLembrete" value="<?php echo $_GET['idLembrete']; ?>"  readonly=“true”>
            </label>
            </div>
            <div class="caixa">
            <label for="nome">Título da Tarefa:<BR>
                <input type="text" id="nome" placeholder="Nome Produto" name="titulo" value="<?php echo $value['titulo']; ?>">
            </label>
            </div>
            <div class="caixa3">
            <label for="cr" id="cr2" >Criado por:<br>
                <input type="text"  id="cr" placeholder="Criador" name="criador" value="<?php echo $value['criador']; ?>">
            </label>

            <label for="data" id="data2">Data:<br>
                <input wrap="hard" type="date" id="data" placeholder="Detalhes Produto" name="data" value="<?php echo $value['data']; ?>">
            </label>
            </div>
            <div class="caixa">
            <label for="req" id="req2">Requisitados:
                <input id="req" type="text" id="reqValue" name="requisitados" placeholder="Requisitados" value="<?php echo $value['requisitados']; ?>">
            </div>
            </label>
            <div class="caixa">
                <!-- <input type="text" id="statusValue" placeholder="Status"> -->
                <label for="st" id="st2">Status:<Br>
                <select id="st" placeholder="Status" name="statusLembrete"> 
                    <option value="Urgente">Urgente</option>
                    <option value="Importante">Importante</option>
                    <option value="Comum">Comum</option>
                    <option value="Muito Comum">Muito comum</option>
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
require_once 'php/editarLembrete.php';
  $u = new Usuario;

//verificar se a pessoa clicou no btnCadastrar
if(isset($_POST['sub']))
{
    $idLembrete = addslashes($_GET['idLembrete']);
    $titulo = addslashes($_POST['titulo']);
    $criador = addslashes($_POST['criador']);
    $data = addslashes($_POST['data']);
    $requisitados = addslashes($_POST['requisitados']);
    $statusLembrete = addslashes($_POST['statusLembrete']);

    //verificar se esta preenchido
    if(!empty($titulo) && !empty($criador) && !empty($data) && !empty($requisitados) && !empty($statusLembrete))
    {
        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->atualizar($idLembrete, $titulo, $criador, $data, $requisitados,  $statusLembrete))
                {
                      ?>
                     <div id="msg-sucesso">
                         Atualizado com sucesso! 
                     </div>
                    <?php
                    
                }
                else
                {
                    header("Location: indexLembretes.php");
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
require_once 'php/editarLembrete.php';
  $u = new Usuario;
if(isset($_POST['del']))
{
    $idLembrete = addslashes($_GET['idLembrete']);

        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->deletar($idLembrete))
                {
                      ?>
                     <div id="msg-sucesso">
                         Deletado com sucesso!
                     </div>
                    <?php
                    
                }
                else
                {
                    header("Location: indexLembretes.php");
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