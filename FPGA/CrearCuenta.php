<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Registrarse</title>
</head>
<body>
    <div class="contenedor">
      <form action="Registrarse.php" method="post">
        <h1>Registrarse</h1>
        <hr>

        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
          <p class="success"><?php echo $_GET['success']?></p>
        <?php } ?>

        <div>
          <div>
            <i class="fa-solid fa-user"></i>
            <label>Usuario</label>
            <input type="text" name="usuario" placeholder="Usuario">
          </div>
          <div>
            <i class="fa-solid fa-user"></i>
            <label>Email</label>
            <input type="email" name="email" placeholder="Correo electronico">
          </div>
          <div>
            <i class="fa-solid fa-unlock"></i>
            <label>Contraseña</label>
            <input type="password" name="contraseña" placeholder="Contraseña">
          </div>
          <div>
            <i class="fa-solid fa-unlock"></i>
            <label>Repetir Contraseña</label>
            <input type="password" name="Rcontraseña" placeholder="Contraseña">
          </div>
        </div>
      <hr>
      <button type="submit">Registrarse</button>
      <a href="index.php">Ingresar</a>
   </form>

    </div>
</body>
</html>