const admin_DoanhSoLuyKeThang = document.getElementById("admin_DoanhSoLuyKeThang");

function dynamicColors() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgba(" + r + "," + g + "," + b + ")";
}

new Chart(admin_DoanhSoLuyKeThang, {
    type: "line",
    data: {
        labels: [
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
            "11",
            "12",
        ],
        datasets: [
            {
                label: "Doanh số",
                data: [1900, 2300, 2280, 2900, 3500, 4450, 1700, 1600, 1650, 2000, 1950, 2100],
                backgroundColor: "rgb(196, 37, 23)",
                borderColor: "rgba(196, 37, 23, 0.75)",
                tension: 0,
                fill: false,
                datalabels: {
                    color: 'black',
                  },
            },
            {
                label: "Tổng luỹ kế",
                data: [300, 320, 700, 320, 280, 680, 340, 330, 330, 320, 720, 320],
                backgroundColor: "rgb(191, 164, 8)",
                borderColor: "rgba(191, 164, 8,0.75)",
                tension: 0,
                fill: false,
                datalabels: {
                    color: 'black',
                  },
            },            
        ],
    },
    options: {
        responsive: true,
        interaction: {
            mode: 'index',
            intersect: false,
          },
        maintainAspectRatio: false,
        scales: {
            y: {
                scaleLabel: {
                    display: true,
                    labelString: "probability",
                },
                ticks: {
                    beginAtZero: true,
                },
            },
        },
        plugins: {
            legend: {
                position: "top",
                labels: {
                    usePointStyle: true,
                    pointStyle: "rectRounded",
                    font: {
                        size:8
                      },
                    boxWidth:15, 
                },                
            },
            title: {
                display: false,
                // text: 'Doanh thu - Chi phí Marketing'
              },
        },
    },
    plugins: [ChartDataLabels],
});
