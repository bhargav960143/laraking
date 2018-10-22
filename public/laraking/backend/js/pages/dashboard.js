var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var config = {
    type: 'line',
    data: {
        labels: MONTHS,
        datasets: [{
            label: 'Month wise user views display',
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.blue,
            data: count_data_views,
            fill: false,
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Users View'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'No of views'
                }
            }]
        }
    }
};

window.onload = function() {
    var ctx = document.getElementById('user_views_container').getContext('2d');
    window.myLine = new Chart(ctx, config);
};
