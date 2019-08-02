<?php
  session_start();
  if($_SESSION['username'] != null || $_SESSION['username'] != ""){
    ?>
    <script>
      var link = "legacy/index.php";
      window.location = link;
    </script>
    <?php
  }
  $access = isset( $_GET['access'] ) ? $_GET['access'] : "";
  $error = false;
  if($access == "denied"){
    $error = true;
  }
 ?>

<!doctype html>
<html lang="en">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center" style="background-image: url('../img/back1.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    <form class="form-signin" method="post" action="validation.php">
      <img src="../img/logowshadow.png" alt="" width="250px;">
      <h1 class="h3 mb-3 font-weight-normal" style="color: white; text-shadow: 1px 1px 1px black;">Accede como Administrador</h1>
      <?php
      if($error === true){
        echo "<h1 class='h4 mb-4 font-weight-normal' style='color: red; text-shadow: 1px 1px 1px black;''>Correo o password incorrectos</h1>";
      } 
      ?>
      <label for="inputEmail" class="sr-only">Correo</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus name="email">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="pass">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <br>
      <p style="color: white;text-shadow: 1px 1px 1px black;">&copy; Keen Systems 2018-2019</p>
    </form>
  </body>
</html>
