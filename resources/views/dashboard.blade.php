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

    var ctxProductos = document.getElementById('productosChart').getContext('2d');
    var productosChart = new Chart(ctxProductos, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
            datasets: [{
                label: 'Cantidad de Productos Vendidos',
                data: [5, 10, 4, 8],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: false
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

    // Gráfica de Servicios
    var ctxServicios = document.getElementById('serviciosChart').getContext('2d');
    var serviciosChart = new Chart(ctxServicios, {
        type: 'pie',
        data: {
            labels: ['Consultoría', 'Soporte Técnico', 'Diseño Web'],
            datasets: [{
                label: '# de Servicios Contratados',
                data: [12, 19, 3],
                backgroundColor: [
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
    });

    // Gráfica de Ventas
    var ctxVentas = document.getElementById('ventasChart').getContext('2d');
    var ventasChart = new Chart(ctxVentas, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
            datasets: [{
                label: 'Valor de Ventas ($)',
                data: [2000, 4000, 1500, 3200],
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
            }
        }
    });
    </script>
</x-app-layout>