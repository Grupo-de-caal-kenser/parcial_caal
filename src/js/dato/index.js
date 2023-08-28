import Datatable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje"
import { validarFormulario, Toast } from "../funciones"
import Swal from "sweetalert2";

const formulario = document.querySelector('form');
const btnModificar = document.getElementById('btnModificar');
const btnCancelar = document.getElementById('btnCancelar');
const tablaUsuariosTabla = document.getElementById('tablaUsuariosTabla');

//!Ocultar el formulario al inicio
formulario.style.display = 'none';
tablaUsuariosTabla.style.display = 'block'; 


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
            title : 'DESACTIVAR',
            data: 'usu_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-info" data-id='${data}' data-nombre='${row["usu_nombre"]}' data-catalogo='${row["usu_catalogo"]}'>Desactivar</button>`
        },
        {
            title : 'ELIMINAR',
            data: 'usu_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}'>Eliminar</button>`
        },
        {
            title : 'CAMBIAR CONTRASEÑA',
            data: 'usu_id',
            searchable: false,
            orderable: false,
            render : (data, type, row, meta) => `<button class="btn btn-warning" data-id='${data}' data-nombre='${row["usu_nombre"]}' data-catalogo='${row["usu_catalogo"]}'>Modificar Contraseña</button>`
        }
    ]
})



//!Aca esta la funcion para buscar
const buscar = async () => {
    contenedor = 1;

    const url = `/parcial_caal/API/dato/buscar`;
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
                title: 'No se encontraron registros',
                icon: 'info'
            })
        }

    } catch (error) {
        console.log(error);
    }
}


//!Aca esta la funcion de Desacticar un Usuario
const desactivar = async e => {
    const result = await Swal.fire({
        icon: 'question',
        title: 'Desactivar Usuario',
        text: '¿Desea Desactivar Usuario?',
        showCancelButton: true,
        confirmButtonText: 'Desactivar',
        cancelButtonText: 'Cancelar'
    });

    const button = e.target;
    const id = button.dataset.id
    // alert(id);
    
    if (result.isConfirmed) {
        const body = new FormData();
        body.append('usu_id', id);

        const url = `/parcial_caal/API/dato/desactivar`;
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
                        title: 'Desactivado Exitosamente',
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
        
        const url = `/parcial_caal/API/dato/eliminar`;
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
                        title: 'Eliminado Exitosamente',
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

const mostrarFormulario = () => {
    tablaUsuariosTabla.style.display = 'none';
    formulario.style.display = 'block';
};

const ocultarFormulario = () => {
    formulario.reset();
    formulario.style.display = 'none';
    tablaUsuariosTabla.style.display = 'block';
};

//!Para colocar los datos sobre el formulario
const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id;
    const nombre = button.dataset.nombre;
    const catalogo = button.dataset.catalogo;

    //! Llenar el formulario con los datos obtenidos
    formulario.usu_id.value = id;
    formulario.usu_nombre.value = nombre;
    formulario.usu_catalogo.value = catalogo;
}

//!Aca esta la funcino de cancelar la accion de modificar un registro.
const cancelarAccion = () => {
    formulario.reset();
    document.getElementById('tablaUsuariosTabla').style.display = 'block'; // Corrección aquí
};

//!Aca esta la funcion de modificar un registro
const modificar = async () => {
    const usu_id = formulario.usu_id.value;
    const body = new FormData(formulario);
    body.append('usu_id', usu_id);

    const url = `/parcial_caal/API/dato/modificar`;
    const config = {
        method: 'POST',
        body,
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);
        const { codigo, mensaje, detalle } = data;

        switch (codigo) {
            case 1:
                formulario.reset();
                cancelarAccion(); // Corrección aquí
                buscar();

                
                ocultarFormulario(); // Ocultar el formulario
                
                Toast.fire({
                    icon: 'success',
                    title: 'Actualizado',
                    text: mensaje,
                    confirmButtonText: 'OK'
                });
                break;
            case 0:
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Verifique sus datos: ' + mensaje,
                    confirmButtonText: 'OK'
                });
                break;
            default:
                break;
        }

    } catch (error) {
        console.log(error);
    }
};

const modificarContrasena = async e => {
    const button = e.target;
    const id = button.dataset.id;
    const nombre = button.dataset.nombre;

    // Mostrar un formulario o ventana modal para ingresar la nueva contraseña
    const { value: nuevaContrasena } = await Swal.fire({
        title: `Modificar Contraseña para ${nombre}`,
        input: 'password',
        inputLabel: 'Nueva Contraseña',
        inputPlaceholder: 'Ingrese la nueva contraseña',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        preConfirm: async (nuevaContrasena) => {
            // Aquí puedes realizar la lógica para enviar la nueva contraseña al servidor
            // y modificarla para el usuario con el id proporcionado
            const url = `/parcial_caal/API/dato/modificarContrasena`;
            const body = new FormData();
            body.append('usu_id', id);
            body.append('nuevaContrasena', nuevaContrasena);
            
            try {
                const respuesta = await fetch(url, {
                    method: 'POST',
                    body
                });
                const data = await respuesta.json();

                if (data.codigo === 1) {
                    buscar();
                    return data.mensaje;
                } else {
                    throw new Error(data.detalle || 'Error al modificar contraseña');
                }
            } catch (error) {
                throw new Error(error.message || 'Error al modificar contraseña');
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    });

    if (nuevaContrasena) {
        Swal.fire({
            icon: 'success',
            title: 'Contraseña Modificada',
            text: nuevaContrasena,
            confirmButtonText: 'OK'
        });
    }
};


datatable.on('click', '.btn-warning', () => {
    mostrarFormulario();
    traeDatos(event);
});
btnCancelar.addEventListener('click', ocultarFormulario);
btnModificar.addEventListener('click', modificar);
btnCancelar.addEventListener('click', cancelarAccion);
datatable.on('click','.btn-warning', traeDatos)
datatable.on('click','.btn-info', desactivar)
datatable.on('click','.btn-danger', eliminar)
datatable.on('click', '.btn-warning', async (event) => {
    mostrarFormulario();

    // Llamar a la función para modificar contraseña
    await modificarContrasena(event);
});
buscar();