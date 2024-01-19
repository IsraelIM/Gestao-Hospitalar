window.onload = () => {
// Seu conjunto de dados para o gráfico de Barra
    var data = {
        labels: ['Pacientes', 'Cirurgião', 'C. Ambulatorias', 'C. Complexas', 'Agendamentos'],
        datasets: [{
            label: 'Dados do Gráfico',
            backgroundColor:[
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1, 
            data: [totalPaciente, totalCirurgiao, totalAmbulatoriais, totalComplexas, 2]
        }]
        };
    // Configurações do gráfico
    var options = {
    scales: {
        y: {
        beginAtZero: true
        }
    }
    };
    // Obtém o contexto do canvas
    var ctx = document.getElementById('myChart').getContext('2d');
    // Cria um gráfico de barra
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
    });

    // Seu conjunto de dados para o gráfico de Pizza
			var data = {
                labels: ['Pacientes', 'Cirurgião', 'C. Ambulatorias', 'C. Complexas', 'Agendamentos'],
                datasets: [{
                    label: 'Dados do Gráfico',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderWidth: 1,
                    data: [totalPaciente, totalCirurgiao, totalAmbulatoriais, totalComplexas, 2]
                }]
                };
    
                // Configurações do gráfico
                var options = {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                };
    
                // Obtém o contexto do canvas
                var ctx = document.getElementById('myChartPie').getContext('2d');
    
                // Cria um gráfico de barra
                var myChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
                });
}
