<?php
    session_start();
    include_once('database.php');

    if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['contraseña']) && isset($_POST['Rcontraseña'])){  
        function validate($data){
          $data = trim($data);
          $data = stripcslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        
        $usuario = validate($_POST['usuario']);
        $email = validate($_POST['email']);
        $password = validate($_POST['contraseña']);
        $Rpassword = validate($_POST['Rcontraseña']);

        $datosUsuario = 'usuario=' . $usuario . '$email=' . $email;

        if (empty($usuario)){
            header("Location: CrearCuenta.php?error=El usuario es requerido&$datosUsuario");
            exit();
        }elseif (empty($email)){
            header("Location: CrearCuenta.php?error=El correo electrónico es requerido&$datosUsuario");
            exit();
        }elseif (empty($password)){
            header("Location: CrearCuenta.php?error=La contraseña es requerida&$datosUsuario");
            exit();
        }elseif (empty($Rpassword)){
            header("Location: CrearCuenta.php?error=Repetir contraseña es requerida&$datosUsuario");
            exit();
        }elseif ($password !== $Rpassword) {
            header("Location: CrearCuenta.php?error=Las contraseñas no son iguales&$datosUsuario");
            exit();
        }else{
            $Sql = "SELECT * FROM users WHERE email = '$email'";
            $query = $conexion -> query($Sql);

            if(mysqli_num_rows($query) > 0){
                header("Location: CrearCuenta.php?error=El usuario ya existe");
                exit();
            }else{
                $sq12 = "INSERT INTO users(usuario, email, contraseña) VALUES ('$usuario','$email','$password')";
                $query2 = $conexion -> query($sq12);

                if ($query2){
                    header("Location: CrearCuenta.php?success=Usuario creado correctamente");
                    exit();
                }else{
                    header("Location: CrearCuenta.php?success=Ocurrió un error");
                    exit();
                }
            }
        }
    }else {
        header("Location: CrearCuenta.php");
        exit();
    }