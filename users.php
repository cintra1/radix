<?php
include('php/conexao.php');
require('php/connection.php');
include('php/protectVend.php');
include_once "php/config.php";

?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM tblVendedor WHERE idVendedor = {$_SESSION['idVendedor']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="upload/<?php echo $row['imagemVend']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['nomeVend'] ?></span>
          </div>
        </div>
        <a href="php/logout.php" class="logout">Logout</a>
      </header>
      <div class="search" style="visibility: hidden;">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list" style="margin-top: -4rem">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>