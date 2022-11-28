<?php
  session_start();
  include('database.php');

if(isset($_POST['email']) && isset($_POST['contraseña'])){  
    function validate($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['contraseña']);

    if (empty($email)){
      header("Location: index.php?error=El correo es requerido");
      exit();
    }elseif (empty($password)){
      header("Location: index.php?error=La contraseña es requerida");
      exit();
    }else {
      // $password = md5($password);
      $Sql = "SELECT * FROM users WHERE email = '$email' AND contraseña = '$password'";
      $result = mysqli_query($conexion, $Sql);

      if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['email'] === $email && $row['contraseña'] === $password){
          $_SESSION['email'] = $row['email'];
          $_SESSION['usuario'] = $row['usuario'];
          $_SESSION['id'] = $row['id'];
          header("Location: inicio.php");
          exit();
        }else{
          header("Location: index.php?error=El correo o la contraseña son incorrectas");
          exit();
        }
      }else{
        header("Location: index.php?error=El correo o la contraseña son incorrectas");
        exit();
      }
    }
} else {
  header("Location: index.php?error=El correo o la contraseña son incorrectas");
  exit();
}
