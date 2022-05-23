<?php

//Conexion
include("conexion.php");

    //obtenemos los valores desde POST
    $num_contenedor = $_POST['num_contenedor'];
    $tamano = $_POST['tamano'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $num_economico = $_POST['num_economico'];
    $flujo = $_POST['flujo'];

    $tamanoC="0";//Variable auxiliar pra validaciones



    //Se hace una consulta para saber si el contenedor existe en entrada
    $query = mysqli_query($con, "SELECT * FROM contenedor WHERE num_contenedor='$num_contenedor' && flujo='Entrada'");

    //se ejecuta el query
    if (!$query) {   die('Error: ' . mysqli_error($con));  }
    //Si hay mas de una fila en la respuesta
    if(mysqli_num_rows($query) > 0){

    echo "duplica";

    }else{ 
        //Se hace una consulta para saber si el numero economico existe en entrada, osea, si existe otro contenedor del mismo camión.
        $query ="SELECT * FROM contenedor WHERE num_economico='$num_economico' && flujo='Entrada'";
        
        $resultado = mysqli_query($con,$query);
        //Si hay más de un contenedor en el mismo camión se retorna maximo
        if(mysqli_num_rows($resultado) > 1){ echo "maximo"; } 

         //Si hay menos de 2 contenedores en el mismo camion
        if(mysqli_num_rows($resultado) <= 1){ 
            //Encontramos el tamaño del contenedor existente
            while($row = mysqli_fetch_array($resultado)){
                $tamanoC= $row['tamano_contenedor'];
                }
            //Si el tamaño es 40HC
            if($tamanoC=="40HC"){
                echo "maxtam";
            }else{//Si el tamaño es de 20HC ó si no hay contenedor con ese numero economico
                //Si el tamaño es 20HC y el introducido por el usuario es 40, se rechazará
                if($tamanoC=="20HC" && $tamano=="40HC"){
                    echo "maxtam2";
                }else{

                        //Query
                        $query = "INSERT INTO `contenedor` (`num_contenedor`, `tamano_contenedor`, `fecha_entrada`, `fecha_salida`, `num_economico`, `flujo`) 
                        VALUES ('$num_contenedor', '$tamano', '$fecha_entrada', NULL, '$num_economico', 'Entrada');";

                        if (!$result = mysqli_query($con, $query)) {
                          exit(mysqli_error($con));
                        }else{
                            echo "exito";
                        }

                }
            

            }
        
        } 
    
        
    }


// echo $idmax;
?>