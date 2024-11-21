document.addEventListener('DOMContentLoaded', function() {
    // Monthly Sales Bar Chart with Detailed Information
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Total Sales (Rs.)',
                    data: [45000, 59000, 80000, 81000, 56000, 75000, 65000, 71000, 82000, 91000, 95000, 100000],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',   // Pink
                        'rgba(54, 162, 235, 0.7)',   // Blue
                        'rgba(255, 206, 86, 0.7)',   // Yellow
                        'rgba(75, 192, 192, 0.7)',   // Teal
                        'rgba(153, 102, 255, 0.7)',  // Purple
                        'rgba(255, 159, 64, 0.7)',   // Orange
                        'rgba(199, 199, 199, 0.7)',  // Grey
                        'rgba(83, 102, 255, 0.7)',   // Indigo
                        'rgba(40, 159, 64, 0.7)',    // Green
                        'rgba(210, 99, 132, 0.7)',   // Coral
                        'rgba(90, 162, 235, 0.7)',   // Sky Blue
                        'rgba(255, 77, 86, 0.7)'     // Salmon
                    ],
                    borderRadius: 10,
                    borderWidth: 0,
                    hoverBackgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(199, 199, 199, 1)',
                        'rgba(83, 102, 255, 1)',
                        'rgba(40, 159, 64, 1)',
                        'rgba(210, 99, 132, 1)',
                        'rgba(90, 162, 235, 1)',
                        'rgba(255, 77, 86, 1)'
                    ]
                },
                {
                    label: 'Profit Margin (%)',
                    type: 'line',
                    data: [15, 18, 22, 20, 16, 19, 17, 21, 23, 25, 24, 26],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 3,
                    fill: false,
                    yAxisID: 'percentage'
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Frostine Sales Performance & Profit Margin 2023',
                    font: { 
                        size: 18, 
                        weight: 'bold',
                        family: 'Vidaloka'
                    },
                    padding: 20
                },
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.datasetIndex === 0) {
                                label += 'Rs. ' + context.parsed.y.toLocaleString();
                            } else {
                                label += context.parsed.y + '%';
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Sales Amount (Rs.)'
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        callback: function(value) {
                            return 'Rs.' + value.toLocaleString();
                        }
                    }
                },
                percentage: {
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Profit Margin (%)'
                    },
                    grid: {
                        drawOnChartArea: false
                    },
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Enhanced Calendar Implementation with Order Status
    const calendar = document.getElementById('calendar');
    const date = new Date();
    const currentMonth = date.getMonth();
    const currentYear = date.getFullYear();

    // Dummy order data with status
    const orderData = {
        completedOrders: [1, 5, 7, 10, 12, 15, 18, 22, 25, 28],
        nonCompletedOrders: [3, 6, 9, 13, 16, 20, 23, 26, 29]
    };

    function generateCalendar(month, year) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                           'July', 'August', 'September', 'October', 'November', 'December'];

        let calendarHTML = `
            <div class="calendar-header">
                <h3>${monthNames[month]} ${year}</h3>
            </div>
            <div class="calendar-body">
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days">
        `;

        // Add empty spaces for days before the first day of the month
        for (let i = 0; i < firstDay.getDay(); i++) {
            calendarHTML += '<div></div>';
        }

        // Add the days of the month
        for (let day = 1; day <= lastDay.getDate(); day++) {
            let dayClass = '';
            
            // Highlight order status
            if (orderData.completedOrders.includes(day)) {
                dayClass = 'completed-order';
            } else if (orderData.nonCompletedOrders.includes(day)) {
                dayClass = 'non-completed-order';
            }

            // Highlight today
            if (day === date.getDate() && month === date.getMonth()) {
                dayClass += ' today';
            }

            calendarHTML += `<div class="${dayClass}">${day}</div>`;
        }

        calendarHTML += `
                </div>
            </div>
        `;

        calendar.innerHTML = calendarHTML;
    }

    generateCalendar(currentMonth, currentYear);
});