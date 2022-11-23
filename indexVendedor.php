<?php
include('php/protectVend.php');
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
    <link rel="stylesheet" href="assets/css/stylesVendedor.css">

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
            <a id="radix" href="index.html" class="nav__logo"> <i class="fa fa-leaf"></i> Radix </a>


            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">

                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

            <a href="php/logout.php" class="button button__header">LOGOUT</a>

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

            <div class="circle__prod">
                <!--<img class="img__Perfil" src="assets/img/bombom.jpg" alt="">-->
                <img class="img__Perfil" src="upload/<?php echo $_SESSION['imagemVend']; ?>" alt="">
            </div>

            <div class="perfil__data">
                <h1 class="perfil__title">bem vindo <?php echo $_SESSION['nomeVend']; ?> !</h1>
                <p class="status">Status: <?php
                                            if ($_SESSION['statusConta'] == 1) {
                                            ?> Conta Ativada <?php
                                                            } else {
                                                                ?> Conta Desativada (Verifique as políticas de nosso aplicativo) <?php
                                                                                                                } ?></p>

            </div>
        </div>
    </section>
    <div id="cima">
        <a href="pedidos.php">
            <div id="um">
                <h2>Pedidos abertos</h2>
        </a>
    </div>

    <div id="dois">
        <a href="pedidos.php#finalizados">
            <h2>Pedidos finalizados</h2>
        </a>
    </div>

    <a href="produtos.php">
        <div id="tres">
            <h2> Meus produtos</h2>
        </div>
    </a>
    </div>

    <div id="baixo">

        <a href="alterarVend.php">
            <div id="quatro">
                <h2>Editar perfil</h2>
            </div>
        </a>

        <a href="selo.php">
        <div id="cinco">
            <h2>Selo de Produtor</h2>
        </div>
        </a>

        <a href="gastosVendedor.php">
        <div id="seis">
            <h2>Gastos semanais</h2>
        </div>
        </a>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>

</html>