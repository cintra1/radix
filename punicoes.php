<?php 
include('php/conexao.php');
require('php/connection.php');
include('php/protectAdm.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylePuni.css">
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
        <h2 class="title"><a href="indexAdm.php" style="color: #70C28D;">Aréa De Admnistração </a> >Aplicar Punições</h2>
        <form action="#" method="POST">
    
            <div class="inputFields">
            <p> Nome do vendedor:</p>
            <select name="idVendedor" class="nomeV">
                <option>Selecione</option>
                <?php  
                $result_vend = "SELECT * FROM tblVendedor where statusConta = 1";
                $result_vend = mysqli_query( $mysqli, $result_vend);

                while($row_vend = mysqli_fetch_assoc($result_vend)) { ?>
                <option value="<?php echo $row_vend['idVendedor'];?>" ><?php echo $row_vend['nomeVend'];?>
                </option><?php
                }
                        
                ?>
            </select>
                    
            <div class="caixa__div">
                    <input type="text" id="statusValue" placeholder="Tipo de punição" name ="tipo">
                    <input type="text" id="assValue" placeholder="Motivo:" name="motivo">
            </div>
            <div>
                <input type="text" id="reqValue" placeholder="Assunto:" name="assunto">
            </div>
                
            <button type="submit" name ="puni" id="addBtn" class="btn1"> <i class="fa fa-plus"></i> Enviar Punição </button>

            </div> 

        </form>
    </div>
        
    <?php
    include('php/conexao.php');
    require_once 'php/adicionarPunicao.php';
    
    $u = new Usuario;
    //verificar se a pessoa clicou no btnCadastrar
    if (isset($_POST['puni'])) {

        $idVendedor = addslashes($_POST['idVendedor']);
        $tipo = addslashes($_POST['tipo']);
        $motivo = addslashes($_POST['motivo']);
        $assunto = addslashes($_POST['assunto']);

        //verificar se esta preenchido
        if (!empty($tipo) && ($motivo) &&($assunto)) {
            $u->conectar("Radix", "localhost", "root", "");
            if ($u->msgErro == "") //ta ok
            {
                if ($u->envioPun($idVendedor, $tipo, $motivo, $assunto)) {
                    
    ?>
                    <div id="msg-sucesso">
                        enviado com sucesso!
                    </div>
                <?php
                } else {
                ?>
                    <div class="msg-erro">
                        Produto adicionado!
                    </div>
                <?php
                if($u->status($idVendedor)){
                    header("Location: initial.php");
                }
                }
            } else {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: " . $u->msgErro; ?>
                </div>
            <?php

            }
        } else {
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