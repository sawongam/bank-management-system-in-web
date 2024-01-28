fetch('../../scripts/linechart_js.php')
    .then(response => response.json())
    .then(data => {
        var ctx = document.getElementById('line_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.currDate,
                datasets: [{
                    label: 'Balance',
                    data: data.currAmounts,
                    fill: false,
                    borderColor: '#4e73df',
                    tension: 0.5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        display: false,
                    },
                    title: {
                        display: false,
                        text: 'Transaction Overview Chart'
                    }
                }
            }
        });
    })
    .catch(error => console.error('Error:', error));



//   var ctx = document.getElementById('line_chart').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//         datasets: [{
//             label: 'My First Dataset',
//             data: [65, 59, 80, 81, 56, 55, 40, ],
//             fill: false,
//             borderColor: 'rgb(75, 192, 192)',
//             tension: 0.1
//         }]
//     },
//     options: {
//         responsive: true,
//         plugins: {
//             legend: {
//                 position: 'top',
//             },
//             title: {
//                 display: false,
//                 text: 'Line Chart Example'
//             }
//         }
//     }
// });