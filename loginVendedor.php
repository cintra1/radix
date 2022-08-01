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
          <p class="social-text">Esqueceu a senha? <span style="color: #84C49A"> Cique aqui</span> </p>
          <input type="submit" value="Login" class="btn solid" />
          <div class="social-media">
            
          </div>
        </form>
        <form action="#" method="POST" class="sign-up-form">
          <h2 class="title">Registrar-se</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nome do Usuário" name="nome"/>
          </div>
          <div class="input-field">
          <i class="uil uil-postcard "></i>
            <input type="text" placeholder="CPF" name="cpf"/>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="E-mail" name="email"/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="senha"/>
          </div>
          <input type="submit" class="btn" value="Sign up" />
          <p class="social-text"></p>
          <div class="social-media">
          
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <a href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>
        <div class="content">
          <h3>Quer começar a vender conosco ?</h3>
          <p>
            Se registre na Radix para ter acesso a nossa plataforma para venda de seus produtos agrícolas.
          </p>
          <a href="cadastrarVendedor.php">
          <button class="btn transparent" id="sign-up-btn">
            Registrar-se
          </button>
          </a>
        </div>
        <img src="assets/img/Farmer 2 -cuate.svg" class="image img__register" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Já é vendedor de casa ?</h3>
          <p>
            Utilize sua conta já criada para ter acesso a nossa plataforma de venda de alimentos agrícolas.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Entrar
          </button>
        </div>
        <img src="assets/img/Farmer 1 -cuate.svg" class="image img__login" alt="" />
      </div>
    </div>

    <?php
include('php/conexao.php');

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

      $sql_code = "SELECT * FROM tblCliente WHERE email = '$email' AND senha = '$senha'";
      $sql_query = $mysqli->query($sql_code) or die("Falha na exec do código SQL: ".$mysqli->error);

      $quantidade = $sql_query->num_rows;

      if($quantidade == 1){

        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)){
          session_start();
        }

        $_SESSION['idVendedor'] = $usuario['idVendedor'];
        $_SESSION['nome'] = $usuario['nome'];

        
        header("Location: indexVendedor.php");
        
        

      }else{
        ?>
          <div class="msg-erro">
              Falha ao logar! E-mail ou senha incorretos.
              
          </div>
        <?php
       
      }
  }
}

?>
  </div>
  <script src="assets/js/login.js"></script>
</body>

</html>