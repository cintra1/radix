<?php
include('php/conexao.php');
require('php/connection.php');
include('php/protectVend.php');
include('php/protectIDChat.php');
include_once "php/config.php";

if (isset($_POST['sub'])) {
  header("Location: chat.php?idCliente={$_GET['idCliente']}&idConversa={$_GET['idConversa']}");
}

?>
<?php include_once "header.php"; ?>

<body onload="scrollToBottom()">
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php

        $sql = mysqli_query($conn, "SELECT * FROM tblCliente WHERE idCliente = {$_GET['idCliente']}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <div class="details">
          <span><?php echo $row['nome'] ?></span>
        </div>
      </header>
      <div class="chat-box">
        <?php
        include("php/get-chat.php")
        ?>

      </div>
      <form method="POST" action="#" class="typing-area" style="display: none;">
        <input type="text" class="incoming_id" name="idConversa" value="" hidden>
        <input type="text" name="msg" class="input-field" placeholder="Escreva uma mensagem aqui ..." autocomplete="off">
        <label for="sub" class="env"><i class="fab fa-telegram-plane"></i></label>
        <input type="submit" name="sub" class="env" id="sub">
      </form>
    </section>

    <form method="POST" action="#" class="typing-area">
      <input type="text" class="incoming_id" name="idConversa" value="<?php $_GET['idConversa']; ?>" hidden>
      <input type="text" name="msg" class="input-field" placeholder="Escreva uma mensagem aqui ..." autocomplete="off">
      <button type="submit" name="sub" class="env"><i class="fab fa-telegram-plane" onclick="searchData()"></i></button>
    </form>
  </div>

  <script src="javascript/chat6.js"></script>

  <?php

  include('php/conexao.php');

  require_once 'php/adicionarMensagem.php';
  $u = new Usuario;


  if (isset($_POST['sub'])) {
    $msg = addslashes($_POST['msg']);
    $idConversa = $_GET['idConversa'];

    if (!empty($msg)) {
      $u->conectar("Radix", "localhost", "root", "");
      if ($u->adicionar($msg, $idConversa)) {
  ?>
        <div id="msg-sucesso">
          Cadastrado com sucesso!
        </div>
      <?php
      } else {
      ?>

      <?php

      }
    } else {
      ?>
      <div class="msg-erro">
        <?php echo "Erro: " . $u->msgErro; ?>
      </div>
  <?php

    }
  }

  ?>

  <script>
    function scrollToBottom() {
      chatBox.scrollTop = chatBox.scrollHeight;
    }
  </script>

</body>

</html>