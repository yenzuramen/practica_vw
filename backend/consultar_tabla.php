<?php
//Conexion
	include("conexion.php");
//Switch para llenar los selects de los modals.
switch($_POST['opc']) {
    case '1':
        $query = "SELECT * FROM contenedor WHERE flujo = 'Entrada'";
        break;
    case '2':
        $query = "SELECT * FROM contenedor WHERE flujo = 'Salida'";
            break;
}
	//Diseño del header de la tabla
	$data = ' <thead>
                        <tr class="table-primary">
                          <th>No. Contenedor</th>
                          <th>Tamaño</th>
                          <th>Entrada</th>
                          <th>Salida</th>
                          <th>Numero Económico</th>
                          <th>Flujo</th>';
                         if($_POST['opc']=='1'){
                                $data.='<th>Acción</th>';
                         }
                         $data.='   </tr>
                         </thead> <tbody>';
		
					

                            if (!$result = mysqli_query($con, $query)) {
                                exit(mysqli_error($con));
                            }

    // Si los resultados del query tienen más de 0 filas
    if(mysqli_num_rows($result) > 0)
    {
		//Recorrido del cuerpo de la tabla
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
			    <td>'.$row['num_contenedor'].'</td>
				<td>'.$row['tamano_contenedor'].'</td>
				<td>'.$row['fecha_entrada'].'</td>
				<td>'.$row['fecha_salida'].'</td>
				<td>'.$row['num_economico'].'</td>
				<td>'.$row['flujo'].'</td>';

    

                if($_POST['opc']=='1'){
                    $data.='<td>
				<button type="button" class="btn btn-warning"  onclick="editarContenedor('.$row['num_contenedor'].')"> Editar <i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-danger ms-2"  onclick="eliminarContenedor('.$row['num_contenedor'].')"> <i class="fa-solid fa-trash"></i></button>
                <button type="button" class="btn btn-secondary ms-2"  onclick="salidaContenedor('.$row['num_contenedor'].')"> Salida <i class="fa-solid fa-right-from-bracket"></i></button>
			    </td>';
             }
				
                
             $data.='</tr>';
    	}
    }
    else
    {//No se encontraron registros. 
    	$data .= '';
    }

    $data .= '</tbody>';
    //Se devuelve la estructura de la tabla
    echo $data;
?>

<!-- 
<script>
  $(document).ready(function () {
    // $('#tabla_datos').DataTable({
    //     "language": {
    //         "destroy": true,
	// 	"stateSave":true,  
    //     "bDestroy": true,
    //         "url": "../libs/dataTable/es_es.json"
    //     }
    // });
    
	});
  </script> -->
