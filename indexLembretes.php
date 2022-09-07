<?php
   include('php/protectLembrete.php');
   include("php/conexao.php");
   require('php/connection.php');
   
   $consulta = "SELECT * FROM tblLembrete";

    $con = $pdo->query($consulta) or die($mysqli->error);
    $conn = $mysqli->query($consulta) or die($mysqli->error);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
        <!--<link rel="icon" type="imagem/png" href="assets/img/leafg (1).png">-->
        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!--=============== LETRA ===============-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styleIndexLembrete.css">

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--==================== UNICONS ====================-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

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

            <form action="" class="search-form">
           
                <input type="search" placeholder="Busque por item ou loja" id="search-box">
                <a href="search.html" for="search-box" class="fas fa-search"></a>
            </form>
        
        
            <form action="" class="login-form">
                <h3>login</h3>
                <input type="email" placeholder="E-mail ou usuário" class="box">
                <input type="password" placeholder="Digite sua senha" class="box">
                <div class="remember">
                    <input type="checkbox" name="" id="remember-me">
                    <label for="remember-me">Lembrar-me</label>
                </div>
                <input type="submit" value="ENTRAR" class="btn button">
                <p class="senha">Esqueceu a senha? <a href="#">Clique aqui</a></p>
                <p class="conta">Não tem uma conta? <a href="#">Crie uma</a></p>
            </form>
        </header>

         <!--=============== BODY ===============-->       

         <section class="home section" id="home">
            
            <div class="perfil">
                    <div class="perfil__data">
                        <h1 class="perfil__title">Lembretes para Reuniões, Alterações</h1>
                    </div>
                    <a href="lembrete.php" class="button  button__abrir">
                     <i class="fa fa-plus"></i> Novo Lembrete
                    </a>
            </div>
        </section>  

        <div id="cima" class="caixa__grande">
        <?php while($dado = $conn->fetch_array()){ ?>
          <div class="box esquerda">
          <a class="btn4" href="alterarLembrete.php?idLembrete=<?php echo $dado["idLembrete"]; ?>"><i class="uil uil-pen"></i></a>
            <h2><?php echo $dado["titulo"]; ?></h2>
            <p>Criado por: <?php echo $dado["criador"]; ?></p>
            <p>Data: <?php echo $dado["data"]; ?></p>
            <p>Requisitados: <?php echo $dado["requisitados"]; ?></p>
            <p>Status: 
                <?php if($dado["statusLembrete"] == 'Urgente') { ?>
                    <span style="color: red;"><?php echo $dado["statusLembrete"]; ?></span>
                <?php }else if($dado["statusLembrete"] == 'Importante') {?>
                    <span style="color: #e37712;"><?php echo $dado["statusLembrete"]; ?></span>
                <?php }else if($dado["statusLembrete"] == 'Comum') {?>
                    <span style="color: green;"><?php echo $dado["statusLembrete"]; ?></span>
                <?php }else if($dado["statusLembrete"] == 'Muito Comum'){ ?>
                    <span style="color: #1eb6e8;"><?php echo $dado["statusLembrete"]; ?></span>
                <?php } ?>
            </p>
        </div>
        <?php } ?>
    </div>

        <!--=============== FOOTER ===============-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content1">
                    <a href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>
                    
                </div>

                <div class="footer__content">
                    <a href="#" class="footer__logo">EMPRESA</a>
                    <p class="footer__description">A Radix é o seu supermercado orgânico e saudável, que conecta você ao pequeno produtor. Com entrega rápida e otimizada.</p>
                </div>

                <div class="footer__content">
                    <h1 class="footer__title">INTEGRANTES</h1>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Mateus Cintra </a></li>
                        <li><a href="#" class="footer__link">Diego Carvalho</a></li>
                        <li><a href="#" class="footer__link">Felipe Kurt</a></li>
                        <li><a href="#" class="footer__link">Bruna Amorin</a></li>
                        <li><a href="#" class="footer__link">Leonardo Moura</a></li>
                    </ul>
                </div>

               

                <div class="footer__content">
                    <h3 class="footer__title"></h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link"></a></li>
                        <li><a href="#" class="footer__link"></a></li>
                        <li><a href="#" class="footer__link"></a></li>
                    </ul>
                </div>

                <div class="footer__social">
                    <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                    <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                    <a href="#" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>
           
        </footer>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>