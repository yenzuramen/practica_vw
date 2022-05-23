<?php
// include Database connection file
include("conexion.php");


    //Obtenemos el numero de contenedor
    $num_contenedor = $_POST['num_contenedor'];

    date_default_timezone_set("America/Mexico_City");
    $fecha = date("Y-m-d");

    $query = "SELECT num_economico FROM contenedor WHERE num_contenedor = '$num_contenedor'";

       $resultado = mysqli_query($con,$query);

           //Encontramos el tamaño del contenedor existente
           while($row = mysqli_fetch_array($resultado)){
               $num_eco= $row['num_economico'];
               }

    //Se obtienen los datos
    $query = "UPDATE contenedor SET flujo='Salida', fecha_salida='$fecha' WHERE num_economico=$num_eco AND flujo = 'Entrada'";
    
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con)); 
      }else{
          echo "exito";
      }



?>