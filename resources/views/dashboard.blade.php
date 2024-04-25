<header>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</header>
<x-app-layout>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Gráfica de Barras para Clientes -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="clientesChart"></canvas>
                    </div>
                </div>

                <!-- Gráfica de Líneas para Productos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="productosChart"></canvas>
                    </div>
                </div>

                <!-- Gráfica de Pie para Servicios -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="serviciosChart"></canvas>
                    </div>
                </div>

                <!-- Gráfica de Barras para Ventas -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <canvas id="ventasChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    fetchClientesData();
});

function fetchClientesData() {
    fetch('/api/clientes/count-by-date')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.date);
            const counts = data.map(item => item.count);
            updateClientesChart(labels, counts);
        })
        .catch(error => console.error('Error al obtener datos de clientes:', error));
}

function updateClientesChart(labels, data) {
    var ctx = document.getElementById('clientesChart').getContext('2d');
    var clientesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nuevos Clientes',
                data: data,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    fetchProductoRandomConStock();
});

function fetchProductoRandomConStock() {
    fetch('/producto/random')
        .then(response => response.json())
        .then(producto => {
            const labels = [producto.Nombre]; // El nombre del producto como etiqueta
            const stock = [producto.Stock]; // La cantidad de stock
            updateProductosChart(labels, stock);
        })
        .catch(error => console.error('Error al obtener datos del producto:', error));
}

function updateProductosChart(labels, data) {
    var ctx = document.getElementById('productosChart').getContext('2d');
    // Verifica si la gráfica ya existe y si tiene el método 'destroy'
    if (window.productosChart && typeof window.productosChart.destroy === 'function') {
        window.productosChart.destroy();
    }
    window.productosChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Stock Disponible',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}



document.addEventListener('DOMContentLoaded', function() {
    fetchVentasPorEstado();
});

function fetchVentasPorEstado() {
    fetch('/api/ventas/contar-por-estado')
        .then(response => response.json())
        .then(data => {
            const labels = ['Pendientes', 'Aceptadas'];
            const counts = [data.Pendientes, data.Aceptadas];
            updateServiciosChart(labels, counts);
        })
        .catch(error => console.error('Error al obtener datos de ventas:', error));
}

function updateServiciosChart(labels, data) {
    var ctxServicios = document.getElementById('serviciosChart').getContext('2d');
    if (window.serviciosChart) window.serviciosChart.destroy(); // Destruye la gráfica anterior si existe
    window.serviciosChart = new Chart(ctxServicios, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: '# de Ventas por Estado',
                data: data,
                backgroundColor: [
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
    });
}

    // Gráfica de Servicios
    var ctxServicios = document.getElementById('serviciosChart').getContext('2d');
    var serviciosChart = new Chart(ctxServicios, {
        type: 'pie',
        data: {
            labels: ['Pendientes', 'Aceptadas'],
            datasets: [{
                label: '# de Servicios Contratados',
                data: [12, 19, 3],
                backgroundColor: [
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                  
                ],
                borderColor: [
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                 
                ],
                borderWidth: 1
            }]
        },
    });

    document.addEventListener('DOMContentLoaded', function() {
    fetchValoresVentasAceptadas();
});

function fetchValoresVentasAceptadas() {
    fetch('/ventas/valores-aceptadas')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => new Date(item.created_at).toLocaleDateString());
            const valores = data.map(item => item.precio);
            updateVentasChart(labels, valores);
        })
        .catch(error => console.error('Error al obtener datos de ventas:', error));
}

function updateVentasChart(labels, data) {
    var ctxVentas = document.getElementById('ventasChart').getContext('2d');

    // Verifica si la gráfica ya existe y es una instancia de Chart antes de intentar destruirla
    if (window.ventasChart instanceof Chart) {
        window.ventasChart.destroy(); // Destruye la gráfica anterior si existe
    }

    // Crea una nueva instancia de la gráfica
    window.ventasChart = new Chart(ctxVentas, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Valor de Ventas ($)',
                data: data,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, chart) {
                        return `$${tooltipItem.yLabel.toFixed(2)}`;
                    }
                }
            }
        }
    });
}



    </script>
</x-app-layout>