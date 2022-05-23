<?php
// include Database connection file
include("conexion.php");


    //Obtenemos el numero de contenedor
    $num_contenedor = $_POST['num_contenedor'];

    //Se obtienen los datos
    $query = "SELECT * FROM contenedor WHERE num_contenedor= '$num_contenedor' AND flujo='Entrada'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    //Se envia como json
    echo json_encode($response);


?>