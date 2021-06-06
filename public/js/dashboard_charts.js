// TODO: Update the charts code once backend work is done
// Chart one
let tests_ctx = document.getElementById('chart-one-area').getContext('2d');
let tests_config = {
    type: 'doughnut',
    data: {
        datasets: [
            {
                data: [8, 26],
                backgroundColor: ['#F87171', '#818CF8'],
                label: 'Dataset 1',
            },
        ],
        labels: ['Active Clients', 'Total Clients'],
    },
    options: {
        maintainAspectRatio: false,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            fontColor: '#4338CA',
            fontSize: 23,
            text: 'Client statistics',
        },
        animation: {
            animateScale: true,
            animateRotate: true,
        },
    },
};
myDoughnut = new Chart(tests_ctx, tests_config);

// Chart two
let tests_ctx_two = document.getElementById('chart-two-area').getContext('2d');
let tests_config_two = {
    type: 'doughnut',
    data: {
        datasets: [
            {
                data: [8, 26],
                backgroundColor: ['#F87171', '#818CF8'],
                label: 'Dataset 1',
            },
        ],
        labels: ['Active Clients', 'Total Clients'],
    },
    options: {
        maintainAspectRatio: false,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            fontColor: '#4338CA',
            fontSize: 23,
            text: 'Client statistics',
        },
        animation: {
            animateScale: true,
            animateRotate: true,
        },
    },
};
myDoughnut_two = new Chart(tests_ctx_two, tests_config_two);

// line graph
new Chart(document.getElementById('line-graph'), {
    type: 'line',
    data: {
        labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
        datasets: [
            {
                data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
                label: 'Africa',
                borderColor: '#3e95cd',
                fill: false,
            },
            {
                data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
                label: 'Asia',
                borderColor: '#8e5ea2',
                fill: false,
            },
        ],
    },
    options: {
        title: {
            display: true,
            fontColor: '#4338CA',
            fontSize: 23,
            text: 'Line Graph',
        },
    },
});
