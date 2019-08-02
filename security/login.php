<?php 
  session_start();
  if($_SESSION['username'] != null || $_SESSION['username'] != ""){
    ?>
    <script>
      var link = "../index.php";
      window.location = link;
    </script>
    <?php
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicia Sesion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="../css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Servicio Automotriz Diaz</h1>
                  </div>
                  <p>Version 4.0</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <div class="form-validate">
                    <div class="form-group">
                      <input id="boxUsername" type="email" required data-msg="Correo Electronico" class="input-material">
                      <label for="login-username" class="label-material text-success">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="boxPassword" type="password" required data-msg="Contraseña" class="input-material">
                      <label for="login-password" class="label-material text-success">Password</label>
                    </div><button class="btn btn-dark" onclick="comprobar();">Ingresar</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </div><a href="#" class="forgot-pass text-success">Recuperar</a><br><small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com" class="external text-success">Marco Antonio Diaz Diaz</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <script>
      function comprobar() {
        var email = $("#boxUsername").val();
        var pass = $("#boxPassword").val();

        $.ajax({
          url: 'validation.php',
          type: 'POST',
          data: {
            email : email,
            pass : pass
          },
        })
        .done(function() {
          location.reload();
        });
        
      }
    </script>
    <!-- JavaScript files-->
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/front.js"></script>
  </body>
</html>