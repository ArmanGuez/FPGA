<?php

  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "fpga";

  $conexion = mysqli_connect($server, $username, $password, $database);

  if (!$conexion){
    echo "Conexion fallida";
  }

?>