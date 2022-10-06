<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/styleCadastro.css" />
  <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <title>Radix</title>
</head>

<body>
  <div class="container sign-up-mode">
    <div class="forms-container">
      <div class="signin-signup">

       
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
          <input type="submit" class="btn" value="Sign up" name="sub" />
          <p class="social-text"></p>
          <div class="social-media">
          
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel" style="display:unset;">
        
        <div class="content">
          <h3>Novo por aqui ?</h3>
          <p>
            Se registre na Radix para ter acesso a nossa plataforma de compra e venda de alimentos agrícolas.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Registrar-se
          </button>
        </div>
        <img src="assets/img/Sign up-pana (1).svg" class="image img__register" alt="" style="display:unset;"/>
      </div>
      <div class="panel right-panel">
      <a href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>
        <div class="content">
          <h3>Já é de casa ?</h3>
          <p>
            Utilize sua conta já criada para ter acesso a nossa plataforma de compra de alimentos agrícolas.
          </p>
          <a href="login.php">
          <button class="btn transparent" id="sign-in-btn">
            Entrar
          </button>
          </a>
        </div>
        <img src="assets/img/Tablet login-pana (1).svg" class="image img__login" alt="" />
      </div>
    </div>

    <?php
include('php/conexao.php');

require_once 'php/cadastro.php';
  $u = new Usuario;
//verificar se a pessoa clicou no btnCadastrar
if(isset($_POST['sub']))
{
    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $statusConta = '1';

    //verificar se esta preenchido
    if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($senha))
    {
        $u->conectar("Radix","localhost","root","");
        if($u->msgErro == "")//ta ok
        {
                if($u->cadastrar($nome,$cpf,$email,$senha,$statusConta))
                {
                    ?>
                     <div id="msg-sucesso">
                         Cadastrado com sucesso!
                     </div>
                    <?php
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            Email ja cadastrado!
                        </div>
                    <?php
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
  </div>
  <script src="assets/js/cadastrar.js"></script>
</body>

</html>