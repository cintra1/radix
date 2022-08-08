<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/styleCadastroVend.css" />
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
        <form action="#" method="POST" class="sign-up-form" enctype="multipart/form-data">
          <h2 class="title">Registrar-se</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nome do Usuário" name="nome"/>
          </div>
          <div class="input-field">
          <i class="uil uil-postcard "></i>
            <input type="text" placeholder="CPF / CNPJ" name="cpfCnpj"/>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="E-mail" name="email"/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="senha"/>
          </div>
          <div class="input-field">
          <i class="uil uil-home"></i>
            <input type="text" placeholder="Endereço" name="endereco"/>
          </div>
          
          <input type="file" name="imagem"/>
          
          <input type="submit" class="btn" value="Sign up" name="sub"/>
          <p class="social-text"></p>
          <div class="social-media">
          
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        
        <div class="content">
          <h3>Novo por aqui ?</h3>
          <p>
            Se registre na Radix para ter acesso a nossa plataforma de compra e venda de alimentos agrícolas.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Registrar-se
          </button>
        </div>
        <img src="assets/img/Sign up-pana (1).svg" class="image img__register" alt="" />
      </div>
      <div class="panel right-panel">
      <a href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>
        <div class="content">
          <h3>Já é de casa ?</h3>
          <p>
            Utilize sua conta já criada para ter acesso a nossa plataforma de compra e venda de alimentos agrícolas.
          </p>
          <a href="loginVendedor.php">
          <button class="btn transparent" id="sign-in-btn">
            Entrar
          </button>
          </a>
        </div>
        <img src="assets/img/Farm 1 house-amico.svg" class="image img__login" alt="" />
      </div>
    </div>

    <?php
include('php/conexao.php');

require_once 'php/cadastroVendedor.php';
  $u = new Usuario;
//verificar se a pessoa clicou no btnCadastrar
if(isset($_POST['sub']))
{

    $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); 
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "upload/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

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
                if($u->cadastrar($nome,$cpfCnpj,$email,$senha,$imagem,$endereco))
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