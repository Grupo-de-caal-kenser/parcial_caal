import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje"
import { validarFormulario, Toast } from "../funciones"
import Swal from "sweetalert2";

let contenedor = 1;

const datatable = new Datatable('#tablaUsuarios', {
    language : lenguaje,
    data : null,
    columns : [
        {
            title : 'NO',
            render: () => contenedor++ 
            
        },
        {
            title : 'USUARIO',
            data: 'usu_nombre'
        },
        {
            title : 'CATALOGO',
            data: 'usu_catalogo',
        },
        {
            title : 'ACTIVAR',
            data: 'usu_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-info" data-id='${data}' data-nombre='${row["usu_nombre"]}' data-catalogo='${row["usu_catalogo"]}'>Activar</button>`
        },
        {
            title : 'ELIMINAR',
            data: 'usu_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}'>Eliminar</button>`
        }
    ]
})



//!Aca esta la funcion para buscar
const buscar = async () => {
    contenedor = 1;

    const url = `/parcial_caal/API/desactivar/buscar`;
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

        console.log(data);
        datatable.clear().draw()
        if (data) {
            datatable.rows.add(data).draw();
        } else {
            Toast.fire({
                title: 'Sin registros',
                icon: 'info'
            })
        }

    } catch (error) {
        console.log(error);
    }
}


//!Aca esta la funcion de Acticar un Usuario
const activar = async e => {
    const result = await Swal.fire({
        icon: 'question',
        title: 'Activar Usuario',
        text: '¿Desea Activar Usuario?',
        showCancelButton: true,
        confirmButtonText: 'Activar',
        cancelButtonText: 'Cancelar'
    });

    const button = e.target;
    const id = button.dataset.id
    // alert(id);
    
    if (result.isConfirmed) {
        const body = new FormData();
        body.append('usu_id', id);

        const url = `/parcial_caal/API/desactivar/activar`;
        const config = {
            method: 'POST',
            body,
        };

        try {
            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            console.log(data);
            const { codigo, mensaje, detalle } = data;

            let icon='info'
            switch (codigo) {
                case 1:
                    buscar();
                    Swal.fire({
                        icon: 'success',
                        title: 'Activado Exitoso',
                        text: mensaje,
                        confirmButtonText: 'OKEY'
                    });
                    break;
                case 0:
                    console.log(detalle);
                    break;
                default:
                    break;
            }

        } catch (error) {
            console.log(error);
        }
    }
};



// //!Funcion Eliminar
const eliminar = async e => {
    const result = await Swal.fire({
        icon: 'question',
        title: 'Eliminar Usuario',
        text: '¿Desea eliminar Usuario?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    });
    
    const button = e.target;
    const id = button.dataset.id
    // alert(id);
    
    if (result.isConfirmed) {
        const body = new FormData();
        body.append('usu_id', id);
        
        const url = `/parcial_caal/API/desactivar/eliminar`;
        const config = {
            method: 'POST',
            body,
        };
        
        try {
            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            console.log(data);
            const { codigo, mensaje, detalle } = data;

            let icon='info'
            switch (codigo) {
                case 1:
                    buscar();
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado Exitoso',
                        text: mensaje,
                        confirmButtonText: 'PERFECTO'
                    });
                    break;
                    case 0:
                        console.log(detalle);
                        break;
                default:
                    break;
            }

        } catch (error) {
            console.log(error);
        }
    }
};

datatable.on('click','.btn-info', activar)
datatable.on('click','.btn-danger', eliminar)
buscar();