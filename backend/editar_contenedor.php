<?php
		include("conexion.php");

        // Obteniendo información
            $num_contenedorN = $_POST['num_contenedorN'];
            $tamano_contenedor = $_POST['tamano_contenedor'];
            $fecha_entrada = $_POST['fecha_entrada'];
         // $fecha_salida = $_POST['fecha_salida'];
            $num_economico = $_POST['num_economico'];


            $num_contenedorAnt = $_POST['num_contenedorAnt'];
            $tamanoC="0";//Variable auxiliar pra validaciones

        if($num_contenedorAnt !== $num_contenedorN){
              //Se hace una consulta para saber si el contenedor existe en entrada
        $query = mysqli_query($con, "SELECT * FROM contenedor WHERE num_contenedor='$num_contenedorN' && flujo='Entrada' ");

        //se ejecuta el query
        if (!$query) {   die('Error: ' . mysqli_error($con));  }
        //Si hay mas de una fila en la respuesta
        if(mysqli_num_rows($query) > 0){

        echo "duplica";
        }
      
        }else{ 

                //Se hace una consulta para saber si el numero economico existe en entrada, osea, si existe otro contenedor del mismo camión.
        $query ="SELECT * FROM contenedor WHERE num_economico='$num_economico' && flujo='Entrada' && num_contenedor!='$num_contenedorAnt'";
        
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
                if($tamanoC=="20HC" && $tamano_contenedor=="40HC"){
                    echo "maxtam2";
                }else{

                      
                $query = "UPDATE contenedor SET num_contenedor='$num_contenedorN', tamano_contenedor='$tamano_contenedor', fecha_entrada='$fecha_entrada', num_economico='$num_economico' WHERE num_contenedor='$num_contenedorAnt'";
            
                if (!$result = mysqli_query($con, $query)) {
                    exit(mysqli_error($con));
                }
                echo "editado";
                }
            

            }
        
        } 



        }


    
	


?>