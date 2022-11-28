<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laboratorio FPGA</title>
    <link rel="shortcut icon" href="img/fpgao.jpg"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="container.css">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn"> 
            <i class="fa-solid fa-bars"></i>
        </label>
        <a href="inicio.php" class="enlace">
            <img src="img/fpga.png" alt="" class="logo">
        </a>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Interfaz FPGA</a></li>
            <li><a href="">Crear lab</a></li>
            <li><a href="CerrarSesion.php" class="btn btn-danger">Cerrar Sesion</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    
                    <tr>
                        <th colspan="4"><h1>BOTONES</h1></th>
                    </tr>
                    <tr>
                        <th>Botón 1<img class="botonfpga" src="img/boton.png"></th>
                        <th>Botón 2<img class="botonfpga" src="img/boton.png"></th>
                        <th>Botón 3<img class="botonfpga" src="img/boton.png"></th>
                        <th>Botón 4<img class="botonfpga" src="img/boton.png"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="b1"><h2 class="b_off">OFF</h2></td>
                        <td id="b2"><h2 class="b_off">OFF</h2></td>
                        <td id="b3"><h2 class="b_off">OFF</h2></td>
                        <td id="b4"><h2 class="b_off">OFF</h2></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br><br>
        <div class="col-xs-12">
            <form id="form_leds">
                <table class="table">
                <thead>
                    <tr>
                        <th colspan="4"><h1>LEDS</h1></th>
                    </tr>
                    <tr>
                        <th>Led 1</th>
                        <th>Led 2</th>
                        <th>Led 3</th>
                        <th>Led 4</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <td id="l1">
                    <input type="checkbox" class="check" id="check_1" name="l1" value="1"/>
                    <label for="check_1">Toggle</label>
                </td>
                <td id="l2">
                    <input type="checkbox" class="check" id="check_2" name="l2" value="1"/>
                    <label for="check_2">Toggle</label>
                </td>
                <td id="l3">
                    <input type="checkbox" class="check" id="check_3" name="l3" value="1"/>
                    <label for="check_3">Toggle</label>
                </td>
                <td id="l4">
                    <input type="checkbox" class="check" id="check_4" name="l4" value="1"/>
                    <label for="check_4">Toggle</label>
                </td>
                </tr>
                </tbody>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        leer_datos();
    $(".check").click(function(){
        var leds = $("#form_leds").serialize();
        $.post("recibir.php?"+leds,function(r){
            leer_datos();
        })
    })
    $("#g_max_temp").click(function(){
        var max_temp = $("#max_temp").val();
        $.post("max_temp.php",{max_temp:max_temp},function(r){
            leer_datos();
        })
    })
    setInterval(function(){ leer_datos(); }, 1000);
    function leer_datos(){
        $.post("leer.php",function(r){
            var status = jQuery.parseJSON(r);
            if(status.B1=='1'){
                $("#b1").html("<h2 class='b_on'>ON</h2>");
            }else{
                $("#b1").html("<h2 class='b_off'>OFF</h2>");
            }
            if(status.B2=='1'){
                $("#b2").html("<h2 class='b_on'>ON</h2>");
            }else{
                $("#b2").html("<h2 class='b_off'>OFF</h2>");
            }
            if(status.B3=='1'){
                $("#b3").html("<h2 class='b_on'>ON</h2>");
            }else{
                $("#b3").html("<h2 class='b_off'>OFF</h2>");
            }
            if(status.B4=='1'){
                $("#b4").html("<h2 class='b_on'>ON</h2>");
            }else{
                $("#b4").html("<h2 class='b_off'>OFF</h2>");
            }

            if(status.L1=='1'){
                $('#check_1')[0].checked = true;
            }else{
                $('#check_1')[0].checked = false;
            }
            if(status.L2=='1'){
                $('#check_2')[0].checked = true;
            }else{
                $('#check_2')[0].checked = false;
            }
            if(status.L3=='1'){
                $('#check_3')[0].checked = true;
            }else{
                $('#check_3')[0].checked = false;
            }
            if(status.L4=='1'){
                $('#check_4')[0].checked = true;
            }else{
                $('#check_4')[0].checked = false;
            }
        })
    }
})
</script>
    
</body>
</html>