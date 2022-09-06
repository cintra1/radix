<?php 
include("php/conexao.php");

$consulta = "SELECT * FROM tblProduto";
$con = $mysqli->query($consulta) or die($mysqli->error);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styleProduto.css">
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico">
    <title>Radix</title>

     <!--==================== UNICONS ====================-->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
        <h2 class="title__top">Home Vendedor > Editar Produtos</h2>
        <div class="boxes">
            <?php while($dado = $con->fetch_array()){ ?>
            <div class="home__container container grid box">
                 <div class="home__box home__container container grid">
 
                     <div class="title">
                         <h1 class="title__prod"><?php echo $dado["nome"]; ?></h1>   
                         <div class="box__img">
                             <img src="upload/<?php echo $dado["foto"]; ?>" alt="">
                         </div>
                     </div>
                     <div class="description">
                     <a class="btn4" href="alterarProd.php?idProduto=<?php echo $dado["idProduto"]; ?>"><i class="uil uil-pen"></i></a>
                         <p class="home__description2"><?php echo $dado["detalhe"]; ?></p> 
                         <p class="home__price"> <span style="color: #70C28D;">R$ </span><?php echo $dado["preco"]; ?>,00 </p>
                     </div>
                     
                </div>
            </div>
            <?php } ?>
        </div>
        

        <div class="btns">
            <input type="submit" class="btn3" value="Adicionar Produto" name="sub"/>
            <input type="submit" class="btn3" id="d" value="Alterar Produto" name="sub"/>
            <input type="submit" class="btn3" id="t" value="Deletar Produto" name="sub"/>
        </div>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            //mostrar tarefa
            function loadTasks(){
                $.ajax({
                url: "php/show-tasks.php",
                type: "POST",
                success: function(data){
                    $("#tasks").html(data);
                }
            });
            }

            loadTasks();

            //add task
            $("#addBtn").on("click", function(e) {
                e.preventDefault();

                var task = $("#taskValue").val();

            $.ajax({
                url: "php/add-task.php",
                type: "POST",
                data: {task: task},
                success: function(data){
                    loadTasks();
                    $("#taskValue").val('');
                    if(data == 0){
                        alert("Algo deu errado. Tente novamente.");
                    }
                }
                });
            });

            //remover tarefa
            $(document).on("click","#removeBtn", function(e) {
                e.preventDefault();
                var idLembrete = $("#delete").data('id');
                
                $.ajax({
                    url: "php/remove-task.php",
                    type: "POST",
                    data: {idLembrete: idLembrete},
                    success: function(data){
                        loadTasks();
                        if(data == 0){
                            alert("Algo deu errado. Tente novamente.");
                        }
                    }

                })
                });
        });
    </script>
</body>
</html>