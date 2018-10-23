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
var config1 = {
    type: 'line',
    data: {
        labels: MONTHS,
        datasets: [{
            label: 'Month Wise Registered User',
            backgroundColor: window.chartColors.green,
            borderColor: window.chartColors.green,
            data: count_registered_user,
            fill: false,
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Registered User'
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
                    labelString: 'No of registered user'
                }
            }]
        }
    }
};

window.onload = function () {
    var ctx = document.getElementById('user_views_container').getContext('2d');
    window.myLine = new Chart(ctx, config);

    var ctx1 = document.getElementById('user_views_week').getContext('2d');
    window.myLine = new Chart(ctx1, config1);
};
