<?php 
include('php/protectVend.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styleAlterar.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <title>Radix</title>
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
    
    <div class="caixa__grande">
        <h2 class="title"> <a href="indexVendedor.php" style="color: #70C28D;">Home Vendedor </a> > Editar Perfil </h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa">
                <input name="nomeVend" type="text" id="nomeValue" value="<?php echo $_SESSION['nomeVend']; ?>">
                <input name="cpfCnpj" type="text" id="empValue" value="<?php echo $_SESSION['cpfCnpj']; ?>">
            </div>
            <div class="caixa__div">
                <input name="emailVend" type="text" id="creatorValue" value="<?php echo $_SESSION['emailVend']; ?>">
                <input name="enderecoVend" type="text" id="dateValue" value="<?php echo $_SESSION['enderecoVend']; ?>">
            </div>
            <div class="caixa__alt">
                <input name="senhaVend" type="text" id="reqValue" value="<?php echo $_SESSION['senhaVend']; ?>">
                <input id='img' name="imagemVend" type="file" value="<?php echo $_SESSION['imagemVend']; ?>">
                <label for='img'>ALTERAR FOTO</label>
            </div>
            <div class="btns">
                <input type="submit" class="btn3" value="Limpar Campos" name="sub" style="visibility: hidden;"/>
                <input type="submit" class="btn2" value="Alterar Dados" name="sub"/>
            </div>
        </form> 
       
    </div>
</form>

<?php

include('php/conexao.php');
require_once 'php/editarVendedor.php';
  $u = new Usuario;

//verificar se a pessoa clicou no btnCadastrar
if(isset($_POST['sub']))
{

    $extensao = strtolower(substr($_FILES['imagemVend']['name'], -4)); 
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "upload/";

    move_uploaded_file($_FILES['imagemVend']['tmp_name'], $diretorio.$novo_nome);

    $idVendedor = addslashes($_SESSION['idVendedor']);
    $nomeVend = addslashes($_POST['nomeVend']);
    $cpfCnpj = addslashes($_POST['cpfCnpj']);
    $emailVend = addslashes($_POST['emailVend']);
    $senhaVend = addslashes($_POST['senhaVend']);
    $imagemVend = $novo_nome;
    $enderecoVend = addslashes($_POST['enderecoVend']);

    //verificar se esta preenchido
    if(!empty($nomeVend) && !empty($cpfCnpj) && !empty($emailVend) && !empty($senhaVend) && !empty($imagemVend) && !empty($enderecoVend))
    {
        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->atualizar($idVendedor,$nomeVend,$cpfCnpj,$emailVend,$senhaVend,$imagemVend,$enderecoVend))
                {
                      ?>
                     <div id="msg-sucesso">
                         Atualizado com sucesso!
                     </div>
                    <?php
                }
                else
                {
                    $emailVend = $mysqli->real_escape_string($_POST['emailVend']);
                    $senhaVend = $mysqli->real_escape_string($_POST['senhaVend']);
              
                    $sql_code = "SELECT * FROM tblVendedor WHERE emailVend = '$emailVend' AND senhaVend = '$senhaVend'";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na exec do código SQL: ".$mysqli->error);
              
                    $usuario = $sql_query->fetch_assoc();
              
                      if(!isset($_SESSION)){
                        session_start();
                      }
              
                      $_SESSION['idVendedor'] = $usuario['idVendedor'];
                      $_SESSION['nomeVend'] = $usuario['nomeVend'];
                      $_SESSION['cpfCnpj'] = $usuario['cpfCnpj'];
                      $_SESSION['emailVend'] = $usuario['emailVend'];
                      $_SESSION['senhaVend'] = $usuario['senhaVend'];
                      $_SESSION['imagemVend'] = $usuario['imagemVend'];
                      $_SESSION['enderecoVend'] = $usuario['enderecoVend'];
              
                      
                      header("Location: indexVendedor.php");
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