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

            <a href="app.html" class="button button__header">LOGOUT</a>
        </nav>
    </header>
    
    <div class="caixa__grande">
        <h2 class="title">Home Vendedor > Editar Perfil </h2>
        <form action="#" method="POST" class="alter-form" enctype="multipart/form-data">
            <div class="caixa">
                <input name="nome" type="text" id="nomeValue" value="<?php echo $_SESSION['nome']; ?>">
                <input name="cpfCnpj" type="text" id="empValue" value="<?php echo $_SESSION['cpfCnpj']; ?>">
            </div>
            <div class="caixa__div">
                <input name="email" type="text" id="creatorValue" value="<?php echo $_SESSION['email']; ?>">
                <input name="endereco" type="text" id="dateValue" value="<?php echo $_SESSION['endereco']; ?>">
            </div>
            <div class="caixa__alt">
                <input name="senha" type="text" id="reqValue" value="<?php echo $_SESSION['senha']; ?>">
                <input id='img' name="imagem" type="file" value="<?php echo $_SESSION['imagem']; ?>">
                <label for='img'>ALTERAR FOTO</label>
            </div>
            <div class="btns">
                <input type="submit" class="btn3" value="Limpar Campos" name="sub"/>
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

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); 
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "upload/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

    $idVendedor = addslashes($_SESSION['idVendedor']);
    $nome = addslashes($_POST['nome']);
    $cpfCnpj = addslashes($_POST['cpfCnpj']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $imagem = $novo_nome;
    $endereco = addslashes($_POST['endereco']);

    //verificar se esta preenchido
    if(!empty($nome) && !empty($cpfCnpj) && !empty($email) && !empty($senha) && !empty($imagem) && !empty($endereco))
    {
        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->atualizar($idVendedor,$nome,$cpfCnpj,$email,$senha,$imagem,$endereco))
                {
                      ?>
                     <div id="msg-sucesso">
                         Atualizado com sucesso!
                     </div>
                    <?php
                }
                else
                {
                    $email = $mysqli->real_escape_string($_POST['email']);
                    $senha = $mysqli->real_escape_string($_POST['senha']);
              
                    $sql_code = "SELECT * FROM tblVendedor WHERE email = '$email' AND senha = '$senha'";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na exec do código SQL: ".$mysqli->error);
              
              
                    $usuario = $sql_query->fetch_assoc();
              
                      if(!isset($_SESSION)){
                        session_start();
                      }
              
                      $_SESSION['idVendedor'] = $usuario['idVendedor'];
                      $_SESSION['nome'] = $usuario['nome'];
                      $_SESSION['cpfCnpj'] = $usuario['cpfCnpj'];
                      $_SESSION['email'] = $usuario['email'];
                      $_SESSION['senha'] = $usuario['senha'];
                      $_SESSION['imagem'] = $usuario['imagem'];
                      $_SESSION['endereco'] = $usuario['endereco'];
              
                      
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