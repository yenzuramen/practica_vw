<?php

//Conexion
include("conexion.php");

        //Se recibe el folio del prestamo
        $num_contenedor = $_POST['num_contenedor'];
    
        //Se elimina el contenedor de el inventario.
        $query = "DELETE FROM contenedor WHERE num_contenedor = '$num_contenedor' AND flujo ='Entrada' ";
        
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }

echo "eliminado";

?>