<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/styleLogin.css" />
  <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <title>Radix</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="#" method="POST" class="sign-in-form">
          <h2 class="title">Entrar</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="E-mail ou usuário" name="email"/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="senha"/>
          </div>
          <p class="social-text">Quer entrar ou se cadastrar como Vendedor? <br> <a href="loginVendedor.php" style="color: #84c49a"> Cique aqui</a> </p>
          <input type="submit" value="Login" class="btn solid" />
          <div class="social-media">
            
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <a href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>
        <div class="content">
          <h3>Novo por aqui ?</h3>
          <p>
            Se registre na Radix para ter acesso a nossa plataforma de compra de alimentos agrícolas.
          </p>
          <a href="cadastrar.php">
          <button class="btn transparent" id="sign-up-btn">
            Registrar-se
          </button>
          </a>
        </div>
        <img src="assets/img/Sign up-pana (1).svg" class="image img__register" alt="" />
      </div>
    </div>

    <?php
include('php/conexao.php');
require_once 'php/adicionarCupom.php';
$u = new Usuario;

if(isset($_POST['email']) || isset($_POST['senha'])){

  if(strlen($_POST['email']) == 0){
    ?>
          <div class="msg-erro">
          Preencha todos os campos!
          </div>
        <?php
  } else if(strlen($_POST['senha']) == 0){
    ?>
          <div class="msg-erro">
          Preencha todos os campos!
          </div>
        <?php
  }else{

      $email = $mysqli->real_escape_string($_POST['email']);
      $senha = $mysqli->real_escape_string($_POST['senha']);

      if($email != 'root'){
      $sql_code = "SELECT * FROM tblCliente WHERE email = '$email' AND senha = '$senha'";
      $sql_query = $mysqli->query($sql_code) or die("Falha na exec do código SQL: ".$mysqli->error);

      $quantidade = $sql_query->num_rows;

      if($quantidade == 1){

        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
          session_start();
        }

        $_SESSION['idCliente'] = $usuario['idCliente'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['cpf'] = $usuario['cpf'];

        $idCliente =  $usuario['idCliente'];

        $sql_code2 = "SELECT * FROM tblCupom WHERE idCliente = $idCliente";
        $sql_query2 = $mysqli->query($sql_code2) or die("Falha na exec do código SQL: ".$mysqli->error);

       $quant = $sql_query2->num_rows;

       $nomeCupom = 'BEMVINDO10';
       $detalhe = 'Cupom de R$ 10,00 para todos os novos usuários de nosso aplicativo, aproveite!';
       $num = '10';

        if($quant == 0){
          $u->conectar("Radix","localhost","root","");
          $u->cadastrar($nomeCupom, $detalhe, $num, $idCliente);
          header("Location: initial.php");
        }else{
          header("Location: initial.php");
        }
        

      }else{
        ?>
          <div class="msg-erro">
              Falha ao logar! E-mail ou senha incorretos.
              <p class="social-text">Esqueceu a senha? <span style="color: #783B38"> Cique aqui</span> </p>
          </div>
        <?php
       
      }
    }else{
      $sql_code = "SELECT * FROM tblAdm WHERE userAdm = '$email' AND senhaAdm = '$senha'";
      $sql_query = $mysqli->query($sql_code) or die("Falha na exec do código SQL: ".$mysqli->error);

      $quantidade = $sql_query->num_rows;

      if($quantidade == 1){

        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
          session_start();
        }

        $_SESSION['idADM'] = $usuario['idADM'];
        $_SESSION['userAdm'] = $usuario['userAdm'];

        header("Location: indexAdm.php");

      }else{
        ?>
          <div class="msg-erro">
              Verifique se a conta de administrador está inserida no banco.
          </div>
        <?php
       
      }
    }
  }
}

?>
  </div>
  <script src="assets/js/login.js"></script>
</body>

</html>