// Fetch data from the server
fetch('data.php')
    .then(response => response.json())
    .then(data => {
        // Create line chart
        var lineChart = new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: data.names,
                datasets: [{
                    label: 'Height',
                    data: data.heights,
                    borderColor: 'blue',
                    fill: false
                }, {
                    label: 'Weight',
                    data: data.weights,
                    borderColor: 'red',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Child Height and Weight'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        });

        // Create bar chart
        var barChart = new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: data.names,
                datasets: [{
                    label: 'Weight',
                    data: data.weights,
                    borderWidth: 1,
                    backgroundColor: 'orange'
                    
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Child Weight'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        });
    });
