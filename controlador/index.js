let primeraInicializacion = true;

$(document).ready(function () {
    consultarTabla("1");

    let today = new Date().toISOString().split('T')[0];
    $("#fecha_entrada").val(today);

});


// Traer info de BD de historial de contenedores
function consultarTabla(opcion) {
    $.ajax({
        url: "../backend/consultar_tabla.php",
        type: "post",
        data: {
            opc: opcion
        },
        // dataType: 'JSON',
        success: function (data) {
            //   $('#tabla_datos').DataTable().clear().draw();
            $("#tabla_datos").html(data);

            // $('#tabla_datos').DataTable({
            //     "language": {

            //         "url": "../libs/dataTable/es_es.json"
            //     }
            // });

        }
    });

}

//Boton Historial Salidas
$('#radioSalidas').on("change", function () {
    consultarTabla("2");
    $("#label_nota").html("<i class='fa-solid fa-circle-info'></i> Historial de salidas de contenedores.")
});
//Boton Inventario Entradas
$('#radioEntradas').on("change", function () {
    consultarTabla("1");
    $("#label_nota").html("<i class='fa-solid fa-circle-info'></i> Inventario actual de contenedores.")
});


function mostrarModalContenedor() {
    $("#modal_contenedor").modal("show");
}



function registrarContenedor() {
    //Se obtienen los valores 
    num_contenedor = $("#num_contenedor").val()
    tamano = $("#select_tamano :selected").val()
    fecha_entrada = $("#fecha_entrada").val()
    num_economico = $("#num_economico").val()

    if (num_contenedor == "" || num_economico == "") {
        alerta('CAMPOS OBLIGATORIOS', 'Es necesario llenar todos los campos para realizar un registro.', 'warning')
    } else {
        $.ajax({
            url: "../backend/insertar_contenedor.php",
            type: "post",
            data: {
                num_contenedor: num_contenedor,
                tamano: tamano,
                fecha_entrada: fecha_entrada,
                num_economico: num_economico,
                flujo: "Entrada"
            },
            success: function (data) {
                //  alert(fecha_entrada)
                //Si el valor ya existe en el inventario 
                if (data == "duplica") {
                    alerta("DUPLICA", "Este numero de contenedor ya se encuentra registrado en el inventario, prueba con otro.", "error")
                    $("#num_contenedor").val("") //Se limpia el campo de numero de contenedor
                } else if (data == "maximo") {
                    alerta("CAPACIDAD MAXIMA", "Ya existen 2 contenedores asignados a este numero economico, intenta con otro.", "warning")
                    $("#num_economico").val("") //Se limpia el campo de numero de contenedor
                }
                else if (data == "maxtam") {
                    alerta("CAPACIDAD MAXIMA", "Ya existe 1 contenedor de 40HC asignado a este numero economico, intenta con otro.", "warning")
                    $("#num_economico").val("") //Se limpia el campo de numero de contenedor
                }
                else if (data == "maxtam2") {
                    alerta("CAPACIDAD MAXIMA", "Ya existe 1 contenedor de 20HC asignado a este numero economico, no puedes asignar uno de 40HC, intenta con otro tamaño.", "warning")
                    //$("#num_economico").val("") //Se limpia el campo de numero de contenedor
                } else if (data == "exito") {
                    alerta("CONTENEDOR REGISTRADO", "El contenedor fue registrado exitosamente, encuentralo en el inventario de entradas.", "success")
                    $("#modal_contenedor").modal("hide");
                    consultarTabla("1")
                }

            }
        });

    }



}


//Funcion de alerta, recibe parametros de titulo, texto y el icono (usa la libreria de sweetalert)
function alerta(titulo, texto, icono) {
    Swal.fire(
        titulo,
        texto,
        icono
    )
}

//Elimina contenedor
function eliminarContenedor(num_contenedor) {
    Swal.fire({
        title: '¿Eliminar Contenedor?',
        icon: 'question',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Si, eliminar.',
        denyButtonText: 'Cancelar.',
    }).then((result) => {
        //Si el usuario confirma
        if (result.isConfirmed) {
            //alert(num)
            $.ajax({
                url: "../backend/eliminar_contenedor.php",
                type: "post",
                data: {
                    num_contenedor: num_contenedor
                },
                success: function (data) {
                    //  alert(data)
                    if (data == "eliminado") {
                        alerta("REGISTRO ELIMINADO", "El contenedor fue eliminado existosamente.", "success")
                        consultarTabla("1")

                    }

                }
            });

        }
    })
}

//Editar contenedor
function editarContenedor(num) {
    $("#modal_contenedorEditar").modal("show");

    $.ajax({
        url: "../backend/obtener_contenedor.php",
        type: "post",
        data: {
            num_contenedor: num
        },
        dataType: 'JSON',
        success: function (data) {
            //  alert(data.tamano)

            $("#num_contenedorE").val(data.num_contenedor)
            $("#select_tamanoE").val(data.tamano_contenedor)
            $("#fecha_entradaE").val(data.fecha_entrada)
            $("#num_economicoE").val(data.num_economico)
            $("#num_contenedor_ant").val(data.num_contenedor)

        }
    });

}

//Editar contenedor
function actualizarContenedor() {
    $.ajax({
        url: "../backend/editar_contenedor.php",
        type: "post",
        data: {
            num_contenedorN: $("#num_contenedorE").val(),
            tamano_contenedor: $("#select_tamanoE").val(),
            fecha_entrada: $("#fecha_entradaE").val(),
            num_economico: $("#num_economicoE").val(),
            num_contenedorAnt: $("#num_contenedor_ant").val()
        },
        success: function (data) {

            //   alert(data)   

            if (data == "duplica") {
                alerta("NUMERO DUPLICADO", "El numero al que intensar actualizar ya existe en el inventario.", "error")
            }
            else if (data == "maximo") {
                alerta("CAPACIDAD MAXIMA", "Ya existen 2 contenedores asignados a este numero economico, intenta con otro.", "warning")
            }
            else if (data == "maxtam") {
                alerta("CAPACIDAD MAXIMA", "Ya existe 1 contenedor de 40HC asignado a este numero economico, intenta con otro.", "warning")
            }
            else if (data == "maxtam2") {
                alerta("CAPACIDAD MAXIMA", "Ya existe 1 contenedor de 20HC asignado a este numero economico, no puedes asignar uno de 40HC, intenta con otro tamaño.", "warning")
            }

            if (data == "editado") {
                $("#modal_contenedorEditar").modal("hide");
                consultarTabla("1")
                alerta("REGISTRO EDITADO", "El registro se editó exitosamente.", "success")
            }

        }
    });

}

//Ordenar salidas
function salidaContenedor(num_contenedor) {

    Swal.fire({
        title: '¿ORDENAR SALIDA?',
        text: 'Se ordenará la salida de los contenedores ligados a este por el mismo número economico.',
        icon: 'question',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Si, ordenar salida.',
        denyButtonText: 'Cancelar.',
    }).then((result) => {
        //Si el usuario confirma
        if (result.isConfirmed) {

            $.ajax({
                url: "../backend/ordenar_salida.php",
                type: "post",
                data: {
                    num_contenedor: num_contenedor
                },
                success: function (data) {

                    if (data == "exito") {

                        alerta("SALIDA REGISTRADA", "Encuentra los contenedores en el historial de salidas", "success")
                        consultarTabla("1")
                    }

                }
            });

        }
    })



}