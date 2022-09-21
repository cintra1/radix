<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <!--<link rel="icon" type="imagem/png" href="assets/img/leafg (1).png">-->
    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/stylesInitial.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">



    <title>Radix</title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav nav__container">

            <nav class="navbar">
                <a href="initial.php">Home</a>
                <a href="#packages">Produtores</a>
                <a href="#services">Frutas</a>
                <a href="#pricing">Vegetais</a>
                <a href="#review">Especiarias</a>
            </nav>

            <a href="initial.html" class="nav__logo first"> <i class="fa fa-leaf"></i>Radix</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list__initial">
                <div></div>
                    <form action="" class="search-form">
                        <input id="enter" type="search" placeholder="busque por produtor ou item..." id="search-box">
                        <a href="search.html">
                            <label for="search-box" class="fas fa-search"></label></a>
                    </form>

                    <div class="nav__icon">
                        
                        
                            <div class="fas fa-search" id="search-btn" style="display: none"></div>
                       
                        
                        <li class="nav__item">
                            <div id="cart-btn" class="uil uil-shopping-bag nav__link"></div>
                        </li>

                        <li class="nav__item">
                            <a href="login.php" class="fas fa-user nav__link"></a>
                            <!--<div id="login-btn" class="fas fa-user nav__link"></div>-->
                        </li>

                        <li class="nav__item">
                            <a href="logout.php" class="uil uil-signout nav__link"  style="font-size: 1.2rem !important"></a>
                
                            <!--<div id="login-btn" class="fas fa-user nav__link"></div>-->
                        </li>
                        <li class="nav__item">
                            <div class="fas fa-bars nav__link" id="menu-btn"></div>
                        </li>
                    </div>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>


        </nav>



        <div class="shopping-cart">
            <div class="box">
                <i class="fas fa-times"></i>
                <img src="assets/img/cart-1.jpg" alt="">
                <div class="content">
                    <h3>Brócolis</h3>
                    <span class="quantity">1</span>
                    <span class="multiply">x</span>
                    <span class="price">R$2.50</span>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-times"></i>
                <img src="assets/img/cart-2.jpg" alt="">
                <div class="content">
                    <h3>Leite - 0 lactose</h3>
                    <span class="quantity">1</span>
                    <span class="multiply">x</span>
                    <span class="price">R$6.99</span>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-times"></i>
                <img src="assets/img/cart-3.jpg" alt="">
                <div class="content">
                    <h3>Trigo</h3>
                    <span class="quantity">1</span>
                    <span class="multiply">x</span>
                    <span class="price">R$15.00</span>
                </div>
            </div>
            <h3 class="total"> Total : <span>56.97</span> </h3>
            <a href="#" class="btn">Finalizar Compra</a>
        </div>

    </header>

    <main class="main initial__home">

        <!--=============== HOME ===============-->
        <section class="home" id="home">
            <div class="svg">
                <div class="initial__container grid">
                    <div class="content">
                        <h3><span>orgânicos frescos<br></span>  na sua mão com até<br> 50% de economia</h3>
                        <p>Nós levamos seu orgânico com qualidade radix que você já conhece, sem <br>
                            taxa de adesão e com frete grátis. Incrível, não?</p>
                        
                    </div>
                    <div class="boxin">
                        <select name="" id="">
                            <option value="">Escolha uma cesta...</option>
                            <option value="">Cesta Júnior</option>
                            <option value="">Cesta Normal</option>
                            <option value="">Cesta Jumbo</option>
                        </select>
                        <a href="" class="button3">Faça sua cesta</a>
                        </div>
                </div>
            </div>
        </section>

        <div class="invisivel">
                <div class="box__inv">
                    <div class="content2">
                        <h3><span>orgânicos frescos<br></span>  na sua mão com até<br> 50% de economia</h3>
                        <p>Nós levamos seu orgânico com qualidade radix que você já conhece, sem <br>
                            taxa de adesão e com frete grátis. Incrível, não?</p>
                    </div>
                <a href="" class="button3">Faça sua cesta</a>
                </div>
        </div>

        <section class="feature section-p1">
            <div class="f__box">
                <img src="assets/img/solo.png" style="width: 150px;" alt="">
                <p>Cesta Júnior</p>
                <h6>Ideal para uma pessoa.</h6>
            </div>

            <div class="f__box">
                <img src="assets/img/casal.png" style="width: 150px;" alt="">
                <p>Cesta Normal</p>
                <h6>Ideal para um casal.</h6>
            </div>

            <div class="f__box">
                <img src="assets/img/family.png" style="width: 150px;" alt="">
                <p>Cesta Jumbo</p>
                <h6>Ideal para uma família.</h6>
            </div>

            
            </div>
        </section>

        <section class="produtos1 section-p1">
            <h2>Produtos em Destaques</h2>
            <p>Itens mais amados entre nossos clientes</p>
            <div class="prod__container">
                <div class="prod">
                    <img src="assets/img/products/p1.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Pimentão Amarelo</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p2.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Pepino</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$15,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p3.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Tomate</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$12,99</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p4.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Gengibre</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$3,50</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p5.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Repolho</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$5,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p6.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Couve Flor</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$8,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p7.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cenoura</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$7,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p8.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Rúcula</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$10,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </section>

        <section class="banner section-m1">
            <h4>qualidade radix</h4>
            <h2>Diversidade de frutas e vegetais <span> orgânicos </span> direto do campo toda semana </h2>
            <span>Nossos vendedores são produtores conectados diretamente a você.</span>
            <a href="sobre.html"><button class="normal">Conheça mais</button></a>
        </section>

        <section class="produtos1 section-p1">
            <h2>Novos produtos</h2>
            <p>Seja o primeiro a experimentar esses produtos</p>
            <div class="prod__container">
                <div class="prod">
                    <img src="assets/img/products/p8.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p7.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p6.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p5.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p4.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p3.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p7.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>

                <div class="prod">
                    <img src="assets/img/products/p8.png" alt="">
                    <div class="des">
                        <span>Produtor: Luiz Ricardo</span>
                        <h5>Cartoon AStronaut tshirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>R$70,00</h4>
                    </div>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </section>

        <section class="sm section-p1">
            <div class="banner__box">
                <h4>confiança radix</h4>
                <h2>produtos frescos e maduros</h2>
                <span>qualidade radix como você já conhece</span>
                <a href="sobre.html"><button class="white">Saiba mais</button></a>
            </div>

            <div class="banner__box b2">
                <h4>produtores ativos</h4>
                <h2>novos produtos todos os dias</h2>
                <span>os melhores produtores da sua região em nosso aplicativo</span>
                <a href="sobre.html"><button class="white">Saiba mais</button></a>
            </div>
        </section>

        <section class="banner3">
            <div class="banner__box">
                <h2>DESCONTOS DE INVERNO</h2>
                <h3>Só no inverno - 50% off</h3>
            </div>

            <div class="banner__box b2">
                <h2>CONSUMO CONSCIENTE</h2>
                <h3>Compre produtos<br> conforme seu consumo.</h3>
            </div>

            <div class="banner__box b3">
                <h2>Qualidade e Rapidez</h2>
                <h3>Somente na radix.</h3>
            </div>
        </section>

        <div class="alinhar"><div id="linha-horizontal"></div></div>

        <!--=============== FOOTER ===============-->
        <footer class="section-p1">
            <div class="col">
                <a href="index.html" class="nav__logo logo"> <i class="fa fa-leaf" style="color: #70C28D;"></i> Radix </a>
                <h4>Contato</h4>
                <p><strong>Endereço:</strong> Rua ABC, 300</p>
                <p><strong>Telefone:</strong> +55 (11) 91111-5555</p>
                <p><strong>Horas:</strong> 10:00 - 18:00, Segunda a Sexta</p>
                <div class="follow">
                    <h4>Nos siga</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-pinterest-p"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>

            <div class="col">
                <h4>Sobre</h4>
                <a href="#">Sobre nós</a>
                <a href="#">Informações sobre entrega</a>
                <a href="#">Política de privacidade</a>
            </div>

            <div class="col">
                <h4>Minha Conta</h4>
                <a href="#">Fazer Login</a>
                <a href="#">Carrinho</a>
                <a href="#">Ajuda</a>
            </div>

            <div class="col install">
                <h4>Baixar App</h4>
                <p>Baixar da App Store ou Google Play</p>
                <div class="row">
                    <img src="assets/img/pay/app.jpg" alt="">
                    <img src="assets/img/pay/play.jpg" alt="">
                </div>  
                <p>Gateways de Pagamento Seguros</p>  
                <img src="assets/img/pay/pay.png" alt="">
            </div>

            <div class="copyright">
                <p>© Copyright 2021 - Radix - Todos os direitos reservados Radix com Agência de Restaurantes Online S.A.</p>
            </div>
        </footer>
        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!--=============== MAIN JS ===============-->
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <script src="assets/js/mainInitial.js"></script>
</body>

</html>