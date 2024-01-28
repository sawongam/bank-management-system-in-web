fetch('../../scripts/doughnut_js.php')
    .then(response => response.json())
    .then(data => {
        var ctx = document.getElementById('doughnut_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Income', 'Expense', 'Opening Balance'],
                datasets: [{
                    data: [data.totalCredit, data.totalDebit, 69],
                    backgroundColor: [
                        '#1cc88a',
                        '#e74a3b',
                        '#4e73df'
                    ],
                    borderColor: [
                        'white',
                        'white',
                        'white'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    title: {
                        display: false,
                        text: 'Cash Flow Doughtnut Chart'
                    }
                },
                animation: {
                    animateScale: false,
                    animateRotate: false
                }
            }
        });
    });