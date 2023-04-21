var canvas = document.getElementById('grafico');

// Crear el objeto Chart
var chart = new Chart(canvas, {
    type: 'line', // Tipo de gráfico
    data: {
        labels: ['Incidentes', 'Retrasos', 'Perdidas'], // Etiquetas en el eje X
        datasets: [{
            label: 'Descripcion de los incidentes', // Etiqueta de la barra
            data: [12, 28, 34], // Datos de la barra
            backgroundColor: [
                'rgba(255, 20, 132, 0.2)',
                'rgba(54, 30, 235, 0.2)',
                'rgba(255, 100, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true // Iniciar el eje Y en cero
                }
            }]
        }
    }
});
