import Chart from "chart.js/auto";

const canvas = document.getElementById('chartRoles');
const btnActualizar = document.getElementById('btnActualizar');
const context = canvas.getContext('2d');

const getRandomColor = () => {
    const r = Math.floor(Math.random() * 256)
    const g = Math.floor(Math.random() * 256)
    const b = Math.floor(Math.random() * 256)

    const rgColor = `rgba(${r},${g},${b},0.5)`
    return rgColor
}


const charRoles = new Chart(context, {
    type: 'bar',
    data: {
        labels: ['Administrador', 'Vendedor', 'Cliente'],
        datasets: [
            {
                label: 'Roles',
                data: [],
                backgroundColor: []
            }
        ]
    }
});

const getEstadisticas = async () => {
    const url = `/parcial_caal/API/dato/estadistica2`; 
    const config = {
        method: 'GET'
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();

        console.log("Datos:", data); 

        if (data) {
            const administradoresCount = data.filter(registro => registro.rol === 'Administrador').length;
            const vendedoresCount = data.filter(registro => registro.rol === 'Vendedor').length;
            const clientesCount = data.filter(registro => registro.rol === 'Cliente').length;
            charRoles.data.datasets[0].backgroundColor.push(getRandomColor())
            updateChart([administradoresCount, vendedoresCount, clientesCount]);
        } else {
            Toast.fire({
                title: 'No se encontraron Registros',
                icon: 'info'
            });
        }
    } catch (error) {
        console.log(error);
    }
};

const updateChart = (data) => {
    charRoles.data.datasets[0].data = data;
    charRoles.update();
};

btnActualizar.addEventListener('click', getEstadisticas);
getEstadisticas();  