import { validarFormulario, Toast } from "../funciones";
const show_password = document.getElementById('show_password');
const formLogin = document.querySelector('form');

const login = async e => {
    e.preventDefault();

    if (!validarFormulario(formLogin)) {
        Toast.fire({
            icon: 'info',
            title: 'Debe llenar todos los campos'
        });
        return;
    }

    try {
        const url = "/parcial_caal/API/login"; 

        const body = new FormData(formLogin);

        const headers = new Headers();
        headers.append("X-Requested-With", "fetch");

        const config = {
            method: 'POST',
            headers,
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        const { codigo, mensaje, detalle} = data; // Agregar "redireccion"

        let icon = 'info';
        if (codigo == 1) {
            icon = 'success';
        } else if (codigo == 2) {
            icon = 'warning';
        } else {
            icon = 'error';
        }

        Toast.fire({
            title: mensaje,
            icon
        }).then((e)=>{
            if(codigo == 1){
                location.href = '/parcial_caal/inicio'
            }
        })

    } catch (error) {
        console.log(error);
    }

}
function ver_password() {
    const passwordInput = document.getElementById("usu_password");
    const showPasswordCheckbox = document.getElementById("show_password");

    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
show_password.addEventListener('click', ver_password);
formLogin.addEventListener('submit', login);