import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", function () {

  const ctx = document.getElementById('salesChart').getContext('2d');

  if(!ctx) {
    return;
  }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{
                label: 'Vinst',
                data: [250,200,300,250,220,330],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.2)',
                tension: 0.4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 50,
                        callback: function(value) {
                            return value + ' tkr';
                        }
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('profitChart'), {
    type: 'bar',
    data: {
        labels: ['Q1','Q2','Q3','Q4'],
        datasets: [{
            label: 'Vinstmarginal',
            data: [30, 45, 20, 35],
            backgroundColor: [
                '#6366f1',
                '#10b981',
                '#f59e0b',
                '#ef4444'
            ]
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        callback: function(value) {
                            return value + ' mkr';
                        }
                    }
                }
            }
        }
    });


    new Chart(document.getElementById('deviceChart'), {
    type: 'doughnut',
    data: {
        labels: ['Mobil','Dator','Surfplatta','Annat'],
        datasets: [{
            data: [70, 30, 40, 15],
            backgroundColor: [
                '#3b82f6',
                '#10b981',
                '#f59e0b',
                '#ef4444',
            ]
        }]
    }
});


    new Chart(document.getElementById('categoryChart'), {
    type: 'pie',
    data: {
        labels: ['Solglasögon','Läsglasögon','Barnglasögon','Progressiva glasögon','Standardglasögon'],
        datasets: [{
            data: [55, 20, 10, 15, 20],
            backgroundColor: [
                '#3b82f6',
                '#10b981',
                '#f59e0b',
                '#ef4444',
                '#8b5cf6'
            ]
        }]
    }
});

});