<?php
   include('php/protectAdm.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylesLembrete.css">
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
        <h2 class="title">Novo Lembrete</h2>
        <div class="inputFields">
            <div class="caixa">
                <input type="text" id="taskValue" placeholder="Escreva uma tarefa.">
            </div>
            <div class="caixa__div">
                <input type="text" id="creatorValue" placeholder="Criado por...">
                <input type="date" id="dateValue" placeholder="Data">
            </div>
            <div>
                <input type="text" id="reqValue" placeholder="Requisitados">
            </div>
            <div class="caix">
                <!-- <input type="text" id="statusValue" placeholder="Status"> -->
                <select id="statusValue" placeholder="Status">
                    <option value="Urgente" style="color: red;"> Urgente</option>
                    <option value="Importante" style="color: #e37712;"> Importante</option>
                    <option value="Comum" style="color: green;"> Comum </option>
                    <option value="Muito Comum" style="color: #1eb6e8;"> Muito comum</option>
                </select>
            </div>
            
            <button type="submit" id="addBtn" class="btn" onclick="window.location.href='indexLembretes.php'"> <i class="fa fa-plus"></i> Criar Lembrete </button>
        </div> 
        <div class="content">
            <ul id="tasks">
                
            </ul>
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
                var criador = $("#creatorValue").val();
                var data = $("#dateValue").val();
                var requisitados = $("#reqValue").val();
                var statusLembrete = $("#statusValue").val();

            $.ajax({
                url: "php/add-task.php",
                type: "POST",
                data: {task: task, criador:criador, data: data, requisitados: requisitados, statusLembrete: statusLembrete},
                success: function(data){
                    loadTasks();
                    $("#taskValue").val('');
                    $("#creatorValue").val('');
                    $("#dateValue").val('');
                    $("#reqValue").val('');
                    $("#statusValue").val('');
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