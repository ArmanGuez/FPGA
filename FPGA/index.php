<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>FPGA</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
   <form action="IniciarSesion.php" method="post">
    <h1>Iniciar sesión</h1>
    <hr>
    <?php
      if (isset($_GET['error'])){
        ?>
        <p class="error">
          <?php
          echo $_GET['error']
          ?>
        </p>
    <?php    
      }
    ?>

    <div>
      <i class="fa-solid fa-user"></i>
      <label>Correo electronico</label>
      <input type="email" name="email" placeholder="Correo electrónico">
    </div>
    <div>
      <i class="fa-solid fa-unlock"></i>
      <label>Contraseña</label>
      <input type="password" name="contraseña" placeholder="Contraseña">
    </div>
    <hr>
      <button type="submit">Iniciar sesión</button>
      <a href="CrearCuenta.php">Crear cuenta</a>
   </form>
  </body>
</html>